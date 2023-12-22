<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use \Sellix\PhpSdk\Sellix;
use \Sellix\PhpSdk\SellixException;

class Pay extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->Sellix = new Sellix("GUm1jPPiGlPe102LB9IwVlGWrgbbCUgTcqML6cf9poqOnKQcbJizS7E1QRsUnXmq", "startwinning");
    }

    public function payment_successful(){
        check_auth();
        view('frontend/static/header');
        view('frontend/pages/payment_successful');
        view('frontend/static/footer');
    }

    public function payment_failed(){
        check_auth();
        view('frontend/static/header');
        view('frontend/pages/payment_failed');
        view('frontend/static/footer');
    }

    public function page($uniqid = ""){
        check_auth();
        $check = get_where("payments",["order_key" => $uniqid])->row_array();
        
        if($check){
            view('frontend/pages/pay_page',["pay" => $check]);
        }else{
            view('frontend/static/header');
            view('frontend/pages/404');
            view('frontend/static/footer');
        }

    }

    public function create($data = ""){
        check_auth();
        $check = get_where("products",["product_slug" => $data])->row_array();
        if($check){
            $period = get("period");
            $periods = $check["product_period"];
            $periods = json_decode($periods,true);
            if($period && isset($periods[$period])){
                $payment_payload = [
                    "title" => $check["product_name"],
                    "value" => (int)$periods[$period]["price"],
                    "currency" => "USD",
                    "quantity" => 1,
                    "email" => db_decrypt(user_data()["email"]),
                    "white_label" => true,
                    "return_url" => base_url("pay/hook")
                ];

                try {
                    $payment = $this->Sellix->create_payment($payment_payload);
                    $payment = json_decode(json_encode($payment),true);
                    $key = guid();
                    $insert = insert("payments",[
                        "order_key" => $key,
                        "user_key" => user_data()["user_key"],
                        "product_key" => $check["product_key"],
                        "uniqid" => $payment["uniqid"],
                        "url" => "https://checkout.sellix.io/invoice/".$payment["uniqid"],
                        "price" => $payment["total"],
                        "status" => "pending",
                        "period" => $period
                    ]);
                    if($insert){
                        echo api_response("true", "Payment Create.. Redirecting...", [
                            "developer" => "StartWinning",
                            "tokens" => csrf_array(),
                            "time" => time(),
                            "sellix" => $payment,
                            "redirect" => base_url("pay/page/".$key)
                        ]);
                    }else{
                        echo api_response("false", "Payment not create", [
                            "developer" => "StartWinning",
                            "tokens" => csrf_array(),
                            "time" => time(),
                            "sellix" => $payment
                        ]);
                    }
                } catch (SellixException $e) {
                    echo api_response("false", $e->__toString(), [
                        "developer" => "StartWinning",
                        "tokens" => csrf_array(),
                        "time" => time()
                    ]);
                }

            }else{
                echo api_response("false", "Missing period data", [
                    "developer" => "StartWinning",
                    "tokens" => csrf_array(),
                    "time" => time()
                ]);
            }
        }else{
            echo api_response("false", "Unauthorized access request", [
                "developer" => "StartWinning",
                "tokens" => csrf_array(),
                "time" => time()
            ]);
        }
    }

    public function complete($uniqid = ""){
        check_auth();
        try {
            $check = $this->Sellix->get_order($uniqid);
            $check = json_decode(json_encode($check),true);
            if($check["status"] == "COMPLETED"){
                $pm = get_where("payments",["uniqid" => $uniqid])->row_array();
                if($pm["status"] != "completed"){
                    $get_period = get_where("products",["product_key" => $pm["product_key"]])->row_array();
                    $get_period["product_period"] = json_decode($get_period["product_period"],true);
                    update("payments",["uniqid" => $uniqid],["status" => "completed"]);
                    $currentTimestamp = time();
                    $days = $get_period["product_period"][$pm["period"]]["day"];
                    $seconds = $days * 24 * 60 * 60;
                    $futureTimestamp = $currentTimestamp + $seconds;
                    $insert = insert("orders",[
                        "order_key" => $pm["order_key"],
                        "user_key" => $pm["user_key"],
                        "product_key" => $pm["product_key"],
                        "period" => $pm["period"],
                        "start_time" => time(),
                        "finish_time" => $futureTimestamp,
                        "price" => $pm["price"],
                        "status" => "active"
                    ]);
                    if($insert){
                        echo api_response("true", "Payment Completed", [
                            "developer" => "StartWinning",
                            "tokens" => csrf_array(),
                            "time" => time()
                        ]);
                    }else{
                        echo api_response("false", "Payment Not Completed", [
                            "developer" => "StartWinning",
                            "tokens" => csrf_array(),
                            "time" => time()
                        ]);
                    }
                }else{
                    echo api_response("false", "This Order is already registered", [
                        "developer" => "StartWinning",
                        "tokens" => csrf_array(),
                        "time" => time()
                    ]);
                }
            }else{
                echo api_response("false", "Payment Not Confirmed", [
                    "developer" => "StartWinning",
                    "tokens" => csrf_array(),
                    "time" => time()
                ]);
            }
        } catch (SellixException $e) {
            echo api_response("false", $e->__toString(), [
                "developer" => "StartWinning",
                "tokens" => csrf_array(),
                "time" => time()
            ]);
        }
    }

    public function check($uniqid){
        check_auth();
        if($uniqid){
            try {
                $payment = $this->Sellix->get_order($uniqid);
                echo api_response("true", "Payment Info", [
                    "developer" => "StartWinning",
                    "tokens" => csrf_array(),
                    "time" => time(),
                    "sellix" => $payment
                ]);
            } catch (SellixException $e) {
                echo api_response("false", $e->__toString(), [
                    "developer" => "StartWinning",
                    "tokens" => csrf_array(),
                    "time" => time()
                ]);
            }
        }else{
            echo api_response("false", "Unauthorized access request", [
                "developer" => "StartWinning",
                "tokens" => csrf_array(),
                "time" => time()
            ]);
        }
    }

}
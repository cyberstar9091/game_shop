<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Loader_api extends CI_Controller {

    public function __construct(){
        parent::__construct();
    }

    public function get_token(){
        $jsonData = file_get_contents('php://input'); 
        $data = json_decode($jsonData, true);

        if ($data === null) {
            http_response_code(400);
            echo api_response("false", "Invalid JSON", [
                "developer" => "StartWinning",
                "time" => time()
            ]);
        }else{
            $action = $data['action'];
    
            if ($action == "get_token") {
                $get_ip = get_ip();
                            $active_tokens = get_where("loader_tokens", ["ip_address" => db_encrypt($get_ip), "status" => "active"])->result();
                if (!empty($active_tokens)) {
                    foreach ($active_tokens as $token) {
                        if ($token->expired_time < time()) {
                            update("loader_tokens", ["token" => $token->token], ["status" => "passive"]);
                            $new_token = generateKey(512);
                            $expired_time = time() + 600;
                            insert("loader_tokens", [
                                "token" => $new_token,
                                "expired_time" => $expired_time,
                                "ip_address" => db_encrypt($get_ip),
                                "status" => "active"
                            ]);
                            http_response_code(200);
                            echo api_response("true", "Token generated", [
                                "token_info" => ["token" => $new_token, "expired_time" => $expired_time],
                                "developer" => "StartWinning",
                                "time" => time()
                            ]);
                        } else {
                            http_response_code(200);
                            echo api_response("true", "Active Token Found", [
                                "token_info" => ["token" => $token->token, "expired_time" => $token->expired_time],
                                "developer" => "StartWinning",
                                "time" => time()
                            ]);
                        }
                    }
                }else{
                    $new_token = generateKey(512);
                    $expired_time = time() + 600;
                    insert("loader_tokens", [
                        "token" => $new_token,
                        "expired_time" => $expired_time,
                        "ip_address" => db_encrypt($get_ip),
                        "status" => "active"
                    ]);
                    http_response_code(200);
                    echo api_response("true", "Token generated", [
                        "token_info" => ["token" => $new_token, "expired_time" => $expired_time],
                        "developer" => "StartWinning",
                        "time" => time()
                    ]);
                }
            } else {
                http_response_code(400);
                echo api_response("false", "Invalid action", [
                    "developer" => "StartWinning",
                    "time" => time()
                ]);
            }
        }
    }

    public function get_products(){
        $jsonData = file_get_contents('php://input'); 
        $data = json_decode($jsonData, true);

        if ($data === null) {
            http_response_code(400);
            echo api_response("false", "Invalid JSON", [
                "developer" => "StartWinning",
                "time" => time()
            ]);
        }else{
            $action = $data['action'];
            $token = $data['token'];
    
            if ($action == "get_products") {
                $check_token = get_where("loader_tokens", ["token" => $token])->row_array();
                if($check_token["status"] == "active"){
                    $get_products = get_where("products", ["product_status" => "active"])->result();
                    if (!empty($get_products)) {
                        http_response_code(200);
                        echo api_response("true", "Products found", [
                            "products" => $get_products,
                            "developer" => "StartWinning",
                            "time" => time()
                        ]);
                    } else {
                        http_response_code(400);
                        echo api_response("false", "No products found", [
                            "developer" => "StartWinning",
                            "time" => time()
                        ]);
                    }
                }else{
                    http_response_code(400);
                    echo api_response("false", "Invalid or expired token", [
                        "developer" => "StartWinning",
                        "time" => time()
                    ]);
                }
            } else {
                http_response_code(400);
                echo api_response("false", "Invalid action", [
                    "developer" => "StartWinning",
                    "time" => time()
                ]);
            }
        }
    }

    public function login(){
        $jsonData = file_get_contents('php://input'); 
        $data = json_decode($jsonData, true);

        if ($data === null) {
            http_response_code(400);
            echo api_response("false", "Invalid JSON", [
                "developer" => "StartWinning",
                "time" => time()
            ]);
        }else{
            $action = $data['action'];
            $token = $data['token'];
    
            if ($action == "login") {
                $check_token = get_where("loader_tokens", ["token" => $token])->row_array();
                if($check_token["status"] == "active"){
                    $email = $data['email'];
                    $password = $data['password'];
                    @$hwid = $data['hwid'];
                    $check_user = get_where("users", ["email" => db_encrypt($email)])->row_array();
                    if($check_user){
                        if(db_decrypt($check_user["password"]) == $password){
                            $user_token = md5($token.$check_user["user_key"].time());
                            if(@$hwid){
                                update("users",["user_key" => $check_user["user_key"]],[
                                    "user_token" => $user_token,
                                    "hardware_id" => $hwid
                                ]);
                            }else{
                                update("users",["user_key" => $check_user["user_key"]],[
                                    "user_token" => $user_token,
                                ]);
                            }
                            http_response_code(200);
                            echo api_response("true", "You have successfully logged in", [
                                "developer" => "StartWinning",
                                "time" => time(),
                                "user_token" => $user_token
                            ]);
                        }else{
                            http_response_code(400);
                            echo api_response("false", "The password you entered is incorrect", [
                                "developer" => "StartWinning",
                                "time" => time()
                            ]);
                        }
                    }else{
                        http_response_code(400);
                        echo api_response("false", "The email you entered is incorrect", [
                            "developer" => "StartWinning",
                            "time" => time()
                        ]);
                    }
                }else{
                    http_response_code(400);
                    echo api_response("false", "Invalid or expired token", [
                        "developer" => "StartWinning",
                        "time" => time()
                    ]);
                }
            } else {
                http_response_code(400);
                echo api_response("false", "Invalid action", [
                    "developer" => "StartWinning",
                    "time" => time()
                ]);
            }
        }
    }

    public function check_hwid(){
        $jsonData = file_get_contents('php://input'); 
        $data = json_decode($jsonData, true);

        if ($data === null) {
            http_response_code(400);
            echo api_response("false", "Invalid JSON", [
                "developer" => "StartWinning",
                "time" => time()
            ]);
        }else{
            $action = $data['action'];
            $token = $data['token'];
    
            if ($action == "check_hwid") {
                $check_token = get_where("loader_tokens", ["token" => $token])->row_array();
                if($check_token["status"] == "active"){
                    $hwid = $data['hwid'];
                    $user_token = $data['user_token'];
                    $check_hwid = get_where("users", ["user_token" => $user_token])->row_array();
                    if($check_hwid){
                        if($hwid == $check_hwid["hardware_id"]){
                            http_response_code(200);
                            echo api_response("true", "HWID matched", [
                                "developer" => "StartWinning",
                                "time" => time()
                            ]);
                        }else{
                            http_response_code(400);
                            echo api_response("false", "HWID not matched", [
                                "developer" => "StartWinning",
                                "time" => time()
                            ]);
                        }
                    }else{
                        http_response_code(400);
                        echo api_response("false", "HWID not found", [
                            "developer" => "StartWinning",
                            "time" => time()
                        ]);
                    }
                }else{
                    http_response_code(400);
                    echo api_response("false", "Invalid or expired token", [
                        "developer" => "StartWinning",
                        "time" => time()
                    ]);
                }
            } else {
                http_response_code(400);
                echo api_response("false", "Invalid action", [
                    "developer" => "StartWinning",
                    "time" => time()
                ]);
            }
        }
    }

    public function get_license(){
        $jsonData = file_get_contents('php://input'); 
        $data = json_decode($jsonData, true);

        if ($data === null) {
            http_response_code(400);
            echo api_response("false", "Invalid JSON", [
                "developer" => "StartWinning",
                "time" => time()
            ]);
        }else{
            $action = $data['action'];
            $token = $data['token'];
    
            if ($action == "get_license") {
                $check_token = get_where("loader_tokens", ["token" => $token])->row_array();
                if($check_token["status"] == "active"){
                    $user_token = $data['user_token'];
                    $check_license = get_where("users", ["user_token" => $user_token])->row_array();
                    if($check_license){
// Orders tablosundan veri çekiliyor
$get_license = get_where("orders", ["user_key" => $check_license["user_key"], "status" => "active"])->result();

$license_details = []; // Lisans detaylarını tutacak olan dizi

// Her bir lisans için döngü
foreach ($get_license as $license) {
    $product_key = $license->product_key;
    
    // Product tablosundan ilgili product_key'e sahip veriler alınıyor
    $product = get_where("products", ["product_key" => $product_key],NULL,["product_name","product_video","product_link","product_link_mirror"])->result();
    
    // Eğer $product içerisinde sonuç varsa
    if (!empty($product)) {
        $license_details[] = [
            "license" => $license,
            "product_details" => $product // Ürün detayları
        ];
    }
}


                        if(!empty($get_license)){
                            http_response_code(200);
                            echo api_response("true", "License found", [
                                "license" => $license_details,
                                "developer" => "StartWinning",
                                "time" => time()
                            ]);
                        }else{
                            http_response_code(400);
                            echo api_response("false", "License not found", [
                                "developer" => "StartWinning",
                                "time" => time()
                            ]);
                        }
                    }else{
                        http_response_code(400);
                        echo api_response("false", "User Token Invalid or expired", [
                            "developer" => "StartWinning",
                            "time" => time()
                        ]);
                    }
                }else{
                    http_response_code(400);
                    echo api_response("false", "Invalid or expired token", [
                        "developer" => "StartWinning",
                        "time" => time()
                    ]);
                }
            } else {
                http_response_code(400);
                echo api_response("false", "Invalid action", [
                    "developer" => "StartWinning",
                    "time" => time()
                ]);
            }
        }
    }

}
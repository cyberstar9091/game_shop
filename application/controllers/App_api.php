<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class App_api extends CI_Controller {

    public function __construct(){
        parent::__construct();
    }

    public function newsletter(){
        if(post()){
            $check_email = get_where("newsletter",["email" => db_encrypt(post("email"))])->row_array();
            if($check_email){
                echo api_response("false", "You are already subscribed to the newsletter.", [
                    "developer" => "StartWinning",
                    "tokens" => csrf_array(),
                    "time" => time()
                ]);
            }else{
                $insert = insert("newsletter",[
                    "email" => db_encrypt(post("email")),
                    "time" => time()
                ]);
                if($insert){
                    echo api_response("true", "You have successfully subscribed to the newsletter, you will be the first to know about the developments", [
                        "developer" => "StartWinning",
                        "tokens" => csrf_array(),
                        "time" => time()
                    ]);
                    mail_send(post("email"), "StartWinning.GG", "You have successfully subscribed to the newsletter, you will be the first to know about the developments");
                }else{
                    echo api_response("false", "An unexpected error occurred, please try again.", [
                        "developer" => "StartWinning",
                        "tokens" => csrf_array(),
                        "time" => time()
                    ]);
                }
            }
        }else{
            echo api_response("false", "Unauthorized access request", [
                "developer" => "StartWinning",
                "tokens" => csrf_array(),
                "time" => time()
            ]);
        }
    }

    public function login(){
        if(post()){
            if(post("email") and post("password")){
                $check_user = get_where("users",["email" => db_encrypt(post("email"))])->row_array();
                if($check_user){
                    if(db_decrypt($check_user["password"]) == post("password")){
                        set_session([
                            "auth" => true,
                            "user_key" => $check_user["user_key"],
                        ]);
                        update("users",["user_key" => $check_user["user_key"]],[
                            "last_login" => db_encrypt(time()),
                            "last_ip" => db_encrypt(get_ip())
                        ]);
                        echo api_response("true", "You have successfully logged in, redirecting", [
                            "developer" => "StartWinning",
                            "tokens" => csrf_array(),
                            "time" => time(),
                            "redirect" => base_url("account")
                        ]);
                    }else{
                        echo api_response("false", "The password you entered is incorrect", [
                            "developer" => "StartWinning",
                            "tokens" => csrf_array(),
                            "time" => time()
                        ]);
                    }
                }else{
                    echo api_response("false", "The email you entered is incorrect", [
                        "developer" => "StartWinning",
                        "tokens" => csrf_array(),
                        "time" => time()
                    ]);
                }
            }else{
                echo api_response("false", "Incomplete or incorrect data sent", [
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

    public function register() {
        if (post()) {
            $email = post("email");
            $password = post("password");
            $confirmPassword = post("confirmPassword");

            $pattern = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*[!?.]).{8,}$/";
            if (!preg_match($pattern, $password)) {
                echo api_response("false", "Password does not meet the requirements", [
                    "developer" => "StartWinning",
                    "tokens" => csrf_array(),
                    "time" => time()
                ]);
            }else{
                if ($email && $password && $confirmPassword) {
                    if ($password == $confirmPassword) {
                        $check_user = get_where("users", ["email" => db_encrypt($email)])->row_array();
                        if ($check_user) {
                            echo api_response("false", "The email you entered is already registered", [
                                "developer" => "StartWinning",
                                "tokens" => csrf_array(),
                                "time" => time()
                            ]);
                        } else {
                            $new_affiliate_code = affiliate_code_generator();
                            $new_guid = guid();
                            if (post("affilate")) {
                                $insert = insert("users", [
                                    "user_key" => $new_guid,
                                    "email" => db_encrypt($email),
                                    "password" => db_encrypt($password),
                                    "balance" => 0,
                                    "affiliate_code" => $new_affiliate_code,
                                    "last_login" => db_encrypt(time()),
                                    "last_ip" => db_encrypt(get_ip())
                                ]);
                                $check_affiliate = get_where("users", ["affiliate_code" => post("affilate")])->row_array();
                                if($check_affiliate){
                                    insert("affiliate_users", [
                                        "inviting" => post("affilate"),
                                        "guest" => $new_affiliate_code,
                                        "earning" => 0,
                                        "time" => time()
                                    ]);
                                }
                            } else {
                                $insert = insert("users", [
                                    "user_key" => $new_guid,
                                    "email" => db_encrypt($email),
                                    "password" => db_encrypt($password),
                                    "balance" => 0,
                                    "affiliate_code" => affiliate_code_generator(),
                                    "last_login" => db_encrypt(time()),
                                    "last_ip" => db_encrypt(get_ip())
                                ]);
                            }
                            if ($insert) {
                                set_session([
                                    "auth" => true,
                                    "user_key" => $new_guid,
                                ]);
                                echo api_response("true", "You have successfully registered, redirecting", [
                                    "developer" => "StartWinning",
                                    "tokens" => csrf_array(),
                                    "time" => time(),
                                    "redirect" => base_url("account")
                                ]);
                            } else {
                                echo api_response("false", "An unexpected error occurred, please try again.", [
                                    "developer" => "StartWinning",
                                    "tokens" => csrf_array(),
                                    "time" => time()
                                ]);
                            }
                        }
                    } else {
                        echo api_response("false", "Passwords do not match", [
                            "developer" => "StartWinning",
                            "tokens" => csrf_array(),
                            "time" => time()
                        ]);
                    }
                } else {
                    echo api_response("false", "Incomplete or incorrect data sent", [
                        "developer" => "StartWinning",
                        "tokens" => csrf_array(),
                        "time" => time()
                    ]);
                }
            }
        } else {
            echo api_response("false", "Unauthorized access request", [
                "developer" => "StartWinning",
                "tokens" => csrf_array(),
                "time" => time()
            ]);
        }
    }    

    public function forgot(){
        if(post()){
            if(post("email")){
                $check_user = get_where("users",["email" => db_encrypt(post("email"))])->row_array();
                if($check_user){
                    
                }else{
                    echo api_response("false", "The email you entered is incorrect", [
                        "developer" => "StartWinning",
                        "tokens" => csrf_array(),
                        "time" => time()
                    ]);
                }
            }else{
                echo api_response("false", "Incomplete or incorrect data sent", [
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

    public function hwid_reset(){
        check_auth();
        if(get("hwid") == "reset"){
            $check_hwid_time = get_where("users", ["user_key" => user_data()["user_key"]])->row_array();
            $now_date = time();
            
            $two_hours_ago = $now_date - 7200;
            
            if (empty($check_hwid_time["hwid_time"])) {
                update("users",["user_key" => user_data()["user_key"]],[
                    "hardware_id" => "",
                    "hwid_time" => time(),
                ]);
                echo api_response("true", "Your HWID has been reset", [
                    "developer" => "StartWinning",
                    "tokens" => csrf_array(),
                    "time" => time()
                ]);
            } else {
                if($check_hwid_time["hwid_time"] && $check_hwid_time["hwid_time"] <= $two_hours_ago){
                    update("users",["user_key" => user_data()["user_key"]],[
                        "hardware_id" => "",
                        "hwid_time" => time(),
                    ]);
                    echo api_response("true", "Your HWID has been reset", [
                        "developer" => "StartWinning",
                        "tokens" => csrf_array(),
                        "time" => time()
                    ]);
                }else{
                    echo api_response("false", "You have to wait 2h to reset your hardware id.", [
                        "developer" => "StartWinning",
                        "tokens" => csrf_array(),
                        "time" => time()
                    ]);
                }
            }

        }else{
            echo api_response("false", "Unauthorized access request", [
                "developer" => "StartWinning",
                "tokens" => csrf_array(),
                "time" => time()
            ]);
        }
    }

    public function profile_edit(){
        check_auth();
        if(post()){
            $email = post("email");
            $password = post("password");

            $pattern = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*[!?.]).{8,}$/";
            if (!preg_match($pattern, $password)) {
                echo api_response("false", "Password does not meet the requirements", [
                    "developer" => "StartWinning",
                    "tokens" => csrf_array(),
                    "time" => time()
                ]);
            }else{
                if($email and $password){
                    $check_user = get_where("users",["email" => db_encrypt($email)])->row_array();
                    if($check_user){
                        if(db_encrypt($email) == post("email")){
                            $update = update("users",["user_key" => user_data()["user_key"]],[
                                "email" => db_encrypt($email),
                                "password" => db_encrypt($password),
                            ]);
                            if($update){
                                echo api_response("true", "Your profile has been updated", [
                                    "developer" => "StartWinning",
                                    "tokens" => csrf_array(),
                                    "time" => time()
                                ]);
                            }else{
                                echo api_response("false", "An unexpected error occurred, please try again.", [
                                    "developer" => "StartWinning",
                                    "tokens" => csrf_array(),
                                    "time" => time()
                                ]);
                            }
                        }else{
                            echo api_response("false", "The email you entered is already registered", [
                                "developer" => "StartWinning",
                                "tokens" => csrf_array(),
                                "time" => time()
                            ]);
                        }
                    }else{
                        $update = update("users",["user_key" => user_data()["user_key"]],[
                            "email" => db_encrypt($email),
                            "password" => db_encrypt($password),
                        ]);
                        if($update){
                            echo api_response("true", "Your profile has been updated", [
                                "developer" => "StartWinning",
                                "tokens" => csrf_array(),
                                "time" => time()
                            ]);
                        }else{
                            echo api_response("false", "An unexpected error occurred, please try again.", [
                                "developer" => "StartWinning",
                                "tokens" => csrf_array(),
                                "time" => time()
                            ]);
                        }
                    }
                }else{
                    echo api_response("false", "Incomplete or incorrect data sent", [
                        "developer" => "StartWinning",
                        "tokens" => csrf_array(),
                        "time" => time()
                    ]);
                }
            }
        }else{
            echo api_response("false", "Unauthorized access request", [
                "developer" => "StartWinning",
                "tokens" => csrf_array(),
                "time" => time()
            ]);
        }
    }

    public function use_cuopon(){
        check_auth();
        if(post()){
            $coupon = post("coupon");
            $check_coupon = get_where("coupons", ["coupon_code" => db_encrypt($coupon)])->row_array();
        
            if($check_coupon){
                $current_time = time();
                $coupon_expiry_time = $check_coupon['expiry_time'];
        
                if($coupon_expiry_time < $current_time){
                    echo api_response("false", "The coupon you entered has expired", [
                        "developer" => "StartWinning",
                        "tokens" => csrf_array(),
                        "time" => time()
                    ]);
                } else {
                    $coupon_key = $check_coupon['coupon_key'];
                    $user_key = user_data()["user_key"];
                    $coupon_usage_count = get_where("coupon_usage", ["coupon_key" => $coupon_key, "user_key" => $user_key])->num_result();
                    $coupon_limit = $check_coupon['coupon_limit'];
        
                    if($coupon_usage_count >= $coupon_limit){
                        echo api_response("false", "Coupon usage limit exceeded", [
                            "developer" => "StartWinning",
                            "tokens" => csrf_array(),
                            "time" => time()
                        ]);
                    } else {
                        $coupon_product = $check_coupon['coupon_product'];
        
                        if($coupon_product == "ALL"){
                            // Proceed with coupon usage for all products
                            // Add your coupon usage logic here
                            // ...
                        } else {
                            // Check if coupon is valid for specific products in the cart
                            $cart_contents = $this->cart->contents();
        
                            foreach($cart_contents as $item){
                                $product_id = $item['id'];
                                if($product_id == $coupon_product){
                                    // Proceed with coupon usage for the specific product
                                    // Add your coupon usage logic here
                                    // ...
                                    break;
                                }
                            }
        
                            echo api_response("false", "This code is not valid for these products", [
                                "developer" => "StartWinning",
                                "tokens" => csrf_array(),
                                "time" => time()
                            ]);
                        }
                    }
                }
            } else {
                echo api_response("false", "The coupon you entered is incorrect", [
                    "developer" => "StartWinning",
                    "tokens" => csrf_array(),
                    "time" => time()
                ]);
            }
        } else {
            echo api_response("false", "Unauthorized access request", [
                "developer" => "StartWinning",
                "tokens" => csrf_array(),
                "time" => time()
            ]);
        }
        
    }

    public function add_cart($product_key){
        check_auth();
        if($product_key){
            $check_key = get_where("products",["product_key" => $product_key])->row_array();
            if($check_key){
                $price = json_decode($check_key["product_period"], true);
                if ($item = $this->findRowIdInCartContents($product_key)) {
                    if ($item['qty'] != 1) {
                        $data = array(
                            'id' => $product_key,
                            'qty'     => 1,
                            'price'   => $price[get("period")]["price"],
                            'name'    => $check_key["product_name"],
                            "period"=> get("period"),
                            "period_day" => $price[get("period")]["day"]
                        );
                    
                        $cart_insert = $this->cart->insert($data);
                        if($cart_insert){
                            echo api_response("true", "Your card successfuly updated.", [
                                "developer" => "StartWinning",
                                "tokens" => csrf_array(),
                                "time" => time(),
                                "redirect" => base_url("cart")
                            ]); 
                        }else{
                            echo api_response("false", "There is been server error while adding product.", [
                                "developer" => "StartWinning",
                                "tokens" => csrf_array(),
                                "time" => time()
                            ]);   
                        }
                    } else {
                        echo api_response("true", "The product already added to cart, We redicting you to cart.", [
                            "developer" => "StartWinning",
                            "tokens" => csrf_array(),
                            "time" => time(),
                            "redirect" => base_url("cart")
                        ]); 

                        $currentPeriod = $item['period'];
                        $newPeriod = get("period");

                        if ($currentPeriod != $newPeriod) {
                    
                            $updateData = array(
                                'rowid' => $item['rowid'],
                                'period' => $newPeriod,
                                "price" => $price[get("period")]["price"],
                                'period_day' => $price[$newPeriod]["day"]
                            );
                            $cart_update = $this->cart->update($updateData);
                        }

                    }
                } else {
                    $data = array(
                        'id'      => $product_key,
                        'qty'     => 1,
                        'price'   => $price[get("period")]["price"],
                        'name'    => $check_key["product_name"],
                        "period"=> get("period"),
                        "period_day" => $price[get("period")]["day"]
                    );
                
                    $cart_insert = $this->cart->insert($data);
                    if($cart_insert){
                        echo api_response("true", "The product successfuly added to cart.", [
                            "developer" => "StartWinning",
                            "tokens" => csrf_array(),
                            "time" => time(),
                            "redirect" => base_url("cart")
                        ]); 
                    }else{
                        echo api_response("false", "There is been server error while adding product.", [
                            "developer" => "StartWinning",
                            "tokens" => csrf_array(),
                            "time" => time()
                        ]);   
                    }
                }
            }else{
                echo api_response("false", "The product you added is not exist.", [
                    "developer" => "StartWinning",
                    "tokens" => csrf_array(),
                    "time" => time()
                ]);   
            }
        }else{
            echo api_response("false", "Adding to cart failed, please return to shop page and try again.", [
                "developer" => "StartWinning",
                "tokens" => csrf_array(),
                "time" => time()
            ]);
        }
    }

    private function findRowIdInCartContents($rowIdToFind) {
        $cartContents = $this->cart->contents();
    
        foreach ($cartContents as $item) {
            if (isset($item['id']) && $item['id'] === $rowIdToFind) {
                return $item; // Eşleşen öğeyi döndür
            }
        }
    
        return false;
    }
    

}
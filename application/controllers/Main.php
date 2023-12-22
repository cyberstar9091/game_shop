<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

    public function __construct(){
        parent::__construct();
    }

    public function test(){    
        print_r(json_encode($this->cart->contents()));
    }

    public function home(){
        view('frontend/static/header');
        view('frontend/pages/home');
        view('frontend/static/footer');
    }

    public function tutorial(){
        view('frontend/static/header');
        view('frontend/pages/tutorial');
        view('frontend/static/footer');
    }

    public function coming_soon(){
        view('frontend/static/header');
        view('frontend/pages/coming_soon');
        view('frontend/static/footer');
    }

    public function not_found(){
        view('frontend/static/header');
        view('frontend/pages/404');
        view('frontend/static/footer');
    }

    public function login(){
        is_logins();
        view('frontend/static/header');
        view('frontend/pages/login');
        view('frontend/static/footer');
    }

    public function forgot(){
        is_logins();
        view('frontend/static/header');
        view('frontend/pages/forgot');
        view('frontend/static/footer');
    }

    public function privacy_policy(){
        view('frontend/static/header');
        view('frontend/pages/privacy_policy');
        view('frontend/static/footer');
    }

    public function terms_conditions(){
        view('frontend/static/header');
        view('frontend/pages/terms_conditions');
        view('frontend/static/footer');
    }

    public function products(){
        view('frontend/static/header');
        view('frontend/pages/products',[
            "products" => get_where("products",["product_status" => "active"])->result_array()
        ]);
        view('frontend/static/footer');
    }

    public function purchase($slug = null){
        view('frontend/static/header');
        $check = get_where("products",["product_slug" => $slug])->row_array();
        if(!$check or $check["product_status"] != "active"){
            view('frontend/pages/404');
        }else{
            view('frontend/pages/purchase',[
                "product" => get_where("products",["product_slug" => $slug])->row_array()
            ]);
        }
        view('frontend/static/footer');
    }

    public function register($affilate = null){
        is_logins();
        view('frontend/static/header');
        if($affilate){
            view('frontend/pages/register',[
                "affilate" => $affilate
            ]);
        }else{
            view('frontend/pages/register',[
                "affilate" => ""
            ]);
        }
        view('frontend/static/footer');
    }

    public function orders(){
        check_auth();
        view('frontend/static/header');
        view('frontend/pages/orders',[
            "user" => user_data(),
            "orders" => get_where("orders",["user_key" => user_data()["user_key"]])->result()
        ]);
        view('frontend/static/footer');
    }

    public function account(){
        check_auth();
        view('frontend/static/header');
        view('frontend/pages/account',[
            "user" => user_data(),
            "affilate" => get_where("affiliate_users",["inviting" => user_data()["affiliate_code"]])->result(),
            "products" => get_where("products",["product_status" => "active"])->result()
        ]);
        view('frontend/static/footer');
    }

    public function cart(){
        check_auth();
        view('frontend/static/header');
        view('frontend/pages/cart',[
            "user" => user_data(),
            "cart" => $this->cart->contents()
        ]);
        view('frontend/static/footer');
    }

    public function logout(){
        unset_session("auth");
        unset_session("user_key");
        session_destroy();
        redirect(base_url("login"));
    }

}
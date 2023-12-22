<?php

function mail_send($sTo, $sSubject, $sMessage){
        $CI = &get_instance();
       
        $CI->load->config('email');
        $CI->load->library('email');
        
        $from = $CI->config->item('smtp_user');

        $CI->email->set_newline("\r\n");
        $CI->email->from($from);
        $CI->email->to($sTo);
        $CI->email->subject($sSubject);
        $CI->email->message($sMessage);

        if(!$CI->email->send()){
            return -1;
        }else{
            return 1;
        } 
}   

function user_data(){
    $user_data = [];
    if(session('user_key') or session('auth')){
        $user_data = get_where("users", ["user_key" => session('user_key')])->row_array();
    }
    return $user_data;
}

function get_user($user_key = null){
    if($user_key){
        $user_data = get_where("users", ["user_key" => $user_key])->row_array();
        return $user_data;
    }else{
        return false;
    }
}

function getCurrentURL() {
    $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https://' : 'http://';
    $host = $_SERVER['HTTP_HOST'];
    $uri = $_SERVER['REQUEST_URI'];

    return $protocol . $host . $uri;
}

function unminifyJSON($minifiedJSON) {
    $decodedData = json_decode($minifiedJSON);

    if ($decodedData === null && json_last_error() !== JSON_ERROR_NONE) {
        return "JSON verileri çözümlenemedi. Hata: " . json_last_error_msg();
    }

    $unminifiedJSON = json_encode($decodedData, JSON_PRETTY_PRINT);

    return $unminifiedJSON;
}

function regex_password($password = null){
    return preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^\da-zA-Z]).{8,32}$/", $password);
}

function objectToArray($d) {
    if (is_object($d)) {
        $d = get_object_vars($d);
    }

    if (is_array($d)) {
        return array_map(__FUNCTION__, $d);
    } else {
        return $d;
    }
}

function regex_username($username = ""){
    $regex = "/^[a-zA-Z0-9_]+$/";
    if(preg_match($regex, $username)){
        return true;
    }else{
        return false;
    }
}

function random_password(){
    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $pass = array();
    $alphaLength = strlen($alphabet) - 1;
    for ($i = 0; $i < 12; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass);
}


function csrf_array(){
    $CI = &get_instance();
    $csrf = [
        'name' => $CI->security->get_csrf_token_name(),
        'hash' => $CI->security->get_csrf_hash()
    ];
    return $csrf;
}

function csrf_form(){
    $CI = &get_instance();
    echo '<input type="hidden" id="token" class="startwinning_token" name="'.$CI->security->get_csrf_token_name().'" value="'.$CI->security->get_csrf_hash().'" />';
}

function check_auth(){
    if(!session('user_key') or !session('auth')){
        redirect('login');
        exit;
    }
}

function is_logins(){
    if(session('user_key') or session('auth')){
        redirect('account');
        exit;
    }
}

function get_auth(){
    if(!session('user_key') or !session('auth')){
        return false;
    }else{
        return true;
    }
}

function isLogin(){
    if(session('user_key') or session('auth')){
        return true;
    }else{
        return false;
    }
}

function api_response($status, $message, $data = []){
    $response = [
        'status' => $status,
        'message' => $message,
        'data' => $data
    ];
    return json_encode($response);
}

function maskEmail($email) {
    $maskedEmail = '';
    $emailParts = explode('@', $email);

    if (count($emailParts) === 2) {
        $username = $emailParts[0];
        $domain = $emailParts[1];

        $maskedUsername = maskString($username);
        $maskedDomain = maskString($domain);

        $maskedEmail = $maskedUsername . '@' . $maskedDomain;
    }

    return $maskedEmail;
}

function maskString($str) {
    $masked = '';
    $length = strlen($str);

    if ($length > 2) {
        $masked = substr($str, 0, 1); // İlk karakteri maskelenmemiş olarak bırak
        for ($i = 1; $i < $length - 1; $i++) {
            $masked .= '*'; // Orta kısmı maskele (* karakteri ile değiştir)
        }
        $masked .= substr($str, -1); // Son karakteri maskelenmemiş olarak bırak
    } else {
        $masked = $str; // Eğer uzunluk 2 veya daha az ise tümünü maskelenmemiş olarak bırak
    }

    return $masked;
}

function settings($variable){
    return get_where('settings', ["id" => "1"])->row_array()[$variable];
}

function product_info($key){
    return get_where('products', ["product_key" => $key])->row_array();
}

function affilate_to_user($code){
    return get_where('users', ["affiliate_code" => $code])->row_array();
}

function day_actions($number) {
    if ($number >= 1 && $number <= 6) {
        echo $number . " Days";
    } elseif ($number % 7 == 0) {
        echo $number / 7 . " Week";
    } elseif ($number > 28) {
        echo $number / 30 . " Month";
    }
}

function day_actions2($number) {
    if ($number >= 1 && $number <= 6) {
        return $number . " Days";
    } elseif ($number % 7 == 0) {
        return $number / 7 . " Week";
    } elseif ($number > 28) {
        return $number / 30 . " Month";
    }
}

function generateKey($amount = "4096"){
    $charts = "0123456789qwertyuopasdfghjklizxcvbnmQWERTYUOPASDFGHJKLZXCVBNM";
    $pass = [];
    $alphaLength = strlen($charts) - 1;
    for ($i = 0; $i < $amount; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $charts[$n];
    }
    return implode($pass);
}

function isValidUsername($str){
    return !preg_match('/[^A-Za-z0-9.#\\-$]/', $str);
}

function affiliate_code_generator() {
    $characters = 'abcdefghijklmnopqrstuvwxyz0123456789'; // Sadece küçük harf karakterler
    $code = '';
    $length = 8;

    for ($i = 0; $i < $length; $i++) {
        $randomIndex = mt_rand(0, strlen($characters) - 1);
        $code .= $characters[$randomIndex];
    }

    return $code;
}

function guid(){
    if (function_exists('com_create_guid') === true)
        return mb_strtolower(trim(com_create_guid(), '{}'));

    $data = openssl_random_pseudo_bytes(16);
    $data[6] = chr(ord($data[6]) & 0x0f | 0x40);
    $data[8] = chr(ord($data[8]) & 0x3f | 0x80);
    $return_app = vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
    return mb_strtolower($return_app);
}

function post_get($name = ""){
    $CI = &get_instance();
    if ($name != "") {
        return $CI->input->post_get(trim($name));
    } else {
        return $CI->input->post_get();
    }
}

function get($name = ""){
    $CI = &get_instance();
    $result = $CI->input->get(trim($name));
    $result = strip_tags($result);
    $result = html_entity_decode($result);
    $result = urldecode($result);
    $result = addslashes($result);
    return $result;
}

function post($name = ""){
    $CI = &get_instance();
    if ($name != "") {
        $post = $CI->input->post(trim($name));
        if (is_string($post)) {
            $result = addslashes($CI->input->post(trim($name)));
            $result = strip_tags($result);
        } else {
            $result = $post;
        }
        return $result;
    } else {
        return $CI->input->post();
    }
}

function segment($index){
    $CI = &get_instance();
    return $CI->uri->segment($index);
}

function session($name = null){
    $CI = &get_instance();
    return $CI->session->userdata($name);
}

function set_session($name = null){
    $CI = &get_instance();
    return $CI->session->set_userdata($name);
}

function unset_session($name = null){
    $CI = &get_instance();
    return $CI->session->unset_userdata($name);
}

function insert($table, $data = []){
    $CI = get_instance();
    return $CI->db->insert($table, $data);
}

function get_where($table, $data = [], $limit = null, $select = null, $order = null){
    $CI = get_instance();
    if ($select != null) {
        $CI->db->select($select);
    }
    if ($limit != null) {
        $CI->db->limit($limit);
    }
    if ($order != null) {
        $CI->db->order_by($order[0], $order[1]);
    }

    return $CI->db->get_where($table, $data);
}

function update($table, $where = [], $data = []){
    $CI = get_instance();
    $CI->db->where($where);
    return $CI->db->update($table, $data);
}

function delete($table, $where = []){
    $CI = get_instance();
    return $CI->db->delete($table, $where);
}

function get_ip(){
    if (getenv('HTTP_CLIENT_IP')) {
        $ip = getenv('HTTP_CLIENT_IP');
    }else if (getenv('HTTP_X_FORWARDED_FOR')) {
        $ip = getenv('HTTP_X_FORWARDED_FOR');
        if (strstr($ip, ',')) {
            $tmp = explode(',', $ip);
            $ip = trim($tmp[0]);
        }
    }else {
        $ip = getenv('REMOTE_ADDR');
    }
    return $ip;
}

function db_encrypt($string){
    $CI = &get_instance();
    $get_where = $CI->db->select(["encrypt_key"])->get_where('settings', ['id' => '1'])->row_array();
    $key = $get_where['encrypt_key'];
    return openssl_encrypt($string, "AES-128-ECB", $key);
}

function db_decrypt($string){
    $CI = &get_instance();
    $get_where = $CI->db->select(["encrypt_key"])->get_where('settings', ['id' => '1'])->row_array();
    $key = $get_where['encrypt_key'];
    return openssl_decrypt($string, "AES-128-ECB", $key);
}

function view($view_path = null, $view_data = ""){
    $CI = get_instance();
    if(empty($view_data)){
        $CI->load->view($view_path);
    }else{
        $CI->load->view($view_path, $view_data);
    }
}

function permalink($str, $options = array())
{
    $str = mb_convert_encoding((string)$str, 'UTF-8', mb_list_encodings());
    $defaults = array(
        'delimiter' => '-',
        'limit' => null,
        'lowercase' => true,
        'replacements' => array(),
        'transliterate' => true
    );
    $options = array_merge($defaults, $options);
    $char_map = array(
        // Latin
        'À' => 'A', 'Á' => 'A', 'Â' => 'A', 'Ã' => 'A', 'Ä' => 'A', 'Å' => 'A', 'Æ' => 'AE', 'Ç' => 'C',
        'È' => 'E', 'É' => 'E', 'Ê' => 'E', 'Ë' => 'E', 'Ì' => 'I', 'Í' => 'I', 'Î' => 'I', 'Ï' => 'I',
        'Ð' => 'D', 'Ñ' => 'N', 'Ò' => 'O', 'Ó' => 'O', 'Ô' => 'O', 'Õ' => 'O', 'Ö' => 'O', 'Ő' => 'O',
        'Ø' => 'O', 'Ù' => 'U', 'Ú' => 'U', 'Û' => 'U', 'Ü' => 'U', 'Ű' => 'U', 'Ý' => 'Y', 'Þ' => 'TH',
        'ß' => 'ss',
        'à' => 'a', 'á' => 'a', 'â' => 'a', 'ã' => 'a', 'ä' => 'a', 'å' => 'a', 'æ' => 'ae', 'ç' => 'c',
        'è' => 'e', 'é' => 'e', 'ê' => 'e', 'ë' => 'e', 'ì' => 'i', 'í' => 'i', 'î' => 'i', 'ï' => 'i',
        'ð' => 'd', 'ñ' => 'n', 'ò' => 'o', 'ó' => 'o', 'ô' => 'o', 'õ' => 'o', 'ö' => 'o', 'ő' => 'o',
        'ø' => 'o', 'ù' => 'u', 'ú' => 'u', 'û' => 'u', 'ü' => 'u', 'ű' => 'u', 'ý' => 'y', 'þ' => 'th',
        'ÿ' => 'y',
        // Latin symbols
        '©' => '(c)',
        // Greek
        'Α' => 'A', 'Β' => 'B', 'Γ' => 'G', 'Δ' => 'D', 'Ε' => 'E', 'Ζ' => 'Z', 'Η' => 'H', 'Θ' => '8',
        'Ι' => 'I', 'Κ' => 'K', 'Λ' => 'L', 'Μ' => 'M', 'Ν' => 'N', 'Ξ' => '3', 'Ο' => 'O', 'Π' => 'P',
        'Ρ' => 'R', 'Σ' => 'S', 'Τ' => 'T', 'Υ' => 'Y', 'Φ' => 'F', 'Χ' => 'X', 'Ψ' => 'PS', 'Ω' => 'W',
        'Ά' => 'A', 'Έ' => 'E', 'Ί' => 'I', 'Ό' => 'O', 'Ύ' => 'Y', 'Ή' => 'H', 'Ώ' => 'W', 'Ϊ' => 'I',
        'Ϋ' => 'Y',
        'α' => 'a', 'β' => 'b', 'γ' => 'g', 'δ' => 'd', 'ε' => 'e', 'ζ' => 'z', 'η' => 'h', 'θ' => '8',
        'ι' => 'i', 'κ' => 'k', 'λ' => 'l', 'μ' => 'm', 'ν' => 'n', 'ξ' => '3', 'ο' => 'o', 'π' => 'p',
        'ρ' => 'r', 'σ' => 's', 'τ' => 't', 'υ' => 'y', 'φ' => 'f', 'χ' => 'x', 'ψ' => 'ps', 'ω' => 'w',
        'ά' => 'a', 'έ' => 'e', 'ί' => 'i', 'ό' => 'o', 'ύ' => 'y', 'ή' => 'h', 'ώ' => 'w', 'ς' => 's',
        'ϊ' => 'i', 'ΰ' => 'y', 'ϋ' => 'y', 'ΐ' => 'i',
        // Turkish
        'Ş' => 'S', 'İ' => 'I', 'Ç' => 'C', 'Ü' => 'U', 'Ö' => 'O', 'Ğ' => 'G',
        'ş' => 's', 'ı' => 'i', 'ç' => 'c', 'ü' => 'u', 'ö' => 'o', 'ğ' => 'g',
        // Russian
        'А' => 'A', 'Б' => 'B', 'В' => 'V', 'Г' => 'G', 'Д' => 'D', 'Е' => 'E', 'Ё' => 'Yo', 'Ж' => 'Zh',
        'З' => 'Z', 'И' => 'I', 'Й' => 'J', 'К' => 'K', 'Л' => 'L', 'М' => 'M', 'Н' => 'N', 'О' => 'O',
        'П' => 'P', 'Р' => 'R', 'С' => 'S', 'Т' => 'T', 'У' => 'U', 'Ф' => 'F', 'Х' => 'H', 'Ц' => 'C',
        'Ч' => 'Ch', 'Ш' => 'Sh', 'Щ' => 'Sh', 'Ъ' => '', 'Ы' => 'Y', 'Ь' => '', 'Э' => 'E', 'Ю' => 'Yu',
        'Я' => 'Ya',
        'а' => 'a', 'б' => 'b', 'в' => 'v', 'г' => 'g', 'д' => 'd', 'е' => 'e', 'ё' => 'yo', 'ж' => 'zh',
        'з' => 'z', 'и' => 'i', 'й' => 'j', 'к' => 'k', 'л' => 'l', 'м' => 'm', 'н' => 'n', 'о' => 'o',
        'п' => 'p', 'р' => 'r', 'с' => 's', 'т' => 't', 'у' => 'u', 'ф' => 'f', 'х' => 'h', 'ц' => 'c',
        'ч' => 'ch', 'ш' => 'sh', 'щ' => 'sh', 'ъ' => '', 'ы' => 'y', 'ь' => '', 'э' => 'e', 'ю' => 'yu',
        'я' => 'ya',
        // Ukrainian
        'Є' => 'Ye', 'І' => 'I', 'Ї' => 'Yi', 'Ґ' => 'G',
        'є' => 'ye', 'і' => 'i', 'ї' => 'yi', 'ґ' => 'g',
        // Czech
        'Č' => 'C', 'Ď' => 'D', 'Ě' => 'E', 'Ň' => 'N', 'Ř' => 'R', 'Š' => 'S', 'Ť' => 'T', 'Ů' => 'U',
        'Ž' => 'Z',
        'č' => 'c', 'ď' => 'd', 'ě' => 'e', 'ň' => 'n', 'ř' => 'r', 'š' => 's', 'ť' => 't', 'ů' => 'u',
        'ž' => 'z',
        // Polish
        'Ą' => 'A', 'Ć' => 'C', 'Ę' => 'e', 'Ł' => 'L', 'Ń' => 'N', 'Ó' => 'o', 'Ś' => 'S', 'Ź' => 'Z',
        'Ż' => 'Z',
        'ą' => 'a', 'ć' => 'c', 'ę' => 'e', 'ł' => 'l', 'ń' => 'n', 'ó' => 'o', 'ś' => 's', 'ź' => 'z',
        'ż' => 'z',
        // Latvian
        'Ā' => 'A', 'Č' => 'C', 'Ē' => 'E', 'Ģ' => 'G', 'Ī' => 'i', 'Ķ' => 'k', 'Ļ' => 'L', 'Ņ' => 'N',
        'Š' => 'S', 'Ū' => 'u', 'Ž' => 'Z',
        'ā' => 'a', 'č' => 'c', 'ē' => 'e', 'ģ' => 'g', 'ī' => 'i', 'ķ' => 'k', 'ļ' => 'l', 'ņ' => 'n',
        'š' => 's', 'ū' => 'u', 'ž' => 'z'
    );
    $str = preg_replace(array_keys($options['replacements']), $options['replacements'], $str);
    if ($options['transliterate']) {
        $str = str_replace(array_keys($char_map), $char_map, $str);
    }
    $str = preg_replace('/[^\p{L}\p{Nd}]+/u', $options['delimiter'], $str);
    $str = preg_replace('/(' . preg_quote($options['delimiter'], '/') . '){2,}/', '$1', $str);
    $str = mb_substr($str, 0, ($options['limit'] ? $options['limit'] : mb_strlen($str, 'UTF-8')), 'UTF-8');
    $str = trim($str, $options['delimiter']);
    return $options['lowercase'] ? mb_strtolower($str, 'UTF-8') : $str;
}

function generateUniqKey($word) {
    $word = mb_strtolower($word, 'UTF-8');
    $word = str_replace(' ', '_', $word);
    $turkishChars = array('ç', 'ğ', 'ı', 'i', 'ö', 'ş', 'ü');
    $latinChars   = array('c', 'g', 'i', 'i', 'o', 's', 'u');
    $word = str_replace($turkishChars, $latinChars, $word);
    $word = preg_replace('/[^a-zA-Z0-9_]/', '', $word);
    $word = preg_replace('/_+/', '_', $word);
    return $word;
}
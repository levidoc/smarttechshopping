<?php
include_once dirname(__FILE__)."/config.php"; 

define('LICENSE_KEY',retrieve_license_keys()); 
define('CURRENCY_CODE',retrieve_currency_code());

$api_endpoint = $config_settings['api_endpoint'];

function pass_processing_character($data){
    $output  = $data; 
    return $output; 
}

function process_special_character($data){
    $special_chars = array(
        '%'=>'%25', 
        ' '=>'%20',
        '<'=>'%3C',
        '>'=>'%3E',
        '#'=>'%23',
        '"'=>'%22',
        '{'=>'%7B',
        '}'=>'%7D',
        '|'=>'%7C',
        '\\'=>'%5C',
        '^'=>'%5E',
        '~'=>'%7E',
        '['=>'%5B',
        ']'=>'%5D',
        '`'=>'%60',
        ';'=>'%3B',
        '/'=>'%2F',
        '?'=>'%3F',
        ':'=>'%3A',
        '@'=>'%40',
        '='=>'%3D',
        '&'=>'%26',
        '$'=>'%24',
        '+'=>'%2B',
        ','=>'%2C',
        '\''=>'%27',
        '!'=>'%21',
        '('=>'%28',
        ')'=>'%29',
        '*'=>'%2A',
        '-'=>'%2D',
        '.'=>'%2E',
        '_'=>'%5F'

    ); 

    $output = str_replace(array_keys($special_chars),array_values($special_chars),$data); 
    return $output; 
}

function retrieve_license_keys(){
    $parentDirectory = get_parent_directory();
    $file_path = $parentDirectory.'/DATA_SETS/genetic_build.json';
    $output = FALSE; 

    if (file_exists($file_path)){
        $_contents = json_decode(file_get_contents($file_path),true);
        if (!isset($_contents['BUILD_CODE'])){
            return null;     
        }

        $buildCode = $_contents['BUILD_CODE'];
        $output = $buildCode; 

    }    
    
    return $output; 
}

function retrieve_currency_code($section="CURRENCY_CODE"){
    $parentDirectory = get_parent_directory();
    $file_path = $parentDirectory.'/DATA_SETS/genetic_build.json';
    $output = FALSE; 

    if (file_exists($file_path)){
        $_contents = json_decode(file_get_contents($file_path),true);

        if (!isset($_contents['CURRENCY'][$section])){
            return null; 
        }

        $buildCode = $_contents['CURRENCY'][$section];
        $output = $buildCode; 

    }    
    
    return $output; 
}

function get_parent_directory(){
    $parentDirectory = dirname(__DIR__);
    return $parentDirectory; 
}

function get_primary_directory()
{
    $output = dirname(__FILE__) . '//';
    return $output;
}

function retrieve_server_key()
{
    global $api_endpoint;

    $ch = curl_init();
    $url = $api_endpoint . "/initiate.php?license_key=" . pass_processing_character(LICENSE_KEY) . "&mode=ENCRYPTION_RETRIEVE";
    
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $resp = curl_exec($ch);
    if ($e = curl_error($ch)) {
        echo ($e);
    } else {
        $decoded = json_decode($resp, JSON_PRETTY_PRINT);
        $api_data = $decoded;
        if ($api_data['status'] == 201) {
            $SERVER_KEY = $api_data['data'];
            return $SERVER_KEY;
            exit;
        }
    }

    curl_close($ch);

    return NULL;
    //Extend The Function 
}

function create_directory($directory_path)
{
    $directory = $directory_path;

    $output = TRUE;
    if (!is_dir($directory)) {
        if (!mkdir($directory, 0777, true)) {
            $output = FALSE;
        }
    } else {
        $output = TRUE;
    }

    return $output;
}

function generate_genetic_information(){
    global $api_endpoint;

    $return = FALSE; 

    $ch = curl_init();
    $url = $api_endpoint . "composer.php?code=" . pass_processing_character(LICENSE_KEY);

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $resp = curl_exec($ch);
    if ($e = curl_error($ch)) {
        echo ($e);
    } else {
        $decoded = json_decode($resp, JSON_PRETTY_PRINT);
        $api_data = $decoded;
        if ($api_data['status'] == 201) {
            $output = json_encode($api_data['data'],JSON_PRETTY_PRINT);
            $parentDir = get_parent_directory(); // Get the parent directory path

            $directoryName = 'DATA_SETS'; // Replace with the desired directory name

            $directoryPath = $parentDir . DIRECTORY_SEPARATOR . $directoryName; // Create the full directory path

            if (!is_dir($directoryPath)) {
                // Directory does not exist, create it
                if (mkdir($directoryPath, 0755)) {
                    $composer_file_name = $directoryPath."/genetic_build.json"; 
                    file_put_contents($composer_file_name,$output);
                    $return = true;                 
                }
            } else {
                $composer_file_name = $directoryPath."/genetic_build.json"; 
                file_put_contents($composer_file_name,$output);
                $return = true; 
                
            }
        }
    }

    curl_close($ch);
    return $return; 
}

function generate_encryption_algorithm(){
    $output = FALSE;

    global $api_endpoint;

    $CLIENT_TOKEN = simple_encryption(base64_decode(base64_encode(openssl_random_pseudo_bytes(32))));

    $SERVER_TOKEN = retrieve_server_key();

    $ch = curl_init();
    $url = $api_endpoint . "/initiate.php?license_key=" . pass_processing_character(LICENSE_KEY) . "&mode=ENCRYPTION_SET&keyset=" . pass_processing_character($CLIENT_TOKEN);
        
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $resp = curl_exec($ch);
    if ($e = curl_error($ch)) {
        echo ($e);
    } else {
        $decoded = json_decode($resp, JSON_PRETTY_PRINT);
        $api_data = $decoded;

        if ($api_data['status'] == 201) {
            $CLIENT_TOKEN = $api_data['data'];
        }
    }

    curl_close($ch);
}

function validate_license_keys($license_key = FALSE)
{
    $output = FALSE;

    if ($license_key == FALSE) {
        $license_key = LICENSE_KEY;
    }
    //Extend The Function 

    return $output;
}

function system_encryption($data)
{
    include_once "encryption_algorithm.php";
    #Include The Encryption Algorithms To Retrieve ENcryption Tokens

    $first_set = SERVER_ENCRYPTION_TOKEN;
    $second_set = CLIENT_ENCRYPTION_TOKEN;

    $output = api_encryption($data, $first_set, $second_set);
    function api_encryption($data, $first_set = FALSE, $second_set = FALSE)
    {


        $first_set = base64_decode($first_set);
        //Set The First Encryption Key 


        $second_set = base64_decode($second_set);
        //Set The Second Encryption Key 

        //CONNECT THE ENCRYPTION KEYS
        $first_key = $first_set;
        $second_key = $second_set;

        $method = "aes-256-cbc";
        $iv_length = openssl_cipher_iv_length($method);
        $iv = openssl_random_pseudo_bytes($iv_length);

        $first_encrypted = openssl_encrypt($data, $method, $first_key, OPENSSL_RAW_DATA, $iv);
        $second_encrypted = hash_hmac('sha3-512', $first_encrypted, $second_key, TRUE);

        $output = base64_encode($iv . $second_encrypted . $first_encrypted);
        return $output;

        //Introduce New Encryption Algorithms 
    }
}

function system_decryption($data)
{
    include_once "encryption_algorithm.php";
    #Include The Encryption Algorithms To Retrieve Encryption Tokens

    $first_set = SERVER_ENCRYPTION_TOKEN;
    $second_set = CLIENT_ENCRYPTION_TOKEN;

    $output = api_decryption($data, $first_set, $second_set);

    function api_decryption($data, $first_set = FALSE, $second_set = FALSE)
    {

        $first_set = base64_decode($first_set);
        //Set The First Encryption Key 


        $second_set = base64_decode($second_set);
        //Set The Second Encryption Key 

        //CONNECT THE ENCRYPTION KEYS
        $first_key = $first_set;
        $second_key = $second_set;

        $mix = base64_decode($data);

        $method = "aes-256-cbc";
        $iv_length = openssl_cipher_iv_length($method);

        $iv = substr($mix, 0, $iv_length);
        $second_encrypted = substr($mix, $iv_length, 64);
        $first_encrypted = substr($mix, $iv_length + 64);

        $data = openssl_decrypt($first_encrypted, $method, $first_key, OPENSSL_RAW_DATA, $iv);
        $second_encrypted_new = hash_hmac('sha3-512', $first_encrypted, $second_key, TRUE);

        if (hash_equals($second_encrypted, $second_encrypted_new)) {
            return $data;
        } else {
            return false;
        }
    }
}

function check_api_status()
{
    global $api_endpoint;

    $ch = curl_init();
    $url = $api_endpoint . "/initiate.php?license_key=" . pass_processing_character(LICENSE_KEY);

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $resp = curl_exec($ch);
    if ($e = curl_error($ch)) {
        echo ($e);
    } else {
        $decoded = json_decode($resp, JSON_PRETTY_PRINT);
        $api_data = $decoded;

        if ($api_data['status'] == 200) {
            return true;
        }
    }

    curl_close($ch);

    return FALSE;
}

function retrieve_store_data_api($index = FALSE){
    global $api_endpoint;
    $output = FALSE;

    $ch = curl_init();
    if ($index == FALSE) {
        $url = $api_endpoint . "/store.php?license_key=" . pass_processing_character(LICENSE_KEY);
    } else {
        $url = $api_endpoint . "/store.php?license_key=" . pass_processing_character(LICENSE_KEY) . "&index=" . pass_processing_character($index);
    }

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $resp = curl_exec($ch);
    if ($e = curl_error($ch)) {
        echo ($e);
    } else {
        $decoded = json_decode($resp, JSON_PRETTY_PRINT);
        $api_data = $decoded;
        if ($api_data['status'] == 201) {
            $output = $api_data['data'];
            return $output;
        }
    }

    curl_close($ch);

    return $output;
}

function retrieve_delivery_data_api($index){
    global $api_endpoint;
    $output = FALSE;

    $ch = curl_init();
    $url = $api_endpoint . "delivery.php?license_key=".pass_processing_character(LICENSE_KEY)."&vendor=".pass_processing_character($index);
    
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $resp = curl_exec($ch);
    if ($e = curl_error($ch)) {
        echo ($e);
    } else {
        $decoded = json_decode($resp, JSON_PRETTY_PRINT);
        $api_data = $decoded;
        if ($api_data['status'] == 201) {
            $output = $api_data['data'];
            return $output;
        }
    }

    curl_close($ch);

    return $output;
}

function retrieve_product_data_api($index = FALSE)
{
    global $api_endpoint;
    $output = FALSE;

    $ch = curl_init();
    if ($index == FALSE) {
        $url = $api_endpoint . "/products.php?license_key=" . pass_processing_character(LICENSE_KEY);
    } else {
        $url = $api_endpoint . "/products.php?license_key=" . pass_processing_character(LICENSE_KEY) . "&index=" . pass_processing_character($index);
    }

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $resp = curl_exec($ch);
    if ($e = curl_error($ch)) {
        echo ($e);
    } else {
        $decoded = json_decode($resp, JSON_PRETTY_PRINT);
        $api_data = $decoded;
        if ($api_data['status'] == 201) {
            $output = $api_data['data'];
            return $output;
        }
    }

    curl_close($ch);

    return $output;
}

function retrieve_category_data_api($index = FALSE)
{
    global $api_endpoint;
    $output = FALSE;

    $ch = curl_init();
    if ($index == FALSE) {
        $url = $api_endpoint . "/category.php?license_key=" . pass_processing_character(LICENSE_KEY);
    } else {
        $url = $api_endpoint . "/category.php?license_key=" . pass_processing_character(LICENSE_KEY) . "&index=" . pass_processing_character($index);
    }

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $resp = curl_exec($ch);
    if ($e = curl_error($ch)) {
        echo ($e);
    } else {
        $decoded = json_decode($resp, JSON_PRETTY_PRINT);
        $api_data = $decoded;
        if ($api_data['status'] == 201) {
            $output = $api_data['data'];
            return $output;
        }
    }

    curl_close($ch);

    return $output;
}

function record_wishlist_data_api($product_id,$tracking_code,$account_code=FALSE){
    global $api_endpoint;
    $output = FALSE;

    $ch = curl_init();
    $url = $api_endpoint . "/wishlist.php?license_key=" . pass_processing_character(LICENSE_KEY) . "&mode=INSERT&tracking_code=".pass_processing_character($tracking_code)."&product_id=".pass_processing_character($product_id)."&user_code=".pass_processing_character($account_code);
        
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $resp = curl_exec($ch);
    if ($e = curl_error($ch)) {
        echo ($e);
    } else {
        $decoded = json_decode($resp, JSON_PRETTY_PRINT);
        $api_data = $decoded;
        if ($api_data['status'] == 201) {
            $output = $api_data['data'];
            return $output;
        }
    }

    curl_close($ch);

    return $output;

}

function record_cart_data_api($product_id,$quantity,$tracking_code,$account_code=FALSE){
    global $api_endpoint;
    $output = FALSE;

    $ch = curl_init();
    $url = $api_endpoint . "/cart.php?license_key=" . pass_processing_character(LICENSE_KEY) . "&mode=INSERT&tracking_code=".pass_processing_character($tracking_code)."&product_id=".pass_processing_character($product_id)."&user_code=".pass_processing_character($account_code)."&quantity=".pass_processing_character($quantity);

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $resp = curl_exec($ch);
    if ($e = curl_error($ch)) {
        echo ($e);
    } else {
        $decoded = json_decode($resp, JSON_PRETTY_PRINT);
        $api_data = $decoded;
        if ($api_data['status'] == 201) {
            $output = $api_data['data'];
            return $output;
        }
    }

    curl_close($ch);

    return $output;


}

function retrieve_cart_data_api(){
    global $api_endpoint;
    $output = FALSE;

    $ch = curl_init();
    $url = $api_endpoint . "/cart.php?license_key=" . pass_processing_character(LICENSE_KEY) . "&mode=EXPORT";

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $resp = curl_exec($ch);
    if ($e = curl_error($ch)) {
        echo ($e);
    } else {
        $decoded = json_decode($resp, JSON_PRETTY_PRINT);
        $api_data = $decoded;
        if ($api_data['status'] == 201) {
            $output = $api_data['data'];
            return $output;
        }
    }

    curl_close($ch);

    return $output;

}

function delete_cart_data_api($product_id,$tracking_code){
    global $api_endpoint;
    $output = FALSE;

    $ch = curl_init();
    $url = $api_endpoint . "/cart.php?license_key=" . pass_processing_character(LICENSE_KEY) . "&mode=DELETE&tracking_code=".pass_processing_character($tracking_code)."&product_id=".pass_processing_character($product_id);

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $resp = curl_exec($ch);
    if ($e = curl_error($ch)) {
        echo ($e);
    } else {
        $decoded = json_decode($resp, JSON_PRETTY_PRINT);
        $api_data = $decoded;
        if ($api_data['status'] == 201) {
            $output = $api_data['data'];
            return $output;
        }
    }

    curl_close($ch);

    return $output;

}

function create_tracking_code(){
    global $api_endpoint;
    $output = FALSE;

    $ch = curl_init();
    $url = $api_endpoint . "/cart.php?license_key=" . pass_processing_character(LICENSE_KEY) . "&mode=CREATE_CODE";

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $resp = curl_exec($ch);
    if ($e = curl_error($ch)) {
        echo ($e);
    } else {
        $decoded = json_decode($resp, JSON_PRETTY_PRINT);
        $api_data = $decoded;
        if ($api_data['status'] == 201) {
            $output = $api_data['data'];
            return $output;
        }
    }

    curl_close($ch);

    return $output;


}

function delete_wishlist_data_api($product_id,$tracking_code){
    global $api_endpoint;
    $output = FALSE;

    $ch = curl_init();
    $url = $api_endpoint . "/wishlist.php?license_key=" . pass_processing_character(LICENSE_KEY) . "&mode=DELETE&tracking_code=".pass_processing_character($tracking_code)."&product_id=".pass_processing_character($product_id);

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $resp = curl_exec($ch);
    if ($e = curl_error($ch)) {
        echo ($e);
    } else {
        $decoded = json_decode($resp, JSON_PRETTY_PRINT);
        $api_data = $decoded;
        if ($api_data['status'] == 201) {
            $output = $api_data['data'];
            return $output;
        }
    }

    curl_close($ch);

    return $output;

}

function retrieve_wishlist_data_api(){
    global $api_endpoint;
    $output = FALSE;

    $ch = curl_init();
    $url = $api_endpoint . "/wishlist.php?license_key=" . pass_processing_character(LICENSE_KEY) . "&mode=EXPORT";

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $resp = curl_exec($ch);
    if ($e = curl_error($ch)) {
        echo ($e);
    } else {
        $decoded = json_decode($resp, JSON_PRETTY_PRINT);
        $api_data = $decoded;
        if ($api_data['status'] == 201) {
            $output = $api_data['data'];
            return $output;
        }
    }

    curl_close($ch);

    return $output;

}

function retrieve_mandatory_policy_data_api($index = FALSE)
{
    global $api_endpoint;
    $output = FALSE;

    $ch = curl_init();
    if ($index == FALSE) {
        $url = $api_endpoint . "/policies.php?license_key=" . pass_processing_character(LICENSE_KEY) . "&mode=mandatory";
    } else {
        $url = $api_endpoint . "/policies.php?license_key=" . pass_processing_character(LICENSE_KEY) . "&mode=mandatory&index=" . pass_processing_character($index);
    }

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $resp = curl_exec($ch);
    if ($e = curl_error($ch)) {
        echo ($e);
    } else {
        $decoded = json_decode($resp, JSON_PRETTY_PRINT);
        $api_data = $decoded;
        if ($api_data['status'] == 201) {
            $output = $api_data['data'];
            return $output;
        }
    }

    curl_close($ch);

    return $output;
}

function retrieve_policy_data_api($index = FALSE)
{
    global $api_endpoint;
    $output = FALSE;

    $ch = curl_init();
    if ($index == FALSE) {
        $url = $api_endpoint . "/policies.php?license_key=" . pass_processing_character(LICENSE_KEY);
    } else {
        $url = $api_endpoint . "/policies.php?license_key=" . pass_processing_character(LICENSE_KEY) . "&index=" . pass_processing_character($index);
    }

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $resp = curl_exec($ch);
    if ($e = curl_error($ch)) {
        echo ($e);
    } else {
        $decoded = json_decode($resp, JSON_PRETTY_PRINT);
        $api_data = $decoded;
        if ($api_data['status'] == 201) {
            $output = $api_data['data'];
            return $output;
        }
    }

    curl_close($ch);

    return $output;
}

function recent_updates(){
    global $api_endpoint;  
    $state = FALSE;

    
    $ch = curl_init();
    $url = $api_endpoint . "composer.php?code=" . pass_processing_character(LICENSE_KEY);

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $resp = curl_exec($ch);
    if ($e = curl_error($ch)) {
        echo ($e);
    } else {
        $decoded = json_decode($resp, JSON_PRETTY_PRINT);
        $api_data = $decoded;
        if (empty($api_data)){
            return null; 
            exit();
        }
        
        if ($api_data['status'] == 201) {
            $api_compile = ($api_data['data']);

            $genetic_file = get_parent_directory().'/DATA_SETS/genetic_build.json';

            $json_compile = json_decode(file_get_contents($genetic_file),JSON_PRETTY_PRINT);

            $api_compile_date = $api_compile['LAST_COMPILED'];
            $json_compile_date = $json_compile['LAST_COMPILED']; 

            if ($api_compile_date === $json_compile_date){
                return FALSE;
            }else{
                return TRUE; 
            }
        }
    }

    return $state; 
}

function api_retrieve_order_details($vendor_code,$order_code){
    global $api_endpoint;  
    $state = FALSE;
    
    $ch = curl_init();
    $url = $api_endpoint . "/order.php?license_key=".pass_processing_character(LICENSE_KEY)."&vendor_code=".pass_processing_character($vendor_code)."&order=".pass_processing_character($order_code);

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $resp = curl_exec($ch);
    if ($e = curl_error($ch)) {
        echo ($e);
    } else {
        $decoded = json_decode($resp, JSON_PRETTY_PRINT);
        $api_data = $decoded;
        if ($api_data['status'] == 201) {
            $x = $api_data['data'];
            return ($x);  
        }
    }
    return $state; 
}

function api_retrieve_track_order($user_code,$order_code){
    global $api_endpoint;  
    $state = FALSE;
    
    $ch = curl_init();
    $url = $api_endpoint . "/order.php?license_key=".pass_processing_character(LICENSE_KEY)."&mode=ORDER_TRACK&user_code=".pass_processing_character($user_code)."&order=".pass_processing_character($order_code);

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $resp = curl_exec($ch);
    if ($e = curl_error($ch)) {
        echo ($e);
    } else {
        $decoded = json_decode($resp, JSON_PRETTY_PRINT);
        $api_data = $decoded;
        if ($api_data['status'] == 201) {
            $x = $api_data['data'];
            return ($x);  
        }
    }
    return $state; 
}

function api_retrieve_customer_details($user_code){
    global $api_endpoint;  
    $state = FALSE;
    
    $ch = curl_init();
    $url = $api_endpoint . "customer.php?license_key=".pass_processing_character(LICENSE_KEY)."&user_code=".pass_processing_character($user_code);

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $resp = curl_exec($ch);
    if ($e = curl_error($ch)) {
        echo ($e);
    } else {

        $decoded = json_decode($resp, JSON_PRETTY_PRINT);
        $api_data = $decoded;
        if ($api_data['status'] == 201) {
            $x = $api_data['data'];
            return ($x);  
        }
    }

    return $state; 
}

function api_save_billing_details($account_id, $tracking_session, $fname, $lname, $company_name, $phone_numbers, $email, $address, $city, $state, $zip, $country){
    global $api_endpoint; 

    $output = FALSE; 
    $data = array(
        'mode'=>'BILLING',
        'account_code'=>pass_processing_character($account_id),
        'tracking_code'=>pass_processing_character($tracking_session),
        'first_name'=>pass_processing_character($fname),
        'last_name'=>pass_processing_character($lname),
        'company'=>pass_processing_character($company_name),
        'phone'=>pass_processing_character($phone_numbers),
        'email'=>pass_processing_character($email),
        'address'=>pass_processing_character($address),
        'city'=>pass_processing_character($city),
        'state'=>pass_processing_character($state),
        'zip'=>pass_processing_character($zip),
        'country'=>pass_processing_character($country),
        'license_key'=>pass_processing_character(LICENSE_KEY),
    );

    $ch = curl_init($api_endpoint.'customer.php');
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($ch); 
    $response = json_decode($response,JSON_PRETTY_PRINT);
    
    curl_close($ch);

    // Display the returned data
    if ($response['status'] == 201){
        $output = $response['data']; 
    }

    return $output; 

}

function api_save_customer_shipping($user_code,$fname,$lname,$country,$state,$city,$zip,$street){
    global $api_endpoint; 

    $output = FALSE; 
    $data = array(
        'mode'=>'SHIPPING',
        'account_code'=>pass_processing_character($user_code),
        'first_name'=>pass_processing_character($fname),
        'last_name'=>pass_processing_character($lname),
        'country'=>pass_processing_character($country),
        'city'=>pass_processing_character($city),
        'state'=>pass_processing_character($state),
        'street'=>pass_processing_character($street),
        'zip'=>pass_processing_character($zip),
        'license_key'=>pass_processing_character(LICENSE_KEY),
    );

    $ch = curl_init($api_endpoint.'customer.php');
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($ch); 
    $response = json_decode($response,JSON_PRETTY_PRINT);
    
    curl_close($ch);

    // Display the returned data
    if ($response['status'] == 201){
        $output = $response['data']; 
    }

    return $output; 

}

function api_send_create_account($license_key,$username,$password,$email,$phone){
    global $api_endpoint; 

    $output = FALSE; 
    $data = array(
        
        'username'=>pass_processing_character($username),
        'email'=>pass_processing_character($email),
        'phone'=>pass_processing_character($phone),  
        'password'=>pass_processing_character($password),
        'license_key'=>pass_processing_character($license_key),
    );

    $ch = curl_init($api_endpoint.'user_create.php');
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $response = json_decode(curl_exec($ch),JSON_PRETTY_PRINT);
    curl_close($ch);

    // Display the returned data
    if ($response['status'] == 201){
        $output = $response['data']; 
    }

    return $output; 
}

function api_connect_account($license_key,$username,$password){
    global $api_endpoint; 

    $output = FALSE; 
    $data = array(
        
        'username'=>pass_processing_character($username),
        'password'=>pass_processing_character($password),
        'license_key'=>pass_processing_character($license_key),
    );

    $ch = curl_init($api_endpoint.'user_connect.php');
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $response = (curl_exec($ch));
    curl_close($ch);

    $response = json_decode($response,JSON_PRETTY_PRINT);
    // Display the returned data
    if ($response['status'] == 201){
        $output = $response['data']; 
    }

    return $output; 
}

function api_validate_account_code($license_key,$code){
    global $api_endpoint; 

    $output = FALSE; 
    $data = array(
        'user_code'=>pass_processing_character($code),
        'license_key'=>pass_processing_character($license_key),
    );

    $ch = curl_init($api_endpoint.'user_cookie.php');
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $response = (curl_exec($ch));
    curl_close($ch);

    $response = json_decode($response,JSON_PRETTY_PRINT);
    // Display the returned data
    if ($response['status'] == 201){
        $output = $response['data']; 
    }

    return $output; 

}

/*
function api_currency_converter_rate($amount, $fromCurrency, $toCurrency) {
    $apiUrl = "https://api.exchangerate-api.com/v4/latest/USD";
    
    $response = file_get_contents($apiUrl);
    $data = json_decode($response, true);
    
    if ($fromCurrency != "USD") {
        $amountInUSD = $amount / $data["rates"][$fromCurrency];
    } else {
        $amountInUSD = $amount;
    }
    
    $convertedAmount = $amountInUSD * $data["rates"][$toCurrency];
    
    return $convertedAmount;

}
*/

function api_currency_converter_rate($amount, $fromCurrency, $toCurrency) {
    global $api_endpoint; 
    $apiUrl = $api_endpoint."currency-exchange.php";

    // Initialize cURL session
    $curl = curl_init($apiUrl);

    // Set options for the cURL session
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HEADER, false);

    // Execute the cURL session
    $response = curl_exec($curl);

    // Close the cURL session
    curl_close($curl);

    $data = json_decode($response, true);

    if ($fromCurrency != "USD") {
        $amountInUSD = $amount / $data["rates"][$fromCurrency];
    } else {
        $amountInUSD = $amount;
    }

    $convertedAmount = $amountInUSD * $data["rates"][$toCurrency];

    return $convertedAmount;
}

function backup_currency_rates(){
    
    $file_path = get_parent_directory().'/DATA_SETS/product_pack.json'; 
    $output = FALSE; 
    if (file_exists($file_path)){
        $currency_list = []; 
        $currency_rate_list = array(
            'UPDATE_TIME' => date('Y-m-d'),
            'CURRENCY_CODE' => CURRENCY_CODE,
            'CURRENCY_SIGN' => retrieve_currency_code("CURRENCY_SIGN"),
        ); 

        $product_contents = json_decode(file_get_contents($file_path),true); 
        foreach($product_contents as $row){
            $product_currency = $row['CURRENCY']['CODE'];
            if ( !in_array($product_currency,$currency_list)){
                $currency_list[] = $product_currency; 

                $rate = api_currency_converter_rate(1,$product_currency,CURRENCY_CODE); 
                $_data = array(
                    'CURRENCY' => $product_currency,
                    'RATE' => $rate,
                    'DATE' => date('Y-m-d'),
                ); 
                $currency_rate_list[] = $_data; 
            } 

        }

        $file_path = get_parent_directory().'/DATA_SETS/currency_rate_backup.json';
        $data = json_encode($currency_rate_list,JSON_PRETTY_PRINT);
        try {
            file_put_contents($file_path,$data); 
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
    return $output; 
}

function sync_data(){
    if (recent_updates() == TRUE){
        generate_genetic_information();
        update_data_packs(); 
    }
}

function retrieve_coupon($code){
    $output = FALSE; 
    global $api_endpoint;
    $output = FALSE;

    $ch = curl_init();

    $url = $api_endpoint. "/discount.php?license_key=" . pass_processing_character(LICENSE_KEY) . "&code=".pass_processing_character($code); 

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $resp = curl_exec($ch);
    if ($e = curl_error($ch)) {
        echo ($e);
    } else {
        $decoded = json_decode($resp, JSON_PRETTY_PRINT);
        $api_data = $decoded;
        if ($api_data['status'] == 201) {
            $output = $api_data['data'];
            return $output;
        }
    }
    curl_close($ch);

    return $output;
}

function update_data_packs()
{
    create_directory(get_parent_directory().'/DATA_SETS');
    $product_pack_file = get_parent_directory().'/DATA_SETS/product_pack.json';
    $product_data = json_encode(retrieve_product_data_api(), JSON_PRETTY_PRINT);

    file_put_contents($product_pack_file, $product_data);
    //Product Section 

    $category_pack_file = get_parent_directory().'/DATA_SETS/catgory_pack.json';
    $category_data = json_encode(retrieve_category_data_api(), JSON_PRETTY_PRINT);

    file_put_contents($category_pack_file, $category_data);
    //Category Section 

    $mandatory_pack_file = get_parent_directory().'/DATA_SETS/mandatory_policy_pack.json';
    $mandatory_data = json_encode(retrieve_mandatory_policy_data_api(), JSON_PRETTY_PRINT);

    file_put_contents($mandatory_pack_file, $mandatory_data);
    //Mandatory Policy Section

    $policy_pack_file = get_parent_directory().'/DATA_SETS/policy_pack.json';
    $policy_data = json_encode(retrieve_policy_data_api(), JSON_PRETTY_PRINT);

    file_put_contents($policy_pack_file, $policy_data);
    //Store Policy Section 

    $store_pack_file = get_parent_directory().'/DATA_SETS/vendor_pack.json';
    $store_data = json_encode(retrieve_store_data_api(),JSON_PRETTY_PRINT); 

    file_put_contents($store_pack_file, $store_data);
    //System Products 

    $store_wishlist_file = get_parent_directory().'/DATA_SETS/wishlist_pack.json';
    $wishlist_data = json_encode(retrieve_wishlist_data_api(),JSON_PRETTY_PRINT);

    file_put_contents($store_wishlist_file,$wishlist_data);
    //System Wishlist 

    $store_cart_file = get_parent_directory().'/DATA_SETS/shopping_cart_pack.json';
    $cart_data = json_encode(retrieve_cart_data_api(),JSON_PRETTY_PRINT);

    file_put_contents($store_cart_file,$cart_data);
    //System Cart

    //retrieve_cart_data_api
    backup_currency_rates();

}

define('ENCRYPTION_KEY', '4736d52f85bdb63e46bf7d6d41bbd551af36e1bfb7c68164bf81e2400d291319');

function encrypt_url($string, $salt = null)
{
    if ($salt === null) {
        $salt = hash('sha256', uniqid(mt_rand(), true));
    }  // this is an unique salt per entry and directly stored within a password
    return base64_encode(openssl_encrypt($string, 'AES-256-CBC', ENCRYPTION_KEY, 0, str_pad(substr($salt, 0, 16), 16, '0', STR_PAD_LEFT))) . ':' . $salt;
}
function decrypt_url($string)
{
    if (count(explode(':', $string)) !== 2) {
        return $string;
    }
    $salt = explode(":", $string)[1];
    $string = explode(":", $string)[0]; // read salt from entry
    return openssl_decrypt(base64_decode($string), 'AES-256-CBC', ENCRYPTION_KEY, 0, str_pad(substr($salt, 0, 16), 16, '0', STR_PAD_LEFT));
}

/* if you want to reduce the length of the encrypted string, fix the salt and remove it from the key */
function simple_encryption($string)
{
    return base64_encode(openssl_encrypt($string, 'AES-256-CBC', ENCRYPTION_KEY, 0, str_pad(substr(ENCRYPTION_KEY, 0, 16), 16, '0', STR_PAD_LEFT)));
}
function simple_decryption($string)
{
    return openssl_decrypt(base64_decode($string), 'AES-256-CBC', ENCRYPTION_KEY, 0, str_pad(substr(ENCRYPTION_KEY, 0, 16), 16, '0', STR_PAD_LEFT));
}


function api_create_order($vendor_code,$account_code,$cart_code,$coupon_code=FALSE){
    global $api_endpoint; 

    $output = FALSE; 
    $data = array(
        'mode'=>'CREATE',
        'vendor_code'=>pass_processing_character($vendor_code),
        'account_code'=>pass_processing_character($account_code),
        'cart_code'=>pass_processing_character($cart_code),
        'coupon_code'=>pass_processing_character($coupon_code),
        'license_key'=>pass_processing_character(LICENSE_KEY),
    );

    $ch = curl_init($api_endpoint.'order.php');
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($ch); 
    $response = json_decode($response,JSON_PRETTY_PRINT);
    
    curl_close($ch);

    // Display the returned data
    if ($response['status'] == 201){
        $output = $response['data']; 
    }

    return $output; 

}

function api_update_order($payment_method,$order_status,$order_id){
    global $api_endpoint; 

    $output = FALSE; 
    $data = array(
        'mode'=>'UPDATE',
        'payment_method'=>pass_processing_character($payment_method),
        'order_id'=>pass_processing_character($order_id),
        'order_status'=>pass_processing_character($order_status),
        'license_key'=>pass_processing_character(LICENSE_KEY),
    );

    $ch = curl_init($api_endpoint.'order.php');
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($ch); 
    $response = json_decode($response,JSON_PRETTY_PRINT);
    
    curl_close($ch);

    // Display the returned data
    if ($response['status'] == 201){
        $output = $response['data']; 
    }

    return $output; 

}

function api_insert_contact_form($username,$email,$description,$vendor){
    global $api_endpoint; 

    $output = FALSE; 
    $data = array(
        'username'=>pass_processing_character($username),
        'email'=>pass_processing_character($email),
        'description'=>pass_processing_character($description), 
        'vendor'=>pass_processing_character($vendor),
        'license_key'=>pass_processing_character(LICENSE_KEY),
    );

    $ch = curl_init($api_endpoint.'contact_form.php');
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($ch); 
    $response = json_decode($response,JSON_PRETTY_PRINT);
    
    curl_close($ch);

    // Display the returned data
    if ($response['status'] == 201){
        $output = $response['data']; 
    }

    return $output; 

}

function api_product_review($product,$username,$email,$comment,$review,$vendor){
    global $api_endpoint; 

    $output = FALSE; 
    $data = array(
        'username'=>pass_processing_character($username),
        'comment'=>pass_processing_character($comment),
        'review'=>pass_processing_character($review),
        'product'=>pass_processing_character($product),
        'email'=>pass_processing_character($email),
        'vendor'=>pass_processing_character($vendor),
        'license_key'=>pass_processing_character(LICENSE_KEY),
    );

    $ch = curl_init($api_endpoint.'reviews.php');
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($ch); 
    $response = json_decode($response,JSON_PRETTY_PRINT);
    
    curl_close($ch);

    // Display the returned data
    if ($response['status'] == 201){
        $output = $response['data']; 
    }

    return $output; 

}

function api_modify_user_password($new_password,$old_password,$account_code){
    global $api_endpoint; 

    $output = FALSE; 
    $data = array(
        'mode'=>'password',
        'new_password'=>pass_processing_character($new_password),
        'old_password'=>pass_processing_character($old_password),
        'user_code'=>pass_processing_character($account_code),
        'license_key'=>pass_processing_character(LICENSE_KEY),
    );

    $ch = curl_init($api_endpoint.'user_profile.php');
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($ch); 
    $response = json_decode($response,JSON_PRETTY_PRINT);
    
    curl_close($ch);
    
    // Display the returned data
    if ($response['status'] == 201){
        $output = $response['data']; 
    }

    return $output; 
}


function api_insert_newsletter($email){
    global $api_endpoint; 

    $output = FALSE; 
    $data = array(
        'email'=>$email,
        'license_key'=>pass_processing_character(LICENSE_KEY),
    );

    $ch = curl_init($api_endpoint.'newsletter.php');
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($ch); 
    $response = json_decode($response,JSON_PRETTY_PRINT);
    
    curl_close($ch);
    
    // Display the returned data
    if ($response['status'] == 201){
        $output = $response['data']; 
    }

    return $output; 
}


function api_retrieve_order_history($user_code){
    
    global $api_endpoint;

    $ch = curl_init();
    $url = $api_endpoint . "/order.php?license_key=" . pass_processing_character(LICENSE_KEY) ."&mode=ORDER_HISTORY&user_code=".pass_processing_character($user_code);

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $resp = curl_exec($ch);
    if ($e = curl_error($ch)) {
        echo ($e);
    } else {
        $decoded = json_decode($resp, JSON_PRETTY_PRINT);
        $api_data = $decoded;

        if ($api_data['status'] == 201) {
            return $api_data['data'];
        }
    }

    curl_close($ch);

    return FALSE;
}
?>
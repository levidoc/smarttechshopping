<?php 
include_once "error-log.php"; 
include_once "config.php";
@include_once "composer/composer_function.php";
@include_once "scripts.php"; 

function ex($section=1){
    $url =  "//{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";

    $x = $_SERVER['REQUEST_URI']; 
    $_xm = explode("/",$x);
    return $_xm[$section]; 
}

function file_path($section){
    global $system_config; 
    $data = false; 

     
    if (isset($system_config['structure'][$section])){
        $data = $system_config['structure'][$section];
        return $data; 
    }else{
        return null; 
    }
}

function get_url_data($query,$link=FALSE){
    if ($link == FALSE){
        @$link = $_SERVER['QUERY_STRING']; 
    }

    @parse_str($link,$queryData); 
    if (!isset($queryData[$query])){
        return null; 
    }

    $output = $queryData[$query]; 

    return $output; 
}

function retrieve_product_amount($index){
    $file_path = get_parent_directory().'/DATA_SETS/product_pack.json'; 
    $output = FALSE; 
    if (file_exists($file_path)){
        $product_contents = json_decode(file_get_contents($file_path),true);
        
        if (!isset($product_contents)){
            return null; 
        } 

        foreach ($product_contents as $row){
            if ($index === $row['INDEX']){
                $today_date = date('Y-m-d'); 

                $sales_start_date = $row['SALE_START']; 
                $sales_end_date = $row['SALE_END'];
                $sales_price = $row['SALE']; 
                $product_price = $row['PRICE'];

                if ($today_date >= $sales_start_date && $today_date <= $sales_end_date) {
                    if ($sales_price<$product_price){
                        return $sales_price; 
                    }else{
                        return $product_price;
                    }
                } else {
                    return $product_price;
                }
            }

        }
    }
    return $output; 
}

function currency_convert($amount,$to){
    $file_path = get_parent_directory().'/DATA_SETS/currency_rate_backup.json'; 
    if (file_exists($file_path)){
        $data_contents = json_decode(file_get_contents($file_path),true); 

        foreach ($data_contents as $key => $value) {
            if (is_numeric($key)) {
                $currency_code = $value['CURRENCY'];
                $rate = $value['RATE'];

                if ($currency_code === $to){
                    $result = $amount * ($rate); 
                    return $result; 
                }
        
            }
        }

  
    }else{
        backup_currency_rates(); 
    }
}

function string_to_currency($value){
    $x = number_format( ceil($value),2,'.',' '); 

    return ($x); 
}

// Function to read a cookie
function read_cookie($cookieName) {
    $output = FALSE; 

    if (isset($_COOKIE[$cookieName])) {
        if ($_COOKIE[$cookieName] == FALSE){
            return FALSE; 
        }

        $output = simple_decryption($_COOKIE[$cookieName]);
    }

    return $output; 
}

// Function to create or modify a cookie
function create_cookie($Name, $data , $expirationTime = FALSE) {
    $data = simple_encryption($data); 

    if ($expirationTime == FALSE){
        $expirationTime = (60)*(60)*(730); 
    }

    $output = setcookie($Name, $data , time() + $expirationTime, '/');

    return $output;
}

function system_coupon($state="READ",$data=FALSE){
    $output = FALSE; 
    if (($state == "READ") && (coupon_code() !== FALSE)){
        $code = coupon_code(); 
        $info = retrieve_coupon($code); 
        return $info; 
    }else if ($state == "INSERT"){
        $info = retrieve_coupon($data); 
        if ($info !== FALSE){
            $info = coupon_code("INSERT",$data);
            return $info; 
        }
    }
    return $output; 
}

function coupon_code($mode="READ",$data=FALSE){
    $output = FALSE;
    $keyword = "SHOPPING_COUPON";  
    if ($mode == "READ"){
        $output = read_cookie($keyword);
        return ($output); 
    }else{
        $output = create_cookie($keyword,$data); 
    }
    return $output;

}

function tracking_code($mode="READ",$data=FALSE,$section="WISHLIST"){
    $output = FALSE;
    $keyword = "TRACKING_KEY_".$section;  
    if ($mode == "READ"){
        $output = read_cookie($keyword);
        if (!empty($output)){
            return ($output);
        }
    }else{
        $output = create_cookie($keyword,$data); 
    }
    return $output;
}

function account_code($mode="READ",$data=FALSE){
    $output = FALSE;
    $keyword = "ACCOUNT_KEY";  
    if ($mode == "READ"){
        $output = read_cookie($keyword);
        return $output; 
    }else{
        $output = create_cookie($keyword,$data); 
    }

    return $output;
}

function device_code($mode="READ",$data=FALSE){
    $output = FALSE;
    $keyword = "DEVICE_INFO";  
    if ($mode == "READ"){
        $output = read_cookie($keyword);
        return $output; 
    }else{
        $output = create_cookie($keyword,$data); 
    }

    return $output;
}

function record_wishlist($product_id){
    $output = FALSE; 

    $tracking_code = tracking_code();
    $account_code = account_code();

    if ($tracking_code == FALSE){
        $tracking_code = str_shuffle("NO_TRACKING_CODE_VERIFIED");
    }
    $x = record_wishlist_data_api($product_id,$tracking_code,$account_code);

    if ($x !== FALSE){
        record_wishlist_database($product_id,$tracking_code,$account_code,TRUE);
        $output = TRUE; 
        tracking_code('INSERT',$x['TRACKING_CODE']);

        //Renew The Tracking Code
    }else {
        record_wishlist_database($product_id,$tracking_code,$account_code);
    }

    return $output; 
}

function remove_wishlist($product_id){

    $output = FALSE; 
    $tracking_code = tracking_code();

    if ($tracking_code !== FALSE){
        $output = delete_wishlist_data_api($product_id,$tracking_code);
        if ($output['STATUS'] == "REMOVED DATA"){
            remove_wishlist_database($tracking_code,$product_id);
            $output = TRUE; 
        }
        
    }

    return $output; 
}

function remove_cart($product_id){

    $output = FALSE; 
    $tracking_code = tracking_code('READ',FALSE,"CART");

    if ($tracking_code !== FALSE){
        $output = delete_cart_data_api($product_id,$tracking_code);

        if ($output['STATUS'] == "DELETED RECORDS"){
            remove_cart_database($tracking_code,$product_id);
            $output = TRUE; 
        }
        
    }

    return $output; 
}

function remove_wishlist_database($tracking_code,$product_id){
        $filename = get_parent_directory().'/DATA_SETS/wishlist_pack.json';
    
        // Load existing wishlist data from JSON file
        $wishlistData = [];
        if (file_exists($filename)) {
            $wishlistData = json_decode(file_get_contents($filename), true);
        }
    
        // Filter the wishlist data based on the tracking code and product
        $filteredData = array_filter($wishlistData, function ($item) use ($tracking_code, $product_id) {
            return $item['TRACKING_CODE'] !== $tracking_code || $item['PRODUCT'] !== $product_id;
        });
    
        // Save the filtered wishlist data back to the JSON file
        file_put_contents($filename, json_encode($filteredData, JSON_PRETTY_PRINT));
    
        // Optionally, you can return the filtered wishlist data
        return $filteredData;
    
}

function remove_cart_database($tracking_code,$product_id){
    $filename = get_parent_directory().'/DATA_SETS/shopping_cart_pack.json';

    $cartData = file_get_contents($filename);
    
    $cartItems = json_decode($cartData);
    
    $updatedCartItems = [];
    foreach ($cartItems as $item) {
        if ($item->TRACKING_CODE === $tracking_code && $item->PRODUCT_ID === $product_id) {
            continue; // Skip the item to be deleted
        }
        $updatedCartItems[] = $item; // Add the item to the updated cart
    }
    
    // Encode the updated cart items array back to JSON
    $updatedCartData = json_encode($updatedCartItems,JSON_PRETTY_PRINT);
    
    // Write the updated cart data back to the JSON file
    file_put_contents($filename, $updatedCartData);
    
    // Return true if the item was successfully deleted, false otherwise
    return true;
}

function create_account($username,$password,$email,$phone){
    $output = FALSE; 
    $x = api_send_create_account(LICENSE_KEY,$username,$password,$email,$phone);
    if ($x !== FALSE){
        $username = $x['USERNAME']; 
        $user_code = $x['USER_CODE']; 
        $email = $x['EMAIL']; 

        account_code("INSERT",$user_code); 
        //account_log("INSERT",$username); 

        create_cookie(strtoupper('auto_log_user_code'), $user_code);
        create_cookie(strtoupper('auto_log_user'), $username);

        $output = TRUE; 
    }

    return $output; 
}

function connect_account($username,$password){
    $output = FALSE;
    
    $license_key = LICENSE_KEY;
    $x = api_connect_account($license_key,$username,$password);
    if ($x !== FALSE){
        $user_code = $x['USER_CODE'];
        account_code('INSERT',$user_code);  

        create_cookie(strtoupper('auto_log_user_code'), $user_code);
        
        $output = TRUE; 
    }
    return $output; 

}

function add_to_cart($product_id,$quantity=1){
    $output = FALSE; 
    $tracking_code = tracking_code('READ',FALSE,"CART");
    $user_code = account_code();
    $device_code = device_code(); 

    if ($tracking_code == FALSE){
        $tracking_code = create_tracking_code();
        tracking_code("INSERT",$tracking_code,"CART"); 
    }

    if ($tracking_code !== FALSE){
        $x = record_cart_data_api($product_id,$quantity,$tracking_code);
        remove_cart_database($tracking_code,$product_id);
        if (($x['STATUS'] === "UPDATED DATA") || ($x['STATUS'] === "RECORDED DATA")){
            record_cart_database($product_id,$quantity,$tracking_code,$device_code,$user_code,TRUE);
            $output = TRUE; 
        }else{
            record_cart_database($product_id,$quantity,$tracking_code,$device_code,$user_code);
            $output = TRUE; 
        }

    }
    
    return $output; 
    
}

function is_product_stock_available($product_id){
    $file_path = get_parent_directory().'/DATA_SETS/product_pack.json';

    $output = FALSE; 

    if (file_exists($file_path)){
        $product_pack = json_decode(file_get_contents($file_path),JSON_PRETTY_PRINT);

        foreach ($product_pack as $row){
            if ($product_id == $row['INDEX']){ 
                $stock_status = $row['STOCK_STATUS'];
                $stock_quantity = $row['STOCK_QUANTITY'];

                if (($stock_status !== "Out of Stock") && ($stock_quantity > 0)){
                    $output = TRUE;
                    return $output; 
                }
            }
        }
    }

    return $output; 
}

function retrieve_vendor_data($code,$query="CODE"){
    $output = FALSE; 
    $file_path = get_parent_directory().'/DATA_SETS/vendor_pack.json'; 
    $data_pack = json_decode(file_get_contents($file_path),JSON_PRETTY_PRINT);

    foreach ($data_pack as $row){
        if ($code == $row["CODE"]){
            $output = $row[$query];
        }
    }

    return ($output);

}

function record_wishlist_database($product,$tracking_code,$userCode,$state=FALSE){
    // Load existing wishlist data from JSON file
    $wishlistData = [];
    $filename = get_parent_directory().'/DATA_SETS/wishlist_pack.json';
    if (file_exists($filename)) {
        $wishlistData = json_decode(file_get_contents($filename), true);
    }
    
    // Create a new wishlist item
    $wishlistItem = [
        'USER_CODE' => $userCode,
        'COMPILED' => $state,
        'DATE' => date('Y-m-d H:i:s'),
        'PRODUCT' => $product,
        'TRACKING_CODE' => $tracking_code,
        'INDEX' => count($wishlistData) + 1
    ];
    
    // Add the new wishlist item to the existing wishlist data
    $wishlistData[] = $wishlistItem;
    
    // Save the updated wishlist data back to the JSON file
    file_put_contents($filename, json_encode($wishlistData, JSON_PRETTY_PRINT));
    
    // Optionally, you can return true or false to indicate the success of the operation
    return true;
    
}

function retrieve_delivery_data($index){
    $x = retrieve_delivery_data_api($index); 
    if ($x !== FALSE){
        return $x;
    }else{
        return FALSE; 
    } 
}

function record_cart_database($product,$quantity,$tracking_code,$device_code,$userCode,$state=FALSE){
    // Load existing cart data from JSON file
    $cart_data = [];
    $filename = get_parent_directory().'/DATA_SETS/shopping_cart_pack.json';
    if (file_exists($filename)) {
        $cart_data = json_decode(file_get_contents($filename), true);
    }
    
    // Create a new cart item
    $cart_Item = [
        "ID" => count($cart_data) + 1,
        "DATE" => date('Y-m-d H:i:s'),
        "PRODUCT_ID" => $product,
        "USER_CODE"=> $userCode,
        "TRACKING_CODE" => $tracking_code,
        "DEVICE_CODE"=> $device_code,
        "QUANTITY" =>$quantity,
        "SYNC" => $state,
    ];
    
    // Add the new wishlist item to the existing wishlist data
    $cart_data[] = $cart_Item;
    
    // Save the updated wishlist data back to the JSON file
    file_put_contents($filename, json_encode($cart_data, JSON_PRETTY_PRINT));
    
    // Optionally, you can return true or false to indicate the success of the operation
    return true;
    
}

function retrieve_billing_details(){
    $user_code = account_code(); 
    $x = api_retrieve_customer_details($user_code); 
    if ($x !== FALSE){
        $return = $x['BILLING_DATA']; 
        return $return; 
    }else{
        return FALSE; 
    }
}

function retrieve_shipping_details(){
    $user_code = account_code(); 
    $x = api_retrieve_customer_details($user_code); 
    if ($x !== FALSE){
        $return = $x['SHIPPING_DATA']; 
        return $return; 
    }else{
        return FALSE; 
    }

}

function smart_login(){
    $output = FALSE; 
    $x = read_cookie('AUTO_LOG_USER_CODE'); 

    if ($x !== FALSE){
        $system_validate = api_validate_account_code(LICENSE_KEY,$x);

        if ($system_validate !== FALSE){
            account_code("INSERT",$x); 
            $output = TRUE; 
        }else{
            create_cookie('AUTO_LOG_USER_CODE',false); 
            account_code("INSERT",false); 
        }
    }

    return $output; 
}

function restrict_login(){
    if (smart_login() !== TRUE){
        header("Location: signup.php");
    }
} 

function save_billing_details($fname, $lname, $company_name, $phone_numbers, $email, $address, $city, $state, $zip, $country){
    $output = FALSE; 

    $account_code = account_code(); 
    $tracking_code = tracking_code("READ",FALSE,"CART");

    if ($account_code !== FALSE){
        $x = api_save_billing_details($account_code , $tracking_code , $fname, $lname, $company_name, $phone_numbers, $email , $address, $city, $state, $zip, $country);
        if ($x == "RECORDED_DATA"){
            $output = TRUE; 
        }
    }
     
    return $output; 
}

function save_shipping_details($fname,$lname,$country,$state,$city,$zip,$street){
    $output = FALSE;
     
    $account_code = account_code(); 
    
    if ($account_code !== FALSE){
        $x = api_save_customer_shipping($account_code,$fname,$lname,$country,$state,$city,$zip,$street); 
        if ($x == "RECORDED_DATA"){
            $output = TRUE; 
        }
    }
     
    return $output; 
}


function process_order($vendor_code){
    $account_code = account_code(); 
    $cart_code = tracking_code("READ",FALSE,"CART");

    $coupon_data = system_coupon();
    if ($coupon_data !== FALSE){
        $coupon_code = $coupon_data['CODE'];
    }else{
        $coupon_code = FALSE;
    }   

    $x = api_create_order($vendor_code,$account_code,$cart_code,$coupon_code); 

    if ($x !== FALSE){
        //Save The Data As A JSON string in a php session 
        record_session('CHECKOUT',json_encode($x)); 
    }
}

function record_session($keyword,$data){
    session_start(); 

    $_SESSION[$keyword] = simple_encryption($data); 
    session_write_close(); 
}

function read_session($keyword){
    session_start(); 

    $data = isset($_SESSION[$keyword]) ? $_SESSION[$keyword]:false; 
    session_write_close(); 
    if ($data !== false){
        $data = simple_decryption($data); 
    }

    return $data; 
}

function retrieve_site_information($keyword){
    $file_path = get_parent_directory().'/DATA_SETS/genetic_build.json';
    
    $genetic_pack = json_decode(file_get_contents($file_path),true) ?? false; 
    $output = $genetic_pack[$keyword];

    return ($output); 

}

function clear_session(){
    session_start(); 
    $_SESSION = array(); 
    session_destroy(); 
}
####################################################################    sync_data(); 

function within_department_restriction($string){
    $departments = retrieve_departments(); 
    $output = FALSE; 
    if ($departments == "ALL"){
        $output = TRUE; 
    }else{
        foreach ($departments as $row){
            print($row.'<br>');
            if (strtolower($row) == strtolower($string)){
                $output = TRUE; 
            }
        }
    }

    return $output; 
}

function retrieve_departments(){
    $info = array(
        'APPAREL & CLOTHING',
        'SHOES',
    );

    return $info; 
}


function record_contact_details($description,$vendor){
    $user = api_validate_account_code(LICENSE_KEY,account_code());

    $username = $user['META_INFO']['USERNAME'];
    $email = $user['META_INFO']['EMAIL'];

    $x = api_insert_contact_form($username,$email,$description,$vendor); 
}

function merge_page($page_path){
    include_once $page_path; 
    return exit(1); 
}

function traffic_inspection(){

}
?>
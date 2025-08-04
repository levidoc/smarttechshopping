<?php 
include_once "../function.php";

$message = $_POST['message']; 
$vendor = $_POST['vendor']; 
if (empty($message)){
    print('Empty Details'); 
    exit(); 
}

if (empty($vendor)){
    print('Empty Details'); 
    exit(); 
}

$user = api_validate_account_code(LICENSE_KEY,account_code());
if (isset($user['META_INFO'])){
    $x = record_contact_details($message,$vendor); 
    print('PROCEED'); 
}else{
    print('Please Login To Fill Out The Contact Form'); 
}
?>
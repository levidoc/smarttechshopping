<?php 
include_once "function.php"; 

$section = get_url_data('section'); 

if ($section == "payment settings"){
    include_once "account_banking_details.php"; 
}else if ($section == "order history"){
    include_once "account_order_history.php"; 
}else if ($section == "billing details"){
    include_once "account_billing&shipping.php"; 
}else if ($section == "profile"){
    include_once "account_profile.php";    
}else if ($section == "withhold payout"){
    include_once "account_withold_order.php"; 
}

//include "account_order_history.php";
?> 
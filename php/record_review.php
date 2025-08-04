<?php
include_once "../function.php";

$review = $_POST['review']; 
$vendor = $_POST['vendor']; 
$comment = $_POST['comment']; 
$product = $_POST['product']; 

$user_code = account_code(); 
$user = api_retrieve_customer_details($user_code);

$username = $user['USERNAME'];
$email = $user['EMAIL'];  

$x = api_product_review($product,$username,$email,$comment,$review,$vendor); 

if ($x !== FALSE){
    print('PROCEED'); 
}else {
    print($x); 
}
?>
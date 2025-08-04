<?php 
include_once "../function.php";

$fname = $_POST['fname']; 
$lname = $_POST['lname']; 
$address = $_POST['address']; 
$city = $_POST['city']; 
$state = $_POST['state']; 
$zip = $_POST['zip']; 
$country = $_POST['country'];  

$x = save_shipping_details($fname,$lname,$country,$state,$city,$zip,$address);  

if ($x == TRUE){
    print(simple_encryption('THIRD')); 
}else{
    print('ERROR'); 
}

?> 
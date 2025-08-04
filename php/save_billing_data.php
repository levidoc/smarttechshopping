<?php 
include_once "../function.php";

$fname = $_POST['fname']; 
$lname = $_POST['lname']; 
$company_name = $_POST['company']; 
$phone_numbers = $_POST['phone']; 
$email = $_POST['email']; 
$address = $_POST['address']; 
$city = $_POST['city']; 
$state = $_POST['state']; 
$zip = $_POST['zip']; 
$country = $_POST['country'];  

$x = save_billing_details($fname, $lname, $company_name, $phone_numbers, $email, $address, $city, $state, $zip, $country); 

if ($x == TRUE){
    print(simple_encryption('SECOND')); 
}else{
    print('ERROR'); 
}

?> 
<?php 
include_once "../function.php";

$email = $_POST['email']; 
$phone = $_POST['phone']; 
$username = $_POST['username'];
$password = $_POST['password']; 

$status = create_account($username,$password,$email,$phone); 

if ($status == true){
    print('PROCEED'); 
}else{
    print('ERROR_CODE'); 
}

?>
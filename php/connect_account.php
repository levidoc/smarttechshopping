<?php 
include_once "../function.php";

$username = $_POST['username']; 
$password = $_POST['password']; 

$x = connect_account($username,$password); 
if ($x == TRUE){
    print('PROCEED'); 
}else{
    print('ERROR'); 
}
?> 
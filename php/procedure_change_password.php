<?php 
include_once "../function.php";

$new_password = $_POST['new_password'];
$old_password = $_POST['old_password']; 

$x = api_modify_user_password($new_password,$old_password,account_code()); 

echo($x); 
?>
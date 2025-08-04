<?php
include_once "function.php";
#Include The Function Module 

setcookie('ACCOUNT_KEY','', time()+1); 

// Clear all cookies
$cookies = $_COOKIE;
foreach ($cookies as $name => $value) {
    //print($name.' -- '.simple_decryption($_COOKIE[$name]).'<br>');
    setcookie($name, "" , time() );
}

// Clear all session data
session_start();
$_SESSION = array();
session_destroy();


// Clear all data in device storage

header("Location: /");
exit;
//Redirect To Homepage 
?>
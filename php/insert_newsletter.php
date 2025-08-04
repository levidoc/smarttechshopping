<?php
include_once "../function.php";
#Include The Function Library 

$email = $_POST['email'];

function validateEmail($email)
{
    // Use the filter_var function with the FILTER_VALIDATE_EMAIL flag
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true;
    } else {
        return false;
    }
}

if (validateEmail($email)) {
    $x = api_insert_newsletter($email);
    if ($x !== FALSE) {
        print('PROCEED');
    }
} else {
    echo "Invalid email address";
}

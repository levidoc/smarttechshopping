<?php 
#Act As Folder 
$e = ex(2); 
$folder_map = [
    "terms-and-conditions"=>dirname(__FILE__)."/terms_and_condition.php",
    "returns-and-refunds"=>dirname(__FILE__)."/return_and_refund.php",
    "user-security"=>dirname(__FILE__)."/user_security.php",
]; 
$exec = $folder_map[$e]?? false; 
global $error_pages; 
if (($exec == false) || (empty($exec))){ include_once ($error_pages['404']);}
include_once ($exec); 
exit(1); 
?>
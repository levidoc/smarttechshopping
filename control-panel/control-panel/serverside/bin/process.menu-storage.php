<?php
session_start(); 
$function_file = dirname(dirname(__FILE__))."/background-services.php"; 
include_once $function_file; 
$menu_selection = $_POST['page_request'];
$exec = set_internal_page($menu_selection); 
$exec = set_internal_page($menu_selection); 
$exec = set_internal_page($menu_selection); 
$exec = set_internal_page($menu_selection); 
if ($exec == TRUE){

    $page_data = $_POST['page_data'] ?? "null santos "; 
    if (!empty($page_data)){
        $xec = set_page_data("navbar-data",$_POST['page_data']);
    }

    echo "PROCEED"; 
} 
?>
<?php 
include_once dirname(__FILE__)."/background-services.php"; 
#MAP STRUCTURE OF THE REQUESTED ENDPOINTS

$page = $_POST['page'] ?? @include_once dirname(__FILE__)."/bin/process.conceal.php";; 

switch ($page) {
    case hash("sha256","advanced-github"): 
        @include_once dirname(__FILE__)."/bin/process.advanced-github.php"; 
        break;
    case hash("sha256","domain-settings"): 
        @include_once dirname(__FILE__)."/bin/process.domain-settings.php"; 
        break;
    case hash("sha256","new-products"): 
        @include_once dirname(__FILE__)."/bin/process.new-products.php"; 
        break;
    case hash("sha256","store-products"): 
        @include_once dirname(__FILE__)."/bin/process.store-products.php"; 
        break;
    case hash("sha256","store-orders"): 
        @include_once dirname(__FILE__)."/bin/process.store-orders.php"; 
        break;
    case "menu":
        @include_once dirname(__FILE__)."/bin/process.menu-storage.php"; 
        break; 
    default:
        @include_once dirname(__FILE__)."/bin/process.denied.php";
        break;
}
?>
<?php 
include_once dirname(__FILE__)."/background-services.php"; 
#MAP STRUCTURE OF THE REQUESTED ENDPOINTS

$page = $_POST['request'] ?? @include_once dirname(__FILE__)."/bin/process.conceal.php";; 
switch ($page) {
    case hash("sha256","advanced-github-reset-dns-records"): 
        @include_once dirname(__FILE__)."/app/advanced-github-reset-records.php"; 
        break;
    case hash("sha256","new-store-products"):
        @include_once dirname(__FILE__)."/app/new-store-products.php"; 
        break;
    case hash("sha256","new-website-page"):
        @include_once dirname(__FILE__)."/app/new-pages.website.php"; 
        break;
    default:
        @include_once dirname(__FILE__)."/bin/process.denied.php";
        break;
}
?>
<?php 
include_once "../function.php"; 

$order_note = $_POST['order_note']; 
$vendor_code = $_POST['vendor']; 
//Receive The Inputs 

process_order($vendor_code); 
record_session('VENDOR_CHECKOUT',$vendor_code); 

echo(simple_encryption('LAST')); 

?>
<?php 
include_once "../function.php";
$product_index = simple_decryption($_POST['product']); 

$result = record_wishlist($product_index);
echo('PROCEED'); 

?>
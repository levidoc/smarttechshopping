<?php 
include_once "../function.php";

$product_id = simple_decryption($_POST['product_index']); 

$x = remove_cart($product_id); 
if ($x == TRUE){
    print('PROCEED'); 
}
?>
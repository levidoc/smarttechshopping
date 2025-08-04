<?php 
include_once "../function.php";

$product_index = simple_decryption($_POST['product_index']); 
$x = remove_wishlist($product_index); 

if ($x == TRUE){
    echo('PROCEED');
}else{
    echo('INVALID_REQUEST'); 
}

?>
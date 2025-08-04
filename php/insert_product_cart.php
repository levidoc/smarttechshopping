<?php 
include_once "../function.php";

$product_index = decrypt_url($_POST['index']);
$quantity = ($_POST['quantity']); 

$x = add_to_cart($product_index,$quantity); 

if ($x == TRUE){
    print('PROCEED');
}else{
    print('ERROR');
}

?>
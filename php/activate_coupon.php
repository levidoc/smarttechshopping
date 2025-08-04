<?php 
include_once "../function.php";

$code = $_POST['coupon']; 

$x = system_coupon("INSERT",$code);

if ($x == TRUE){
    print('PROCEED'); 
}else{
    print('Error'); 
}
?>
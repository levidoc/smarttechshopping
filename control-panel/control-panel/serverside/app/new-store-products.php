<?php 

#Retrieve The Product Information
$product_name = $_POST['product_name'] ?? "";
$product_description = $_POST['product_description'] ?? "";

try {

    $product_name = htmlspecialchars($product_name, ENT_QUOTES, 'UTF-8');
    $product_description = htmlspecialchars($product_description, ENT_QUOTES, 'UTF-8');
    
    #Check If The Product Name Is Empty 
    if(empty($product_name)){
        echo "ERROR";
        exit(); 
    }

    #Check If The Product Description Is Empty 
    if(empty($product_description)){
        echo "ERROR";
        exit(); 
    }


    #Include The Database Connection 
    $scripts_file = dirname(dirname(dirname(dirname(__FILE__))))."/package-manager.php";
    @include_once $scripts_file;

    $package_manager = new scripts_packages();
    $package_manager->activate_database();
    $sql_data = "INSERT INTO `tblstore_products`
    (`title`, `description`) VALUES 
    ('$product_name','$product_description')"; 

    $package_manager->database->insert_data($sql_data); 
    echo "PROCEED";
} catch (\Throwable $th) {
    echo "ERROR".$th;
}
?>
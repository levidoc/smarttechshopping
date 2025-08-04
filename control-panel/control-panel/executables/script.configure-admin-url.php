<?php 
$path = "smarttechshopping";
#Assume Slugify 
@include_once dirname(dirname(dirname(dirname(__FILE__)))).DIRECTORY_SEPARATOR."scripts.php"; 
$clean_path = slugify($path); 

#Binary Directory 
$dir = dirname(dirname(dirname(__FILE__))).DIRECTORY_SEPARATOR."bin".DIRECTORY_SEPARATOR."dependencies".DIRECTORY_SEPARATOR;
$file = $dir."gateways.pxy";

$keys = stateless_encryption($clean_path);
$e = file_put_contents($file,$keys); 

if (file_exists($file)){
    echo json_encode(['success' => true, 'message' => 'Rewrote Admin Path']);
    die(0); 
    #Return True; 
}
echo "Failed To Rewrite Admin Path";
die(0); 
        
?>
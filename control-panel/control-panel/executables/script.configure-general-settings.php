<?php 
$path = "2173232bb70d71053c1cfcfa852b52f4c58cd739de82fdf7ede380b03008efbd";
#Assume Slugify 
@include_once dirname(dirname(dirname(dirname(__FILE__)))).DIRECTORY_SEPARATOR."scripts.php"; 
$clean_path = slugify($path);

$clean_data = $clean_path; 

#Binary Directory 
$dir = dirname(dirname(dirname(__FILE__))).DIRECTORY_SEPARATOR."bin".DIRECTORY_SEPARATOR."dependencies".DIRECTORY_SEPARATOR;
$file = $dir."icon.pxy";

$keys = base64_encode($clean_data);
$e = file_put_contents($file,$keys); 

if (file_exists($file)){
    echo json_encode(['success' => true, 'message' => 'Rewrote General Sie Settings']);
    die(0); 
    #Return True; 
}
echo "Failed To Rewrite Admin Path";
die(0); 
        
?>
<?php
$filename = $_GET['license'] ?? exit();

$dir = __DIR__.'/blog/register/license/';
$file = $dir.$filename.'.download.pxy'; 

if (file_exists($file)) {
    include_once "services.php";

    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream'); // Adjust content type as needed
    header('Content-Disposition: attachment; filename="fingerprint.pxy"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file));
    echo file_get_contents($file); 
    rename($file,$dir.'trash'); #Remove The File 
    file_put_contents($dir.'trash','HACKERS_GOT_MOVES'); 
    exit;
} else {
    // Handle file not found error
    //echo "File not found.";
}
?>
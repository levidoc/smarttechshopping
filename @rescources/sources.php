<?php
@include_once dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR . "scripts.php";

$media_folder = site_path(2) ?? false; 
$media_request = site_path(3) ?? false;
if (empty($media_request)) {
    http_response_code(404);
    die(0);
}

$curr_path = dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR."control-panel".DIRECTORY_SEPARATOR."control-panel".DIRECTORY_SEPARATOR."rescources".DIRECTORY_SEPARATOR;
$Path = $curr_path. $media_folder. DIRECTORY_SEPARATOR;

$files = scandir($Path);
$imagePath = null;
$currentImage = null;
$mimeType = null;

foreach ($files as $file) {
    if ($file === '.' || $file === '..') continue;
    $filename = pathinfo($file, PATHINFO_FILENAME);
    if ($filename === $media_request) {
        $imagePath = $Path . $file;
        $currentImage = $file;
        $extension = strtolower(pathinfo($file, PATHINFO_EXTENSION));
        switch ($extension) {
            case 'jpg':
                $mimeType = 'image/jpg';
                break;
            case 'jpeg':
                $mimeType = 'image/jpeg';
                break;
            case 'png':
                $mimeType = 'image/png';
                break;
            case 'gif':
                $mimeType = 'image/gif';
                break;
            default:
                $mimeType = 'application/octet-stream';
        }
        break;
    }
}

// Check if the file actually exists and is readable
if (file_exists($imagePath) && is_readable($imagePath)) {
    // Determine the MIME type based on the file extension
    $extension = pathinfo($currentImage, PATHINFO_EXTENSION);
    #$mimeType = 'application/octet-stream'; // Default generic type
    
    // Set the Content-Type header
    header('Content-Type: ' . $mimeType);
    // Set Content-Length header for better download management by browser (optional but good practice)
    header('Content-Length: ' . filesize($imagePath));

    // Output the image file directly to the browser
    readfile($imagePath);
    exit; // Stop script execution after sending the file
} else {
    // If image file not found or not readable, output a generic error or a placeholder
    #header("HTTP/1.0 404 Not Found");
    http_response_code(404); 
    exit;
}

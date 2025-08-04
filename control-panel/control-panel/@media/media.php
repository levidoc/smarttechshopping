<?php
// This PHP script directly outputs an image from a specified directory,
// setting the appropriate Content-Type header.

@include_once dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR."systemctrl.php"; 
// --- Direct Image Output Logic ---
    $media_request = map_page()[2] ?? false; 
    if (empty($media_request)){
        http_response_code(404); 
        die(0); 
    }
    
    $sql = "SELECT * FROM gallery WHERE (`hash` = '{$media_request}') LIMIT 1";
    $image_data = $db->query($sql)[0];
    $currentImage = $image_data['image_path'] ?? '404.jpg'; 
    $curr_path = dirname(dirname(dirname(dirname(__FILE__)))).DIRECTORY_SEPARATOR."@media".DIRECTORY_SEPARATOR; 
    $imagePath = $curr_path. $currentImage;
    // Check if the file actually exists and is readable
    if (file_exists($imagePath) && is_readable($imagePath)) {
        // Determine the MIME type based on the file extension
        $extension = pathinfo($currentImage, PATHINFO_EXTENSION);
        #$mimeType = 'application/octet-stream'; // Default generic type

        switch (strtolower($extension)) {
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
            // Add more image types if needed
        }

        // Set the Content-Type header
        header('Content-Type: ' . $mimeType);
        // Set Content-Length header for better download management by browser (optional but good practice)
        header('Content-Length: ' . filesize($imagePath));

        // Output the image file directly to the browser
        readfile($imagePath);
        exit; // Stop script execution after sending the file
    } else {
        // If image file not found or not readable, output a generic error or a placeholder
        header("HTTP/1.0 404 Not Found");
        echo "Image not found or not accessible.";
        exit;
    }
?>

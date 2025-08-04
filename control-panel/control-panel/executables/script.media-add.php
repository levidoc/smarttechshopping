<?php
header('Content-Type: application/json'); // Set header to indicate JSON response

$uploadDir = dirname(dirname(dirname(dirname(__FILE__)))).DIRECTORY_SEPARATOR. '@media'.DIRECTORY_SEPARATOR; // Directory where uploaded images will be saved
$response = ['success' => false, 'message' => ''];

// Create the uploads directory if it doesn't exist
if (!is_dir($uploadDir)) {
    if (!mkdir($uploadDir, 0755, true)) {
        $response['message'] = 'Failed to create upload directory.';
        echo json_encode($response);
        exit;
    }
}

// Check if a file was uploaded with the name 'uploadedImage'
if (isset($_FILES['uploadedImage']) && $_FILES['uploadedImage']['error'] === UPLOAD_ERR_OK) {
    $file = $_FILES['uploadedImage'];

    $fileName = basename($file['name']);
    $fileTmpName = $file['tmp_name'];
    $fileSize = $file['size'];
    $fileType = $file['type'];
    $fileError = $file['error'];

    // Basic validation
    $allowedMimeTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
    $maxFileSize = 5 * 1024 * 1024; // 5MB in bytes

    if (!in_array($fileType, $allowedMimeTypes)) {
        $response['message'] = 'Invalid file type. Only JPG, PNG, GIF, WEBP are allowed.';
    } elseif ($fileSize > $maxFileSize) {
        $response['message'] = 'File size exceeds 5MB limit.';
    } else {
        // Generate a unique filename to prevent overwriting and security issues
        $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);
        $newFileName = uniqid('img_', true) . '.' . $fileExtension;
        $uploadFilePath = $uploadDir . $newFileName;

        // Move the uploaded file from its temporary location to the final destination
        if (move_uploaded_file($fileTmpName, $uploadFilePath)) {
            $response['success'] = true;
            $response['message'] = 'Image uploaded successfully!';
            $response['filePath'] = $newFileName; // Optional: send back the path

            @include_once dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR."systemctrl.php"; 
            $hash = hash("sha256",$newFileName);
            $title = $fileName; 
            $description = "Uploaded To Server"; 
            $path = $newFileName;  
            @$e = $db->query("INSERT INTO gallery (`title`,`image_path`,`description`,`hash`) VALUES ('{$title}','{$path}','{$description}','{$hash}')") ?? false; 
        } else {
            $response['message'] = 'Failed to move uploaded file.';
        }
    }
} else {
    // Handle specific upload errors (optional)
    switch ($_FILES['uploadedImage']['error'] ?? UPLOAD_ERR_NO_FILE) {
        case UPLOAD_ERR_INI_SIZE:
        case UPLOAD_ERR_FORM_SIZE:
            $response['message'] = 'Uploaded file exceeds maximum file size.';
            break;
        case UPLOAD_ERR_PARTIAL:
            $response['message'] = 'File upload was interrupted.';
            break;
        case UPLOAD_ERR_NO_FILE:
            $response['message'] = 'No file was uploaded.';
            break;
        case UPLOAD_ERR_NO_TMP_DIR:
            $response['message'] = 'Missing a temporary folder.';
            break;
        case UPLOAD_ERR_CANT_WRITE:
            $response['message'] = 'Failed to write file to disk.';
            break;
        case UPLOAD_ERR_EXTENSION:
            $response['message'] = 'A PHP extension stopped the file upload.';
            break;
        default:
            $response['message'] = 'Unknown file upload error.';
            break;
    }
}

echo json_encode($response);
?>
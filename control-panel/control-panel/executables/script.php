<?php

#define("USER_CODE", retrieve_user_code()); 
include_once dirname(dirname(dirname(__FILE__))) . DIRECTORY_SEPARATOR . "package-manager.php";
include_once dirname(dirname(dirname(dirname(__FILE__)))) . DIRECTORY_SEPARATOR . "database".DIRECTORY_SEPARATOR."client.module.php";
$db = new database_manager();
function retrieve_user_code() {
    if (isset($_COOKIE['user_code'])) {
        return $_COOKIE['user_code'];
    } elseif (isset($_SESSION['user_code'])) {
        return $_SESSION['user_code'];
    } else {
        return "default_user_code"; // or handle as needed
    }
}

function __error($description) {
    echo $description;
    return die(0);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $page = isset($_POST['request']) ? $_POST['request'] : '';
    // Now you can use $page as needed
    $executable_map = [
        "create-site" => "script.create-site.php",
        "delete-site" => "script.delete-site.php",
        "update-site" => "script.update-site.php",
        "create-faq" => "script.create-faq.php",
        "delete-faq" => "script.delete-faq.php",
        "update-faq" => "script.update-faq.php",

        "create-category" => "script.create-category.php",
        "create-product" => "script.create-product.php",
    ];
    
    if (array_key_exists($page, $executable_map)) {
        $file_path = dirname(__FILE__) . DIRECTORY_SEPARATOR . $executable_map[$page];
        if (file_exists($file_path)) {
            include_once $file_path;
        } else {
            echo "File not found: " . htmlspecialchars($file_path);
        }
    } else {
        echo "Invalid request.";
    }
}
?>
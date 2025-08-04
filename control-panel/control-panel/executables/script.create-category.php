<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title']; 
    $image = $_POST['image']; 

    @include_once (dirname(dirname(__FILE__))) . DIRECTORY_SEPARATOR . "systemctrl.php";

    $image = get_media_hash_from_link($image); 

    if (empty($title) ) {
        echo "Please fill in data fields";
        #echo json_encode(['success' => true, 'message' => 'FAQ added successfully!']);
    } else {
        $sql = "INSERT INTO `categories` (`name`,`image`) VALUES ('{$title}','{$image}')"; 
        $e = $db->query($sql); 
        echo json_encode(['success' => true, 'message' => 'Category '.$title.' was created!']);
        die(0); 
        #}
        echo "Failed to Create Category.";
        die(0); 
    }
}

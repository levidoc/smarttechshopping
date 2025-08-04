<?php
include_once dirname(__DIR__) . DIRECTORY_SEPARATOR . "scripts.php";

#$subject = $_POST['subject'];
#$description = $_POST['message'];

$id = "3"; 
$subject = "TESTING";
$description = "Responding To Support Queries";
$state = simple_encryption('ACTIVE');

if (empty($subject) || empty($description)) {
    echo ('INCOMPLETE_DATA');
} else {
    $description = base_encryption($description);
    $subject = base_encryption($subject);
    $user_code = retrieve_code();

    $sql = "INSERT INTO `tblsupport_chats`(`client_data`, `client_code`, `support_ref`) VALUES ('{$description}','{$user_code}','{$id}')";
    if (execute_sql_query($sql)) {
        echo json_encode(['success' => true, 'message' => ' Support Ticket Was Responded To']);
        die(0); 
        #echo ('PROCEED');
    }
}

<?php
include_once dirname(__DIR__) . DIRECTORY_SEPARATOR . "scripts.php";

#$subject = $_POST['subject'];
#$description = $_POST['message'];

$subject = "TESTING";
$description = "Support Queries";

$state = simple_encryption('ACTIVE');

if (empty($subject) || empty($description)) {
    echo ('INCOMPLETE_DATA');
} else {
    $id = create_support_ticket_id();

    $description = base_encryption($description);
    $subject = base_encryption($subject);
    $user_code = retrieve_code();

    $sql = "INSERT INTO `tblsupport`(`id`, `user_code`, `subject`, `description`, `status`) VALUES ('{$id}','{$user_code}','{$subject}','{$description}','{$state}')";
    if (execute_sql_query($sql)) {
        $sql = "INSERT INTO `tblsupport_chats`(`client_data`, `client_code`, `support_ref`) VALUES ('{$description}','{$user_code}','{$id}')";
        if (execute_sql_query($sql)) {
            echo json_encode(['success' => true, 'message' => ' Support Ticket Created']);
            die(0); 

            #echo ('PROCEED');
        }
    }
}

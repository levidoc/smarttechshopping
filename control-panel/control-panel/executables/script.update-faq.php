<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $question = $_POST['question'] ?? '';
    $response = $_POST['response'] ?? '';
    $id = $_POST['id']; 

    if (empty($question) || empty($response)) {
        echo "Please fill in both the question and response fields";
        #echo json_encode(['success' => true, 'message' => 'FAQ added successfully!']);
    } else {
        $sql = "UPDATE faq SET question = '{$question}', response = '{$response}' WHERE id = '{$id}'";
        $e = $db->query($sql);
        echo json_encode(['success' => true, 'message' => 'FAQ added successfully!']);
        die(0); 
        #}
        echo "Failed to update FAQ. Please try again.";
        die(0); 
    }
}

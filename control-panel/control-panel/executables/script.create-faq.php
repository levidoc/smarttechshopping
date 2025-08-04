<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $question = $_POST['question'] ?? '';
    $response = $_POST['response'] ?? '';

    if (empty($question) || empty($response)) {
        echo "Please fill in both the question and response fields";
        #echo json_encode(['success' => true, 'message' => 'FAQ added successfully!']);
    } else {
        $sql = "INSERT INTO faq (question, response, category) VALUES ('{$question}', '{$response}', 'General')";
        $e = $db->query($sql);
        #if ($db->query($sql)){
            echo json_encode(['success' => true, 'message' => 'FAQ added successfully!']);
            die(0); 
        #}
        echo "Failed to add FAQ. Please try again.";
        die(0); 
    }
}

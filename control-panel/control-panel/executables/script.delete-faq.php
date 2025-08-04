<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    
    if (empty($id) ) {
        echo "Please fill in both the question and response fields";
        #echo json_encode(['success' => true, 'message' => 'FAQ added successfully!']);
    } else {
        $sql = "DELETE FROM faq WHERE id = '{$id}'"; 

        #$sql = "INSERT INTO faq (question, response, category) VALUES ('{$question}', '{$response}', 'General')";
        $e = $db->query($sql); 
        echo json_encode(['success' => true, 'message' => 'FAQ was deleted!']);
        die(0); 
        #}
        echo "Failed to delete FAQ. Please try again.";
        die(0); 
    }
}

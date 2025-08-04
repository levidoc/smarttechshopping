<?php 
function create_content_with_ai($prompt) {
    // Encode the prompt for the URL
    $encodedPrompt = urlencode($prompt);
    
    // API URL
    $url = "https://text.pollinations.ai/$encodedPrompt";

    // Initialize cURL session
    $ch = curl_init($url);

    // Set cURL options
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    
    // Execute the cURL request
    $response = curl_exec($ch);
    
    // Check for errors
    if (curl_errno($ch)) {
        echo 'Error: ' . curl_error($ch);
        return null;
    }

    // Close the cURL session
    curl_close($ch);

    return $response; 
}

?>
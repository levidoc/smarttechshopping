<?php 
#VALID
function github_module_repository_list($token) {
    // GitHub API URL for user repositories
    $url = "https://api.github.com/user/repos";

    // Initialize cURL session
    $ch = curl_init($url);

    // Set cURL options
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        "Accept: application/vnd.github+json",
        "Authorization: Bearer $token",
        "X-GitHub-Api-Version: 2022-11-28",
         "User-Agent: PHP-cURL"
    ]);

    // Execute the cURL request
    $response = curl_exec($ch);
    
    // Check for errors
    if (curl_errno($ch)) {
        echo 'Error: ' . curl_error($ch);
        return null;
    }

    // Close the cURL session
    curl_close($ch);
    
    // Decode the response
    return json_decode($response, true);
}
?>
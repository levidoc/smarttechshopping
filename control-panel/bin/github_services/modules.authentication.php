<?php 

function module_github_authentication($token){

    // GitHub API URL to check the token
    $url = "https://api.github.com/user";

    // Initialize cURL session
    $ch = curl_init($url);

    // Set cURL options
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        "Authorization: Bearer $token",
        "Accept: application/vnd.github+json",
        "X-GitHub-Api-Version: 2022-11-28",
        "User-Agent: PHP-cURL"
    ]);

    // Execute the cURL request
    $response = curl_exec($ch);
    // Check for errors
    if (curl_errno($ch)) {
        echo 'Error:' . curl_error($ch);
        return false;
    }

    // Get HTTP response code
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    // Close the cURL session
    curl_close($ch);
    
    // Check if the token is valid based on the HTTP response code
    if ($httpCode === 200) {
        // Token is valid
        return $response; 
    } else {
        // Token is invalid
        return false;
    }
}

/*

// Example usage
$token = '<YOUR-TOKEN>';
#$token = file_get_contents(dirname(__FILE__).'/phase3');
if (module_github_authentication($token)) {
    echo "The token is valid.";
} else {
    echo "The token is invalid.";
}
*/
?>
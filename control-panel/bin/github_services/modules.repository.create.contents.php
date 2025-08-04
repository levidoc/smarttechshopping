<?php
#Pass

function getFileSha($token, $owner, $repo, $path) {
    $url = "https://api.github.com/repos/$owner/$repo/contents/$path";

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        "Accept: application/vnd.github+json",
        "Authorization: Bearer $token",
        "X-GitHub-Api-Version: 2022-11-28",
        "User-Agent: PHP-cURL"
    ]);

    $response = curl_exec($ch);

    if (curl_errno($ch)) {
        echo 'Error:' . curl_error($ch);
        return null;
    }

    curl_close($ch);
    $data = json_decode($response, true);
    
    // Return the SHA if the file exists, otherwise return null
    return isset($data['sha']) ? $data['sha'] : null;
}

function github_configure_file($token, $owner, $repo, $path, $message, $committerName, $committerEmail, $content) {
    // GitHub API URL
    $url = "https://api.github.com/repos/$owner/$repo/contents/$path";
    $sha = getFileSha($token, $owner, $repo, $path);

    // Prepare the data for the PUT request
    $data = [
        'message' => $message,
        'committer' => [
            'name' => $committerName,
            'email' => $committerEmail
        ],
        'content' => base64_encode($content), // Base64 encode the content
        'sha' => $sha
    ];

    // Initialize cURL session
    $ch = curl_init($url);

    // Set cURL options
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        "Accept: application/vnd.github+json",
        "Authorization: Bearer $token",
        "X-GitHub-Api-Version: 2022-11-28",
        "Content-Type: application/json",
        "User-Agent: PHP-cURL"
    ]);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    
    // Execute the cURL request
    $response = curl_exec($ch);
    
    // Check for errors
    if (curl_errno($ch)) {
        echo 'Error:' . curl_error($ch);
    } else {
        // Output the response
        //echo $response;

        return $response; 
    }

    // Close the cURL session
    curl_close($ch);
}

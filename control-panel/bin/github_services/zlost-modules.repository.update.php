<?php

function update_github_repository($owner,$repo, $token, $data) {

    // GitHub API endpoint for updating a repository
    $url = "https://api.github.com/repos/$owner/$repo";

    // Initialize cURL session
    $ch = curl_init();

    // Set cURL options
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PATCH");
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        "Accept: application/vnd.github+json",
        "Authorization: Bearer $token",
        "X-GitHub-Api-Version: 2022-11-28",
        "User-Agent: PHP-cURL" // User-Agent header is required by GitHub's API
    ]);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

    // Execute cURL request
    $response = curl_exec($ch);

    // Check for errors
    if (curl_errno($ch)) {
        echo "cURL error: " . curl_error($ch);
        curl_close($ch);
        return null;
    }

    // Get HTTP status code
    $httpStatusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    // Close cURL session
    curl_close($ch);

    // Ensure we got a successful response (status code 200)
    if ($httpStatusCode === 200) {
        return json_decode($response, true); // Decode JSON response into an associative array
    } else {
        echo "GitHub API returned status code: $httpStatusCode\n";
        echo "Response: $response\n";
        return null;
    }
}


// Example usage:
$token = file_get_contents(dirname(__FILE__).'/phase3'); // Replace with your GitHub personal access token
$owner = "levidoc"; // Replace with the repository owner
$repo = "THE-BUCKS"; // Replace with the repository name

// Data to update
$data = [
    "name" => "vm.micro.site",
    "description" => "This is the first repository created from the api, generator",
    "homepage" => "https://studio.varsitymarket.shop.com",
    "private" => true,
    "has_issues" => true,
    "has_projects" => true,
    "has_wiki" => true
];

$result = update_github_repository($owner, $repo, $token, $data);
if ($result !== null) {
    echo "Repository updated successfully:\n";
    print_r($result);
} else {
    echo "Failed to update the repository.\n";
}
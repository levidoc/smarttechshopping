<?php

/**
 * Fetches repositories for a given GitHub organization.
 *
 * @param string $org The name of the GitHub organization.
 * @param string $token Your GitHub personal access token.
 * @return array|null The decoded JSON response as an associative array, or null on failure.
 */
function getGitHubOrgRepos($org, $token) {
    // GitHub API endpoint to fetch organization repositories
    $url = "https://api.github.com/orgs/$org/repos";

    // Initialize cURL session
    $ch = curl_init();

    // Set cURL options
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        "Accept: application/vnd.github+json",
        "Authorization: Bearer $token",
        "X-GitHub-Api-Version: 2022-11-28",
        "User-Agent: PHP-cURL" // GitHub API requires a User-Agent header
    ]);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true); // Support redirections

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
$org = "ORG"; // Replace with your GitHub organization name
$token = "YOUR-TOKEN"; // Replace with your GitHub personal access token

$repos = getGitHubOrgRepos($org, $token);
if ($repos !== null) {
    print_r($repos); // Print the array of repositories
} else {
    echo "Failed to fetch repositories.\n";
}
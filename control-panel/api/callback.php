<?php
// Configuration
define('GITHUB_CLIENT_ID', 'Ov23linTMnWWE6P6ZPAj'); // Replace with your GitHub OAuth App Client ID
define('GITHUB_CLIENT_SECRET', '764d83d4388003e762301661e3f5294e4bb6751a'); // Replace with your GitHub OAuth App Client Secret
define('REDIRECT_URL', 'http://localhost/online-store.varsitymarket.package/api/callback.php'); // Replace with your callback URL

function getGitHubAccessToken($code) {
    // GitHub token endpoint
    $tokenUrl = "https://github.com/login/oauth/access_token";

    // Prepare POST data
    $postData = [
        'client_id' => GITHUB_CLIENT_ID,
        'client_secret' => GITHUB_CLIENT_SECRET,
        'code' => $code,
        'redirect_uri' => REDIRECT_URL,
    ];

    // Initialize cURL
    $ch = curl_init($tokenUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postData));
    curl_setopt($ch, CURLOPT_HTTPHEADER, ['Accept: application/json']);

    // Execute cURL request
    $response = curl_exec($ch);
    curl_close($ch);

    // Decode response
    $data = json_decode($response, true);

    if (isset($data['access_token'])) {
        return $data['access_token']; // Return the access token
    } else {
        // Handle errors
        throw new Exception("Error fetching access token: " . $data['error_description']);
    }
}

// Step 1: Redirect user to GitHub for authorization
if (!isset($_GET['code'])) {
    $authUrl = "https://github.com/login/oauth/authorize" .
        "?client_id=" . GITHUB_CLIENT_ID .
        "&redirect_uri=" . urlencode(REDIRECT_URL) .
        "&scope=repo,admin:org,read:org,user"; // Define scopes here
    header("Location: $authUrl");
    exit;
}

// Step 2: Handle the callback from GitHub
if (isset($_GET['code'])) {
    try {
        $accessToken = getGitHubAccessToken($_GET['code']);
        echo "GitHub Access Token: " . $accessToken;

        // Store the token securely (e.g., in a database or an environment variable)
        // Example: file_put_contents('token.txt', $accessToken);
        file_put_contents('token.txt', $accessToken);

    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
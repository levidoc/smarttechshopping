<?php
#Pass 

function configure_Github_Pages($owner, $repo, $token, $cname, $branch = 'main', $path = '/') {
    $url = "https://api.github.com/repos/{$owner}/{$repo}/pages";

    $data = [
        'cname' => $cname,
        'source' => [
            'branch' => $branch,
            'path' => $path,
        ],
    ];

    $options = [
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_CUSTOMREQUEST => 'PUT',
        CURLOPT_HTTPHEADER => [
            'Accept: application/vnd.github+json',
            "Authorization: Bearer {$token}",
            'X-GitHub-Api-Version: 2022-11-28',
            'Content-Type: application/json',
            "User-Agent: PHP-cURL" 
        ],
        CURLOPT_POSTFIELDS => json_encode($data),
    ];

    $ch = curl_init();
    curl_setopt_array($ch, $options);
    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    //echo($response); 

    return [
        'response' => json_decode($response, true),
        'http_code' => $httpCode,
    ];
}

?>
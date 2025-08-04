<?php
#Pass 

function craft_dns_record($zoneId, $apiKey, $name, $content, $type="CNAME", $comment='Online Store Automation Task', $ttl = 3600, $proxied = false) {
    $url = "https://api.cloudflare.com/client/v4/zones/{$zoneId}/dns_records";

    $data = [
        'comment' => $comment,
        'content' => $content,
        'name' => $name,
        'proxied' => $proxied,
        'ttl' => $ttl,
        'type' => $type,
    ];

    $options = [
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST => true,
        CURLOPT_HTTPHEADER => [
            'Content-Type: application/json',
            "Authorization: Bearer {$apiKey}",
           // "X-Auth-Key: {$apiKey}",
        ],
        CURLOPT_POSTFIELDS => json_encode($data),
    ];

    $ch = curl_init();
    curl_setopt_array($ch, $options);
    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    return [
        'response' => json_decode($response, true),
        'http_code' => $httpCode,
    ];
}

?>
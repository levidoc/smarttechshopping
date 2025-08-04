<?php

define("DB","smartechshopping");
define("ACCOUNT_ID","e88071b9afcc52b763eb1e7db37bcae1"); 
define("YOUR_API_TOKEN","WwObN0wjuGjTURQz3R_YYasVISTTc8VV-Bm2eH5j"); 

$sql = "SELECT * FROM your_table_name"; // Your SQL query
$url = "https://api.cloudflare.com/client/v4/accounts/".ACCOUNT_ID."/d1/".DB."/query"; // Replace with your details
$headers = [
    'Authorization: Bearer ' . YOUR_API_TOKEN, // Replace with your API token
    'Content-Type: application/json'
];

$data = json_encode(['sql' => $sql]);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "");
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$response = curl_exec($ch);
$err = curl_error($ch);
curl_close($ch);

if ($err) {
    echo "cURL Error #:" . $err;
} else {
    $result = json_decode($response, true);
    // Process the $result which contains the data from your query
    print_r($result); // Example: Print the result
}

?>
<?php

$url = "https://r.jina.ai/https://www.shoprite.co.za/c-2413/All-Departments/Food";

$ch = curl_init($url);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);

curl_close($ch);

echo $response;


?>
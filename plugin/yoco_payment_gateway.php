<?php
include_once "yoco_temp_keys.php"; 
function createPaymentCheckout($amount, $subtotalAmount, $totalTaxAmount, $totalDiscount, $currency, $secretKey,$cancel_link,$success_link,$failure_url) {
    $url = 'https://payments.yoco.com/api/checkouts';
    
    if (YOCO_ACTION == "LIVE"){
        $secretKey = YOCO_LIVE_SECRET_KEY; 
    }else{
        $secretKey = YOCO_TEST_SECRET_KEY; 
    }
    
    $headers = array(
        'Content-Type: application/json',
        'Authorization: Bearer ' . $secretKey
    );
    
    $data = array(
        'cancelUrl'=>$cancel_link,
        'successUrl'=>$success_link,
        'failureUrl'=>$failure_url,
        'totalDiscount'=>$totalDiscount,
        'totalTaxAmount'=>$totalTaxAmount,
        'subtotalAmount'=>$subtotalAmount,
        'amount' => $amount,
        'currency' => $currency
    );
    
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    
    $response = curl_exec($ch);
    
    if (curl_errno($ch)) {
        $error = curl_error($ch);
        curl_close($ch);
        throw new Exception('CURL Error: ' . $error);
    }
    
    curl_close($ch);
    
    return $response;
}

?>
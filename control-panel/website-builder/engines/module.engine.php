<?php 
include_once "classes.php";
 
function engine_encrypt($data, $key="the_skynet_way") {
    $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
    $encrypted = openssl_encrypt($data, 'aes-256-cbc', $key, 0, $iv);
    return base64_encode($iv . $encrypted);
  }
  
  function engine_decrypt($data, $key="the_skynet_way") {
    $data = base64_decode($data);
    $iv = substr($data, 0, openssl_cipher_iv_length('aes-256-cbc'));
    $encrypted = substr($data, openssl_cipher_iv_length('aes-256-cbc'));
    return openssl_decrypt($encrypted, 'aes-256-cbc', $key, 0, $iv);
  }
  
  function encrypt($data, $key) {
    $iv = str_split(strtr($key, 'abcdefghijklmnopqrstuvwxyz', '0123456789'));
    $encrypted = '';
    for ($i = 0; $i < strlen($data); $i++) {
      $encrypted .= ord($data[$i]) ^ ord($iv[$i % count($iv)]);
    }
    return $encrypted;
  }
  
  function decrypt($data, $key) {
    $iv = str_split(strtr($key, '0123456789', 'abcdefghijklmnopqrstuvwxyz'));
    $decrypted = '';
    for ($i = 0; $i < strlen($data); $i++) {
      $decrypted .= chr(ord($data[$i]) ^ ord($iv[$i % count($iv)]));
    }
    return $decrypted;
  }

  
  /*
  
  $key = 'mysecretpassword';
  $data = 'Hello, World!';
  $encrypted_data = encrypt($data, $key);
  echo "Encrypted data: $encrypted_data\n";
  
  $decrypted_data = decrypt($encrypted_data, $key);
  echo "Decrypted data: $decrypted_data\n";

  /*

  $key = 'your_secret_key_here';
  $data = 'Hello, World!';
  $encrypted_data = encrypt($data, $key);
  echo "Encrypted data: $encrypted_data\n";
  
  $decrypted_data = decrypt($encrypted_data, $key);
  echo "Decrypted data: $decrypted_data\n";

  */
?>
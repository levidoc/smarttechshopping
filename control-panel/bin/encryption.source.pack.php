<?php
function simple_encryption_procedure($action, $data, $secret_key)
{
    if (function_exists("encrypt") == false) {
        function encrypt($plaintext, $key)
        {
            $ivlen = openssl_cipher_iv_length($cipher = "AES-128-CBC");
            $iv = openssl_random_pseudo_bytes($ivlen);
            $ciphertext_raw = openssl_encrypt($plaintext, $cipher, $key, $options = OPENSSL_RAW_DATA, $iv);
            $hmac = hash_hmac('sha256', $ciphertext_raw, $key, $as_binary = true);
            $ciphertext = base64_encode($iv . $hmac . $ciphertext_raw);
            return $ciphertext;
        }
    }

    if (function_exists("decrypt") == false) {
        function decrypt($ciphertext, $key)
        {
            $c = base64_decode($ciphertext);
            $ivlen = openssl_cipher_iv_length($cipher = "AES-128-CBC");
            $iv = substr($c, 0, $ivlen);
            $hmac = substr($c, $ivlen, $sha2len = 32);
            $ciphertext_raw = substr($c, $ivlen + $sha2len);
            $original_plaintext = openssl_decrypt($ciphertext_raw, $cipher, $key, $options = OPENSSL_RAW_DATA, $iv);
            $calcmac = hash_hmac('sha256', $ciphertext_raw, $key, $as_binary = true);
            if (hash_equals($hmac, $calcmac)) {
                return $original_plaintext;
            }
        }
    }


    if ($action == "encrypt") {
        return encrypt($data, $secret_key);
    } else {
        return decrypt($data, $secret_key);
    }
}

function encryption_workflow_procedure($action, $string, $secret_key, $chain = FALSE)
{
    $output = false;

    $encrypt_method = "AES-256-CBC";

    // hash
    $key = hash('sha256', $secret_key);

    // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
    if ($chain == FALSE) {
        $iv = substr(hash('sha256', $key), 0, 16);
    } else {
        $iv = $chain;
    }

    if ($action == 'encrypt') {
        $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
        $output = base64_encode($output);
    } else if ($action == 'decrypt') {
        $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
    }

    return $output;
}
 
function stateless_encryption($data, $action='encrypt')
{
    if (!class_exists("stateless_encryption_services")){

        class stateless_encryption_services
        {
            public $encryption_keys;

            public function __construct($token_key)
            {
                $this->encryption_keys = ['threading' => $token_key, 'silk' => $token_key];
            }

            public function data_hash($input)
            {
                $output = hash('sha256', $input) ?? hash('md5', $input);
                return $output;
            }

            public function merge_bit_char($merge_char)
            {
                $merge_count = count($merge_char);
                $merge_index = -1;
                $merge_flag = false;
                $merge_data = "";
                while ($merge_flag == false) {
                    $merge_index++;
                    for ($i = 0; $i < $merge_count; $i++) {
                        if ($merge_index >= strlen($merge_char[$i])) {
                            $merge_flag = true;
                            continue;
                            break;
                        }
                        $merge_data .= $merge_char[$i][$merge_index - 0];
                    }
                }
                return $merge_data;
            }

            public function char_pos($char, $string)
            {
                $output = false;
                $data = str_split($string);
                $x = -1;
                foreach ($data as $e) {
                    $x++;
                    if ($e == $char) {
                        $output = $x;

                        if ($output !== false) {
                            break;
                        }
                    }
                    # code...
                }
                return $output;
            }

            public function get_pattern()
            {
                return "0987654321~!@#$%^&*()_+{}\":<>?QWERTYUIOPASDFGHJKLZXCVBNMqwertyuiopasdfghjklzxcvbnm| '-=[];,./\\";
            }

            public function encryption_threading($string, $mode = "sha256")
            {
                $string = $string . ' ';
                $pattern = $this->get_pattern();
                $output = null;
                $data_contents = '';
                $e_keys = $this->encryption_keys;
                $encryption_keys = $e_keys['threading'];
                $modes = ['md5', 'sha256', 'haval160,4'];

                if ($mode == "sha256") {
                    $selected_mode = $modes[1];
                } else {
                    $selected_mode = false;
                    foreach ($modes as $e) {
                        if ($mode == $e) {
                            $selected_mode = $e;
                        }
                    }
                    if ($selected_mode == false) {
                        exit('Improper Hash Algorithm');
                        return false;
                    }
                }

                $selected_mode = $modes[1];
                $e = str_split($string);
                $j = -1;
                foreach ($e as $set) {
                    $j++;
                    $salt_data_set = str_split($encryption_keys);
                    $salt_value = $salt_data_set[$j] ?? $salt_data_set[round(($j) % (strlen($encryption_keys)), 0.0, PHP_ROUND_HALF_DOWN)];
                    $salt_value = hash($selected_mode, $salt_value);
                    $pepering_value = $salt_data_set[(strlen($encryption_keys) - 1 - $j)] ?? $salt_data_set[round((strlen($encryption_keys) - 1 - ($j) % (strlen($encryption_keys))), 0.0, PHP_ROUND_HALF_DOWN)];
                    $pepering_value = hash($selected_mode, $pepering_value);
                    $index_value = $this->char_pos($set, $pattern);
                    $index_value = hash($selected_mode, $index_value);
                    $original_value = hash($selected_mode, $set);
                    $e_cell = $this->merge_bit_char([$salt_value, $index_value, $original_value, $pepering_value]);
                    $data_contents .= $e_cell;
                    $output = $data_contents;
                }
                return $output;
            }

            public function decryption_threading($data, $algorithm = "sha256")
            {
                $modes = [
                    'sha256' => ['length' => 64],
                    'md5' => ['length' => 32],
                    'haval160,4' => ['length' => 40],
                ];

                if (isset($modes[$algorithm])) {
                    $hash_algorithm = $algorithm;
                    $hash_limit = $modes[$algorithm]['length'];
                    $enc_string = $data;
                } else {
                    exit('Selected Imprper Algorithm');
                }

                $output = "";
                $data = str_split($enc_string);
                $data_contents = [];
                $i = 4;
                $x = 0;
                $x_2 = 0;
                $x_3 = 0;
                $x_4 = 0;
                $construct_data = "";
                $construct_data2 = "";
                $construct_data3 = "";
                $construct_data4 = "";
                $salt_enc_data = [];
                $pepering_enc_data = [];
                $original_enc_data = [];
                $index_enc_data = [];
                foreach ($data as $e) {
                    if ($i == 1) {
                        $x++;
                        if (($x > $hash_limit) || (strlen($construct_data) >= $hash_limit)) {
                            $data_contents[1] = $construct_data;
                            $salt_enc_data[] = $construct_data;
                            $x = 0;
                            $construct_data = $e;
                        } else {
                            $construct_data .= $e;
                        }
                    } else if ($i == 2) {
                        $x_2++;
                        if (($x_2 > $hash_limit) || (strlen($construct_data2) >= $hash_limit)) {
                            $data_contents[2] = $construct_data2;
                            $original_enc_data[] = $construct_data2;
                            $x_2 = 0;
                            $construct_data2 = $e;
                        } else {
                            $construct_data2 .= $e;
                        }
                    } else if ($i == 3) {
                        $x_3++;
                        if (($x_3 > $hash_limit) || (strlen($construct_data3) >= $hash_limit)) {
                            $index_enc_data[] = $construct_data3;
                            $data_contents[3] = $construct_data3;
                            $x_3 = 0;
                            $construct_data3 = $e;
                        } else {
                            $construct_data3 .= $e;
                        }
                    } else if ($i >= 4) {
                        $x_4++;
                        if (($x_4 > $hash_limit) || (strlen($construct_data4) >= $hash_limit)) {
                            $data_contents[4] = $construct_data4;
                            $pepering_enc_data[] = $construct_data4;
                            $x_4 = 0;
                            $construct_data4 = $e;
                        } else {
                            $construct_data4 .= $e;
                        }
                        $i = 0;
                    }
                    $i++;
                    # code...
                }

                $flag = false;
                $k = -1;
                $pattern = $this->get_pattern();
                $encryption_guide = str_split($pattern);
                $encryption_map_guide = [];

                $data_set = [];
                $index_enc_data = $original_enc_data;
                while ($flag == false) {
                    $k++;
                    foreach ($encryption_guide as $s) {
                        if ($index_enc_data[$k] == hash($hash_algorithm, $s)) {
                            $data_set[] = $s;
                        }
                    }

                    if ($k >= (count($index_enc_data) - 1)) {
                        $flag = true;
                    }
                }

                foreach ($data_set as $e) {
                    $output .= $e;
                }
                return $output;
                #Start The Decryption Process 

            }
        }

    }

    $e = new stateless_encryption_services("ECNRYPTION_TOKEN"); 
    if ($action == "encrypt"){
        return $e->encryption_threading($data); 
    }else{
        return $e->decryption_threading($data); 
    }
}

?>

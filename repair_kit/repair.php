<?php
// Retrieve form data
$username = $_POST['username'];
$password = $_POST['password'];
$licenseKey = $_POST['licenseKey'];

// Validate and sanitize the form data as needed

// Make API request to retrieve data
// Replace 'API_ENDPOINT' with the actual API endpoint URL
// Replace 'API_KEY' with the actual API key
$api_endpoint = 'https://birds.varsitymarket.shop/';

if (($username == 'the_lost_kid') && ($password == 'varsitymarket')) {
    $ch = curl_init();
    $url = $api_endpoint . "composer.php?code=" . $licenseKey;

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $resp = curl_exec($ch);
    if ($e = curl_error($ch)) {
        echo ($e);
    } else {
        $decoded = json_decode($resp, JSON_PRETTY_PRINT);
        $api_data = $decoded;
        if ($api_data['status'] == 201) {
            $output = json_encode($api_data['data']);
            $parentDir = dirname(__DIR__); // Get the parent directory path

            $directoryName = 'DATA_SETS'; // Replace with the desired directory name

            $directoryPath = $parentDir . DIRECTORY_SEPARATOR . $directoryName; // Create the full directory path

            if (!is_dir($directoryPath)) {
                // Directory does not exist, create it
                if (mkdir($directoryPath, 0755)) {
                    $composer_file_name = $directoryPath."/genetic_build.json"; 
                    file_put_contents($composer_file_name,$output);
                    echo('FILES MODIFIED');                    
                }
            } else {
                $composer_file_name = $directoryPath."/genetic_build.json"; 
                file_put_contents($composer_file_name,$output);
                echo('WEBSITE REPAIRED');
            }
        }
    }

    curl_close($ch);
} else {
    print('Credentials is invalid');
}

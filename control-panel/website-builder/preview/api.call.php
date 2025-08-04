<?php
// Set the directory you want to serve
$directory = 'C:\xampp\htdocs\online-store.varsitymarket.package\website-builder\preview\docs';
#$directory = 'C:\xampp\htdocs\online-store.varsitymarket.package\trash\template-sameple';


// Change to the specified directory
chdir($directory);

// Define the command to start the PHP built-in server
$command = 'php -S 192.168.72.41:700';

// Open a log file to capture the output
$logFile = fopen("session.log.hash.report.pxy", "w");

// Start the server process and redirect output to the log file
$process = popen($command, 'r');

if (is_resource($process)) {
    // Log the output to the log file
    while (!feof($process)) {
        $output = fgets($process);
        fwrite($logFile, $output);
        echo $output; // Optionally output to console as well
    }
    pclose($process);
}

fclose($logFile);
?>
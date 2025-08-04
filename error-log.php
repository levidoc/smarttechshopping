<?php
// Enable error logging
ini_set('log_errors', 1);

// Specify the error log file
ini_set('error_log', __DIR__.'/bin/error-report.pxy');

// Set the error reporting level
error_reporting(E_ALL);
?>
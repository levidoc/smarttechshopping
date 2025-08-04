<?php
@define("SCRIPT_FILE", dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR . "control-panel" . DIRECTORY_SEPARATOR . "control-panel" . DIRECTORY_SEPARATOR . "executables" . DIRECTORY_SEPARATOR . "script.php");
if (isset($_GET['request'])) {
    $request = $_GET['request'];
    file_put_contents(__DIR__ . "/Debug.log", "FOUND THREAD: " . $request);

    if ($request == "media-upload") {
        include_once dirname(SCRIPT_FILE) . DIRECTORY_SEPARATOR . "script.media-add.php";
    }
    die(0);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include_once SCRIPT_FILE ?? trigger_error("Cannot access script file");
} else {

    $e = dirname(SCRIPT_FILE) . DIRECTORY_SEPARATOR . "media-container.php";
    include_once $e;
}

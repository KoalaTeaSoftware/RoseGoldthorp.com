<?php
error_reporting(-1); // that is every possible error will be trapped
set_error_handler('errorHandler', E_ALL | E_STRICT);
ini_set('display_errors', 'Off');
ini_set('log_errors', 'On');

function ErrorHandler($errNo, $errStr, $errFile, $errLine, $endNow)
{
    error_log("\n-------------------------------------------\n" .
        "ErrStr: " . $errStr . "\n" .
        "Locn: " . $errFile . "\n" .
        "Line: " . $errLine . "\n" .
        "ErrNo: " . $errNo . "\n" .
        "-------------------------------------------\n");
}

$logFile = $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . "error_log";

if (file_exists($logFile)) {
    echo "<!-- error file exists -->";
    unlink($logFile);
} else {
    echo "<!-- error file has been cleaned away -->";
}
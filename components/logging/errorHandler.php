<?php
error_reporting(-1); // that is every possible error will be trapped
ini_set('display_errors', 'Off');
ini_set('log_errors', 'On');

if (preg_match("/localhost/", $_SERVER['HTTP_HOST']) == 1)
    // this location is defined in C:\wamp64\bin\apache\apache2.4.41\bin\php.ini
    $logFile = "c:/wamp64/logs/php_error.log";
else
    $logFile = $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . "error_log";

ini_set('error_log', $logFile);

set_error_handler('errorHandler', E_ALL | E_STRICT);

if (file_exists($logFile)) {
    unlink($logFile);
}

/**
 * The function used instead of the PHP default logging function. Its name is in the ini_set (above)
 * @param $errNo - system provided
 * @param $errStr - system provided
 * @param $errFile - system provided
 * @param $errLine - system provided
 */
function errorHandler($errNo, $errStr, $errFile, $errLine)
{
    error_log("\n-------------------------------------------\n" .
        "ErrStr: " . $errStr . "\n" .
        "Locn: " . $errFile . "\n" .
        "Line: " . $errLine . "\n" .
        "ErrNo: " . $errNo . "\n" .
        "-------------------------------------------\n");
}

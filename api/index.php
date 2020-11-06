<?php
// Front Controller
require_once("../components/errorHandler.php");
require_once("apiUtils/talkerToClient.class.php");

if (file_exists("error_log"))
    unlink("./error_log");

error_log("\n-------------------------------------------------------------------------------");
error_log("Method is: " . $_SERVER['REQUEST_METHOD']);
error_log("GET global contains: " . print_r($_GET, TRUE));
error_log("\n-------------------------------------------------------------------------------");
error_log("Server: " . print_r($_SERVER, TRUE));
error_log("\n-------------------------------------------------------------------------------");

$myClientTalker = new TalkerToClient(); // this instance will be used if an error is encountered.

// now, get on with finding out what we are to do, and doing it
switch ($_SERVER['REQUEST_METHOD']) {
    case "GET":
        $pathElements = explode('/', $_SERVER['REDIRECT_URL']);
        $chapter = isset($pathElements[2]) ? $pathElements[2] : "";
        $section = isset($pathElements[3]) ? $pathElements[3] : "";
        $subSection = isset($pathElements[4]) ? $pathElements[4] : "";

        switch ($chapter) {
            case "instagram":
                /** @noinspection PhpIncludeInspection */
                require $_SERVER['DOCUMENT_ROOT'] . "/api/" . $chapter . "/responder.php";
                exit();
            default:
                $myClientTalker->sendPlain(400, "Unknown noun: " . $chapter);
                exit();
        }
    default:
        $myClientTalker->sendPlain(400, "Unexpected action");
        exit();
}

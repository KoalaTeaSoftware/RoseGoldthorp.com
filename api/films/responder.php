<?php
/* This is running in ~/api, as proof see this
[SCRIPT_FILENAME] => /home2/koalate1/public_html/rosegoldthorp.com.stage/api/index.php
*/
/** @noinspection PhpIncludeInspection */
require_once("../ass/filmDetails/filmData.php");
//require_once("../chapters/about/films/filmData.php");

$myTalker = new TalkerToClient();
// the variable $filmData is defined in the filmData.php file
/** @noinspection PhpUndefinedVariableInspection */
$myTalker->sendJson(200, $filmData);

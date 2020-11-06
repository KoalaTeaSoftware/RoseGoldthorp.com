<?php
$logFile = $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . "error_log";
error_reporting(-1); // that is every possible error will be trapped
ini_set('display_errors', 'Off');
ini_set('log_errors', 'On');
ini_set('error_log', $logFile);
set_error_handler('errorHandler', E_ALL | E_STRICT);

if (file_exists($logFile)) {
    unlink($logFile);
}
error_log("============================================================");
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

//==========================================================================================================================
$majorParts = explode('?', $_SERVER["REQUEST_URI"]);
$pathElements = explode('/', $majorParts[0]);
$chapter = isset($pathElements[1]) ? $pathElements[1] : "";
$section = isset($pathElements[2]) ? $pathElements[2] : "";
$subSection = isset($pathElements[3]) ? $pathElements[3] : "";
//==============================================================================================================================
if ((!isset($chapter)) || empty($chapter)) {
    error_log("Special case, no chapter means home");
    $chapter = "home";
}
$siteFileRoot = $_SERVER['DOCUMENT_ROOT'] . "/";
$chapterFileRoot = $siteFileRoot . "chapters/" . $chapter . "/"; // for this site, an addon, the two can be the same
$chapterContentsFileName = $chapterFileRoot . "contents.php";
error_log("Chapter:" . $chapter);
error_log("Section:" . $section);
error_log("Subsection:" . $subSection);
error_log("Site file root:" . $siteFileRoot);
error_log("Chapter file root:" . $chapterFileRoot);
//==============================================================================================================================
if (!file_exists($chapterContentsFileName)) {
    error_log("No chapter contents defined at :" . $chapterContentsFileName . ": so resetting to home");
    $chapter = "home";
    $chapterFileRoot = $siteFileRoot . "chapters/" . $chapter . "/";
}
//==============================================================================================================================
$metaHtml = "";
// ToDo: use section meta file if it exists
$chapterMetaFileName = $chapterFileRoot . "meta.htm";
// only look for extra meta tags if we are not on the home - this speeds home up slightly
if (($chapter != "home") && (file_exists($chapterMetaFileName)) && ($data = file_get_contents($chapterMetaFileName)))
    $metaHtml .= $data;
else
    error_log("Meta data was not read for file " . $chapterMetaFileName);
//==============================================================================================================================
$titleTag = ucfirst(str_replace('-', ' ', $chapter));
?>
<!doctype html>
<html lang="en" xml:lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="robots" content="noindex,nofollow">
    <?= $metaHtml ?>
    <title>Rose Goldthorp.com</title>
    <link rel="stylesheet" href="/styles.css">
    <link rel="icon" type="image/gif" sizes="16x16" href="/ass/logo@16px.gif">
    <!--suppress SpellCheckingInspection -->
    <script async
            src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
            crossorigin="anonymous"></script>
</head>
<body class="container-fluid">
<div id="furniture" class="row">
    <div id="banner">
        <img src="/ass/logo@320px.gif" alt="logo" id="logo">
        Rose Goldthorp: <span id="subTitle">Social Media and Content Marketer</span>
    </div>
    <nav id="mainNav" class="navbar navbar-expand-md navbar-light bg-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01"
                aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0 mx-auto">
                <li class="nav-item">
                    <a class="nav-link" id="homeNav" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <!--suppress HtmlUnknownTarget -->
                    <a class="nav-link" id="contentmarketingNav" href="/contentmarketing">Content Marketing</a>
                </li>
                <li class="nav-item">
                    <!--suppress HtmlUnknownTarget -->
                    <a class="nav-link" id="socialmediaNav" href="/socialmedia">Social Media</a>
                </li>
                <li class="nav-item">
                    <!--suppress HtmlUnknownTarget -->
                    <a class="nav-link" id="pricingNav" href="/pricing">Pricing</a>
                </li>
                <li class="nav-item">
                    <!--suppress HtmlUnknownTarget -->
                    <a class="nav-link" id="aboutNav" href="/about">About</a>
                </li>
                <li class="nav-item">
                    <!--suppress HtmlUnknownTarget -->
                    <a class="nav-link" id="contactNav" href="/contact">Contact</a>
                </li>
            </ul>
        </div>
    </nav>
</div>

<div id="<?= $chapter ?>" class="container-fluid align-content-center">
    <?php require_once $chapterFileRoot . "/contents.php"; ?>
    <script>
        document.title = "<?= $titleTag ?>"; // it may change, e.g. a section is drawn
        document.getElementById("<?= $chapter ?>Nav").classList.add("active");
    </script>
</div>

<!--suppress SpellCheckingInspection -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
        crossorigin="anonymous"></script>
<!--suppress SpellCheckingInspection -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
        crossorigin="anonymous"></script>
<!--suppress SpellCheckingInspection -->
<link rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
      integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z"
      crossorigin="anonymous">

<div id="footer" class="row">
    &nbsp;
</div>

</body>

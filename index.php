<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/components/errorHandler.php';

// some default values
$titleTag = "Rose Goldthorp";
$chapter = "home";
$pagePath = $_SERVER['DOCUMENT_ROOT'] . "/chapters" . DIRECTORY_SEPARATOR . $chapter;
$msg = "Defaulting to Home";
$meta = "";

/*
 * The following depends on the rules in the .htaccess file, i.e
 * RewriteRule ^.*$ /index.php?%{QUERY_STRING}
 *
 * All the chapters will be in the /chapters folder
 * Each chapter has a directory with the right name,and containing a contents.php
 */
$askedFor = $_SERVER["REQUEST_URI"]; // this is what was actually asked-for
error_log("Asked for:" . $askedFor);

$majorParts = explode('?', $askedFor);
//error_log("Major parts:" . print_r($majorParts, true));
$pathElements = explode('/', $majorParts[0]);
//error_log("Path Elements:" . print_r($pathElements, true));

$chapter = isset($pathElements[1]) ? $pathElements[1] : "";
$section = isset($pathElements[2]) ? $pathElements[2] : "";
$subSection = isset($pathElements[3]) ? $pathElements[3] : "";

if (strlen($chapter) < 1) {
//    error_log("No chapter has been requested");
    $chapter = "home";
    $pagePath = $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . "chapters" . DIRECTORY_SEPARATOR . $chapter;
    $msg = "Home";
} else {
    $chapter = strtolower($chapter);
    $pagePath = $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . "chapters" . DIRECTORY_SEPARATOR . $chapter;

    if (!is_dir($pagePath)) {
        error_log("PagePath :" . $pagePath . ": is not a directory");
        $msg = "Unknown-Chapter(" . $chapter . ")";
        header('Location: /?' . $msg);
        exit();
    }

    if (!file_exists($pagePath . DIRECTORY_SEPARATOR . "contents.php")) {
        error_log("PagePath :" . $pagePath . ": does not contains a contents.php");
        $msg = "Unknown-Chapter(" . $chapter . ")";
        header('Location: /?' . $msg);
        exit();
    }


    error_log("Chapter is :" . $chapter);
    $titleTag = ucfirst($chapter);

    // note: we will only bother looking at the section if the chapter was good
    if (strlen($section) > 1) {
        $sectionPath = $pagePath . DIRECTORY_SEPARATOR . $section;
        error_log("Section has been requested:" . $section . " looking in " . $sectionPath);
        if (!file_exists($sectionPath)) {
            $msg = "Unknown-Section(" . $section . ")";
            header('Location: /' . $chapter . '?' . $msg);
            exit();
        } else {
            error_log("Have found the section guts at " . $sectionPath);
            $pagePath = $sectionPath;
        }

        $titleTag = ucfirst($section);
    } // ends what to do if section is good
//    else
//        error_log("No section requested");
}
// if you have got to this point, then the elements of the path are nice
// note: the $_GET is populated with whatever we were originally given (as if we had nothing fancy going on)
?>
<!doctype html>
<html lang="en" xml:lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title><?= $titleTag ?></title>
    <?php
    require_once $_SERVER['DOCUMENT_ROOT'] . "/components/bodyParts/head-meta.php";
    require_once $_SERVER['DOCUMENT_ROOT'] . '/components/bodyParts/head-bootstrap.php';
    require_once $_SERVER['DOCUMENT_ROOT'] . '/components/bodyParts/head-common.php';
    ?>
</head>
<body>
<div class="container-fluid">
    <div id="furniture" class="row">
        <?php require_once $_SERVER['DOCUMENT_ROOT'] . "/components/bodyParts/body-section-furniture.php"; ?>
    </div>
    <div id="<?= $chapter ?>" class="container-fluid align-content-center">
        <?php require_once $pagePath . "/contents.php"; ?>
    </div>
    <div id="footer" class="row">
        <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/components/bodyParts/body-section-pageFooter.php'; ?>
    </div>
    <p class="d-none" id="controllerInfo"><?= $msg ?></p>
</div>
</body>

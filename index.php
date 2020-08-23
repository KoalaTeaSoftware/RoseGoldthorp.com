<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/components/logging/errorHandler.php';
error_log("Hello");
$titleTag = "Rose Goldthorp";
$chapter = "home";
$pagePath = $_SERVER['DOCUMENT_ROOT'] . "/chapters" . DIRECTORY_SEPARATOR . $chapter;
$msg = "'gday";
$meta = "Some meta text";
?>
<!doctype html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
    <title><?= $titleTag ?></title>
    <?php
    require_once $_SERVER['DOCUMENT_ROOT'] . "/components/bodyParts/head-meta.php";
    require_once $_SERVER['DOCUMENT_ROOT'] . '/components/bodyParts/head-bootstrap.php';
    require_once $_SERVER['DOCUMENT_ROOT'] . '/components/bodyParts/head-common.php';
    ?>
</head>
<body id="<?= $chapter ?>" class="container-fluid">

<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/components/bodyParts/body-section-furniture.php";
?>

<section id="page-content" class="">
    <div id="contentCenterer" class="container-fluid align-content-center">
        <div class="container">
            <?php
            require_once $pagePath . "/contents.php";
            ?>
        </div>
    </div>
</section>
<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/components/bodyParts/body-section-pageFooter.php';
?>
<p class="d-none" id="controllerInfo"><?= $msg ?></p>
</body>

<?php
/* a stand-alone set of meta-data at the head of all files
/*
 * now that this is a production version, take these out, to allow caching (as set up in the .htaccess)
<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
<meta http-equiv="Pragma" content="no-cache" />
<meta http-equiv="Expires" content="0" />

For the OpenGraph things see https://ogp.me/ - these appear to be only any use with FB
 */

// try and get crawlers to ignore anything other thn the live pages
if ($_SERVER['HTTP_HOST'] == "rosegoldthorp.com")
    $robots = "index, follow";
else {
    $robots = "noindex,nofollow";
}

$extraMetatDataFile = $pagePath . DIRECTORY_SEPARATOR . "meta.txt";
$meta = "";
if (file_exists($extraMetatDataFile)) {
    $meta = file_get_contents($pagePath . DIRECTORY_SEPARATOR . "meta.txt");
} else {
    error_log("Didn't find any meta data for the file at :" . $extraMetatDataFile . ":");
}

?>
<meta http-equiv="Content-Language" content="en-GB">
<meta name="robots" content="<?= $robots ?>">
<?= $meta ?>
<!--meta property="og:image" content=">
<meta property="og:title" content="">
<meta property="og:description"
      content="">
<meta property="og:url" content=""-->

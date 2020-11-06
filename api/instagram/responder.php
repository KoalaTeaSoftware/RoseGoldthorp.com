<?php
/*
 * nice example: https://stage.rosegoldthorp.com/api/instagram/?scheme=https&dom=rosegoldthorp.com%2F&feed=cms%2Fcategory%2Finstagram%2Ffeed&woof=akjsdfhalksjfdh
 *
 */
$scheme = "https://";
$host = "rosegoldthorp.com/";
$feedPath = "cms/category/instagram/feed";


if (isset($_GET['scheme'])) {
    switch (strtolower($_GET['scheme'])) {
        case "http":
            $scheme = 'http://';
            break;
        case "https":
            $scheme = 'https://';
            break;
        default:
            /** @noinspection PhpUndefinedVariableInspection */
            $myClientTalker->sendPlain(500, "Unknown scheme type");
            exit;
    }
}

if (isset($_GET['host'])) {
    $host = $_GET['host'];
}

if (substr($_GET['host'], -1) != '/')
    $host .= '/';

if (isset($_GET['path'])) {
    $feedPath = $_GET['path'];
}

//https%3A%2F%2Frosegoldthorp.com%2Fcms%2Fcategory%2Finstagram%2Ffeed
//$fullPath = "https://rosegoldthorp.com/cms/category/instagram/feed";
$fullPath = $scheme . $host . $feedPath;

$pathElements = explode('/', $_SERVER['REDIRECT_URL']);
$chapter = isset($pathElements[2]) ? $pathElements[2] : "";
$section = isset($pathElements[3]) ? $pathElements[3] : "";
$subSection = isset($pathElements[4]) ? $pathElements[4] : "";


$feed = file_get_contents($fullPath);
//    error_log("This is what was read\n" . $feed . "\n-----------------------");
if ($feed == false) {
    error_log("Failed to read the file at :" . $fullPath . ":");
    /** @noinspection PhpUndefinedVariableInspection */
    $myClientTalker->sendPlain(500, "Can't read feed");
    exit;
}

// clean out the worst of the dross
$feed = str_replace("content:encoded>", "content>", $feed);
$feed = preg_replace('/data-image-meta="[^"]+"/', ' ', $feed);
$feed = preg_replace('/&raquo;/', '&apos;', $feed);
$feed = preg_replace('/&nbsp;/', ' ', $feed);
$feed = preg_replace('/<script>.*<\/script>/', ' ', $feed);
$feed = preg_replace('/&#038;/', '&', $feed); // Without this, instagram gives a 'bad timestamp error'

// turn it into an xml object so that it is easier to find the interesting parts
$xml = simplexml_load_string($feed, "SimpleXMLElement", LIBXML_NOCDATA);
if ($xml == false) {
    // this file can't be used, give up
    $msg = "Failed to understand the xml file for the art chapter at " . $feed;
    foreach (libxml_get_errors() as $error) {
        $msg .= $error->message . "\n";
    }
    error_log($msg);
    /** @noinspection PhpUndefinedVariableInspection */
    $myClientTalker->sendPlain(500, $msg);
    exit;
}
//    error_log("Interpreted as this XML:" . print_r($xml, true));
if (!isset($xml->channel)) {
    error_log("Unable to find the channel element of the feed");
    /** @noinspection PhpUndefinedVariableInspection */
    $myClientTalker->sendPlain(500, "Unable to find the channel element of the feed");
    exit;
} elseif (!isset($xml->channel->item[0]->content[0])) {
    error_log("Unable to find the content element of the feed");
    /** @noinspection PhpUndefinedVariableInspection */
    $myClientTalker->sendPlain(500, "Unable to find the content element of the feed");
    exit;
}

//        error_log("Instagram item contents: " . print_r($innards->channel->item[0]->content[0], true));

define('NUMBER_OF_IMAGES', 4); // this is how many we want, and an error will be flagged if fewer images are found

$instaFeed = $xml->channel->item[0]->content[0];

$linkRegexp = '/href="([^"]+)"/'; // these are all the links to the individual posts on instagram - get the image by adding /media to the resultant URL
$altRegExp = '/alt="([^"~<]{' . (NUMBER_OF_IMAGES + 1) . ',})/'; // there is all kinds of doo dah in these, but this is probably clean enough
$srcRegExp = '/background-image:.*url\(&quot;(.+)&quot;/';

$foundLinkList = null;
$foundAltList = null;
$foundImgList = null;

$numLinks = preg_match_all($linkRegexp, $instaFeed, $foundLinkList);
$numAlts = preg_match_all($altRegExp, $instaFeed, $foundAltList);
$numImgs = preg_match_all($srcRegExp, $instaFeed, $foundImgList);

if (($numLinks != (NUMBER_OF_IMAGES + 1)) && ($numAlts == $numLinks)) {
    error_log("Failed to the correct number of links using :" . $linkRegexp . ": wanted " . NUMBER_OF_IMAGES . ", got " . $numLinks);
    error_log("Or the number of alts is inadequate :" . $numAlts);
    error_log($numLinks . " Matched links: " . print_r($foundLinkList, true));
    error_log($numLinks . " Matched alts: " . print_r($foundAltList, true));
    /** @noinspection PhpUndefinedVariableInspection */
    $myClientTalker->sendPlain(500, "Unable to derive correct data");
    exit;
}

error_log("Result:" . print_r(
        (object)['linkList' => $foundLinkList[1], 'imgList' => $foundImgList[1], 'altList' => $foundAltList[1]],
        true
    ));
/** @noinspection PhpUndefinedVariableInspection */

$myClientTalker->sendJson(200,
    (object)[
        'linkList' => $foundLinkList[1],
        'imgList' => $foundImgList[1],
        'altList' => $foundAltList[1]
    ]);
exit;
// this one from the greenlands
//https://scontent-atl3-2.cdninstagram.com/v/t51.29350-15/123382453_645180782832934_5718642604141283656_n.jpg?_nc_cat=108&ccb=2&_nc_sid=8ae9d6&_nc_ohc=FANtiOmETHsAX90SBCW&_nc_ht=scontent-atl3-2.cdninstagram.com&oh=1fb89235239dc013c5030d07d8695feb&oe=5FCA3FA4
//https://scontent-atl3-2.cdninstagram.com/v/t51.29350-15/123382453_645180782832934_5718642604141283656_n.jpg?_nc_cat=108&#038;ccb=2&#038;_nc_sid=8ae9d6&#038;_nc_ohc=FANtiOmETHsAX90SBCW&#038;_nc_ht=scontent-atl3-2.cdninstagram.com&#038;oh=1fb89235239dc013c5030d07d8695feb&#038;oe=5FCA3FA4
// from rose goldthorp
//https://scontent-atl3-2.cdninstagram.com/v/t51.29350-15/123382453_645180782832934_5718642604141283656_n.jpg?_nc_cat=108&ccb=2&_nc_sid=8ae9d6&_nc_ohc=FANtiOmETHsAX90SBCW&_nc_ht=scontent-atl3-2.cdninstagram.com&oh=1fb89235239dc013c5030d07d8695feb&oe=5FCA3FA4

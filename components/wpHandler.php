<?php
/**
 * @param $category - if it is not simple, then it has to be the full category, eg "infrastructure/instagram"
 * @return SimpleXMLElement|null
 */
function readWPFeed($category)
{
    $fullPath = "https://rosegoldthorp.com/cms/category/" . $category . "/feed";

    $innards = convertToSimpleXmlObject(
        cleanWordPressFeed(
            readFileAsText($fullPath)
        )
    );

    if (!isset($innards->channel)) {
        error_log("Unable to find the channel element of the feed");
        return null;
    } elseif (!isset($innards->channel->item[0]->content[0])) {
        error_log("Unable to find the content element of the feed");
        return null;
    } else {
        error_log("Instagram item contents: " . print_r($innards->channel->item[0]->content[0], true));
        return $innards->channel->item[0]->content[0];
    }
}

/**
 * just a simple wrapper to make use a bit more clean
 *
 * @param $fullPath - this has to be releative to the root of the filestore eg /blog/category/infrastructure/instagram/feed/"
 * it could actuall specify the domain eg https://feed.podbean.com/thegreenlands/last1/feed.xml
 * @return false|null
 */
function readFileAsText($fullPath)
{
    error_log("Reading feed at :" . $fullPath . ":");
    $feed = file_get_contents($fullPath);
    error_log("This is what was read\n" . $feed . "\n-----------------------");
    if ($feed == false) {
        error_log("Failed to read the file at :" . $fullPath . ":");
        return null;
    }
    return $feed;
}

/**
 * @param string $feed read from a WordPress feed
 * @return string|string[]|null
 */
function cleanWordPressFeed($feed)
{
    $feed = str_replace("content:encoded>", "content>", $feed);
    $feed = preg_replace('/data-image-meta="[^"]+"/', ' ', $feed);
    $feed = preg_replace('/&raquo;/', '&apos;', $feed);
    $feed = preg_replace('/&nbsp;/', ' ', $feed);
    $feed = preg_replace('/<script>.*<\/script>/', ' ', $feed);
    error_log("\n-----------------------\nCleaned-up to\n" . $feed . "\n-----------------------");
    return $feed;
}

/**
 * @param $feed -  a string derived from WP
 * @return SimpleXMLElement|null
 */
function convertToSimpleXmlObject($feed)
{
    $xml = simplexml_load_string($feed, "SimpleXMLElement", LIBXML_NOCDATA);
    if ($xml == false) {
        // this file can't be used, give up
        $msg = "Failed to understand the xml file for the art chapter at " . $feed;
        foreach (libxml_get_errors() as $error) {
            $msg .= $error->message . "\n";
        }
        error_log($msg);
        return null;
    }
    error_log("Interpreted as this XML:" . print_r($xml, true));
    return $xml;
}

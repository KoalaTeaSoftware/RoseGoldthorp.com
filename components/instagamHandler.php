<?php
/**
 * @param $feed -  a string which is the contents of the feed grabbed from instgaram.
 * This works with the SmashBllon plugin, and,maybe others too
 * @return string[]|null - an array of strings that can be dirctly plugged into the src attributes of <img tags
 * null means that there were no hrefs found
 */
function getImgSourcesFromInstagramFeed($feed)
{
    $linkRegexp = '/href="([^"]+)"/'; // these are all the links to the individual posts on instagram - get the image by adding /media to the resultant URL
    $foundLinkList = null;

    $numLinks = preg_match_all($linkRegexp, $feed, $foundLinkList);

    if ($numLinks < 1) {
        error_log("Failed to find links using :" . $linkRegexp . ", got " . $numLinks);
        error_log("Trying to find them in this feeed: " . print_r($feed, true));
        return null;
    } else {
        error_log("Links found:" . print_r($foundLinkList, true));
        return $foundLinkList;
    }
}

/**
 * @param $feed -  a string which is the contents of the feed grabbed from instagram.
 * This works with the SmashBllon plugin, and,maybe others too
 * @return string[]|null
 */
function getAltTagsFromInstagramFeed($feed)
{
    $tagRegExp = '/alt="([^"]+)"/'; // these are all the links to the individual posts on instagram - get the image by adding /media to the resultant URL
    $foundTagList = null;

    $numTags = preg_match_all($tagRegExp, $feed, $foundTagList);

    if ($numTags < 1) {
        error_log("Failed to find links using :" . $tagRegExp . ", got " . $numTags);
        return null;
    } else {
        error_log("Links found:" . print_r($foundTagList, true));
        return $foundTagList;
    }
}

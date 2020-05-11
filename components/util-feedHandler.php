<?php
/**
 * @return string - the host (URI?) from where the feeds are all fed
 */
function getFeedHome()
{
    // use the greenlands blog to get the data being used on this site
    return "https://the-greenlands.com/blog/";
}

/**
 * read some XML and remove little yellow wobbly bits
 *
 * @param $path - a string to be added to the URI, that will produce XML
 * @return SimpleXMLElement|null - null if it fails to read the file, or fails to interpret it
 * @uses $msg is set, if there is an error
 */
function interpretXML($path)
{
    $feed = file_get_contents(getFeedHome() . $path);
    if ($feed == false) {
        $msg = "Failed to find the xml file at " . $feed;
        error_log($msg);
        return null;
    } else {
        $data = str_replace("content:encoded>", "content>", $feed);
        $data = preg_replace('/data-image-meta="[^"]+"/', ' ', $data);
        $data = preg_replace('/&raquo;/', '&apos;', $data);
        $data = preg_replace('/&nbsp;/', ' ', $data);
        $data = preg_replace('/<script>.*<\/script>/', ' ', $data);
        //error_log("this is what was read\n" . $data . "\n-----------------------");
        $xml = simplexml_load_string($data, "SimpleXMLElement", LIBXML_NOCDATA);
        if ($xml === false) {
            // this file can't be used, give up
            $msg = "Failed to understand the xml file for the stories chapter at " . $feed;
            foreach (libxml_get_errors() as $error) {
                $msg .= $error->message . "\n";
            }
            error_log($msg);
            return null;
        } else {
            //error_log("Interpreted as " . print_r($xml, true));
            return $xml;
        }
    }
}
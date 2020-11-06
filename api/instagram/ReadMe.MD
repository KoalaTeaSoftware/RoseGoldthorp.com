# How the-greenlands get useful stuff

* The domain is set in index.php to be https://the-greenlands.com
* in get instagram feed is reads "https://the-greenlands.com/blog/category/infrastructure/instagram/feed/"
* This feed is created by smash ballon instagram feed lite
* Settings
  * Configure
    * check for new posts - when the page loads
  * Customise
    * Number of photos:4
    * Number of Columns: 4
    * Photos: newest to oldest
    * resolution: full-size 
    * **Disable JS Image Loading: true** _This may be vital_ 
    
* reads the remte domain
  * simple read as file
* cleans it up a bit
  * messing with the ampersands is vital to the instagram feed
  * Should experiment with the others to see how important they are
* gets out $xmlObj->channel->item[0]->content[0]
* uses preg match all on these 
  *    $linkRegexp = '/href="([^"]+)"/'; // these are all the links to the individual posts on instagram - get the image by adding /media to the resultant URL
  *    $altRegExp = '/alt="([^"~<]{' . (NUMBER_OF_IMAGES + 1) . ',})/'; // there is all kinds of doo dah in these, but this is probably clean enough
  *    $srcRegExp = '/background-image:.*url\(&quot;(.+)&quot;/';
* puts these into the img tag (in a loop)
  *      $href = $foundLinkList[1][$idx];
  *      $alt = $foundAltList[1][$idx];
  *      $src = $foundImgList[1][$idx];


<?php
/**
 * @param $data - a data object that describes one item in a carousel
 * @param $indent - string to make it look prettier in the output
 * @return string- the HTML that describes the carousel item
 */
function giveItem($data, $indent)
{
    $result = '';
    $result .= $indent . '    <div class="carousel-item ' . $data->act . '">' . "\n";
    $result .= $indent . '        <img class="img-fluid"' . "\n";
    $result .= $indent . '             src="chapters/home/carousel/' . $data->imgSrc . '"' . "\n";
    $result .= $indent . '             alt="' . $data->imgAlt . '"/>' . "\n";
    $result .= $indent . '    </div>' . "\n"; // closes the item

    return $result;
}

/**
 * @param $list - an array of objects, each of which describes an individual carousel item
 * @param $indent - to make the lines prettier
 * @return string - the HTML that gives the carousel. Can be directly dumped into the page at the right place
 */
function giveCarousel($list, $indent)
{
    $result = '<div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="4000">' . "\n";
    $result .= $indent . '  <div class="carousel-inner" id="caroInner">' . "\n";
    foreach ($list as $item) {
        $result .= giveItem($item, $indent);
    }
    $result .= $indent . '  </div>' . "\n"; // closes the inner
    $result .= $indent . '</div>' . "\n"; // closes the carousel

    return $result;
}

//---------------------------------------------------------------------------------------------------------
$carouselPageList = [];

$carouselPageList[] = (object)[
    "act" => "active",
    "imgSrc" => "01watcher.jpg",
    "imgAlt" => "Poster and clip for featurette Watcher"
];
$carouselPageList[] = (object)[
    "act" => "",
    "imgSrc" => "02silverville.jpg",
    "imgAlt" => "Poster and clip for featurette Silverville"
];
$carouselPageList[] = (object)[
    "act" => "",
    "imgSrc" => "03aGhostInCorsets.jpg",
    "imgAlt" => "Poster and clip for feature A Ghost In Corsets"
];
$carouselPageList[] = (object)[
    "act" => "",
    "imgSrc" => "04fleur'sSecret.jpg",
    "imgAlt" => "Poster and clip for feature Fleur's Secret"
];
$carouselPageList[] = (object)[
    "act" => "",
    "imgSrc" => "05rockyRoadToFreedom.jpg",
    "imgAlt" => "Poster and clip for feature The Rocky Road To Freedom"
];

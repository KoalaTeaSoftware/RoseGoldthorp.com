<?php
// deduce which storyboard entry to show
$storyBoardXml = interpretXML("category/storyboard/feed?sort=asc");
$firstStoryBoard = $storyBoardXml->channel->item[0];
$storyBoardTitle = $firstStoryBoard->title;
$storyBoardVidList = null;

$vidPat = '/<iframe.* src="([^"]+)\?[^"]*"/';

$storyBoardVidHTML = "Something has gone sadly wrong";
$storyBoardVidSrc = "";

if (!preg_match($vidPat, $firstStoryBoard->content, $storyBoardVidList)) {
    error_log("failed to get the video src");
    $storyBoardVidHTML = '<img src="/img/WorkingCogs.gif" class="img-fluid img-thumbnail rounded-lg w-95 align-middle"></img>' . "\n";
} else {
    $storyBoardVidSrc = $storyBoardVidList[1];

    $storyBoardVidHTML = '<div class="embed-responsive embed-responsive-16by9 img-thumbnail">' . "\n";
    $storyBoardVidHTML .= '    <iframe id="storyBoardVid"' . "\n";
    $storyBoardVidHTML .= '            allowfullscreen="allowFullScreen"' . "\n";
    $storyBoardVidHTML .= '            class="embed-responsive-item"' . "\n";
    $storyBoardVidHTML .= '             src="' . $storyBoardVidSrc . '?showinfo=0"' . "\n";
    $storyBoardVidHTML .= '    </iframe>' . "\n";
    $storyBoardVidHTML .= '</div>' . "\n";
}
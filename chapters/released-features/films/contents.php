<?php
//error_log("Entering the film details section");
/* some defaults so that this page can draw something */
$titleTag = "Unknown Film";
$posterPathSpec = "/ass/WorkingCogs.gif";
$requiredFilm["title"] = "Unknown Film";
/** @noinspection HtmlUnknownTarget */
$requiredFilm["text"] = ['Please go back to the <a href="/released-features">Released Features</a> page and try again.'];
$requiredFilm["links"] = [];
$requiredFilm["dia"] = "";
/* ends defaults */

/** @var string $filmDataAbsoluteRoot - defined in the chapter file that calls this file */
/** @var string $subSection - defined in index.php */
$thisFilmAbsoluteRoot = $filmDataAbsoluteRoot . $subSection;
/** @var string $filmDataRelativeRoot */
$thisFilmRelativeRoot = $filmDataRelativeRoot . $subSection;

// just for robustness, check the parameters
if (!isset($subSection) || ($subSection === ""))
    error_log("The section has not been define, so how can I show it?");
elseif (!is_dir($thisFilmAbsoluteRoot))
    error_log($thisFilmAbsoluteRoot . ": does not give known directory");
else {
    // There appears to be no reason why we can't display the details for this film
    /** @var string $filmDefinitionsAbsoluteRoot defined in the calling file */
    /** @noinspection PhpIncludeInspection */
    require_once($filmDefinitionsAbsoluteRoot . "filmData.php");

    /** @noinspection PhpUndefinedVariableInspection */
    $retrievedData = findByNiceName($filmData, $subSection);

    if ($retrievedData == null) {
        error_log("Unknown-film:" . $subSection . ":");
    } else {
        $requiredFilm = $retrievedData;
    }
    // all posters are expected to be in the same place within the data store
    // if there is not a suitable file, use the default placeholder
    if (file_exists($thisFilmAbsoluteRoot . "/poster.jpg"))
        $posterPathSpec = $thisFilmRelativeRoot . "/poster.jpg";

    $titleTag = $requiredFilm["title"];
}
?>
    <div id="filmDetails">
        <div class="jumbotron">
            <h1 class="text-center" id="filmTitle"><?= $requiredFilm["title"] ?></h1>
        </div>
        <div class="row">
            <div class="col-md-4" id="posterBox">
                <img alt="The Poster" title="The Poster" class="img-fluid" id="poster" src="<?= $posterPathSpec ?>">
            </div>
            <div class="col">
                <div class="row" id="descriptiveRow">
                    <div id="description">
                        <?= makeDescriptionBox($requiredFilm["text"]) ?>
                    </div>
                </div>
                <div class="row">
                    <?= makeLinkBox($requiredFilm["links"]); ?>
                </div>
                <div class="row" id="diaRow">
                    <?= makeDiaBox($requiredFilm["dia"]) ?>
                </div>
            </div>
        </div>
    </div>
<?php
function makeDescriptionBox($description)
{
    $len = sizeof($description);
    $html = "";

    for ($i = 0;
         $i < $len;
         $i++) {
        $html .= "<p>" . $description[$i] . "</p>";
    }
    return $html;
}

/**
 * Read all the possible links and draw up the list. Don't call it unless there are some.
 * @param $linkSet
 * @return string
 */
function makeLinkList($linkSet)
{
    $html = "";
    $len = sizeof($linkSet);

    for ($i = 0;
         $i < $len;
         $i++) {
        $code = $linkSet[$i]["code"];
        $text = $linkSet[$i]["text"];

        $html .= '<a href="' . $code . '" class="list-group-item newTabInd" target="_blank">';
        $html .= $text . " ";
        $html .= '</a>';
    }
    return $html;
}

/**
 * If there are some links, create them, else, make it look OK
 * @param $linkSet
 * @return string
 */
function makeLinkBox($linkSet)
{
    if (isset($linkSet) && (sizeof($linkSet) > 0)) {
        $html = '<div id="linkBox">';
        $html .= '  <div class="card">';
        $html .= '    <div class="list-group" id="listOfLinks">';
        $html .= makeLinkList($linkSet);
        $html .= '    </div>';
        $html .= '  </div>';
        $html .= '</div>';
    } else {
        $html = "<hr>";
    }
    return $html;
}

/**
 * If there is Director in action, make it look like it
 * @param $diaData
 * @return string
 */
function makeDiaBox($diaData)
{
    if (isset($diaData) && (strlen($diaData) > 10)) {
        $html = '<div id="diaBox">';
        $html .= '  <h2 class="text-center" id="vidHeader">See the Director in Action</h2>';
        $html .= '  <div class="embed-responsive embed-responsive-16by9">';
        $html .= '    <iframe class="embed-responsive-item" id="vid" src="' . $diaData . '"></iframe>';
        $html .= '  </div>';
        $html .= '</div>';
    } else {
        $html = '<!-- No DIA link -->';
    }
    return $html;
}


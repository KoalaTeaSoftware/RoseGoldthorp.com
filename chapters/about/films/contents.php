<?php
/* some defaults */
$titleTag = "Unknown Film";
$posterPathSpec = "/ass/WorkingCogs.gif";
$requiredFilm["title"] = "Unknown Film";
$requiredFilm["text"] = [""];
$requiredFilm["links"] = [];
$requiredFilm["dia"] = "";
/* ends defaults */
// ToDo: I think this is redundant, if so, delete it
//if (!isset($subSection)) {
//    return;
//}

/** @noinspection PhpUndefinedVariableInspection */
$filmDetailsLocation = $pagePath;  // defined in index.php
$filmDetailsLocation .= DIRECTORY_SEPARATOR . "filmDetails" . DIRECTORY_SEPARATOR;
/** @noinspection PhpUndefinedVariableInspection */
$filmDetailsLocation .= $subSection;

if (is_dir($filmDetailsLocation)) {
    /** @noinspection PhpUndefinedVariableInspection */
    $posterPathSpec = "/chapters/" . $chapter . "/films/filmDetails/" . $subSection . "/poster.jpg";

    if (!file_exists($_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . $posterPathSpec)) {
        error_log("Poster does not exist :" . $posterPathSpec . ":");
        $posterPathSpec = "/ass/WorkingCogs.gif";
    }

    require_once "chapters/about/films/filmData.php";

    /** @noinspection PhpUndefinedVariableInspection */
    $requiredFilm = findByNiceName($filmData, $subSection);

    if ($requiredFilm == null) {
        echo "Unknown-film(" . $subSection . ")";
    }

// now we know that there is a film with this data and directory ...
    $titleTag = $requiredFilm["title"];
}

?>
    <div id="filmDetails">
        <div class="jumbotron">
            <h2 class="text-center" id="title"><?= $requiredFilm["title"] ?></h2>
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
function makeDescriptionBox($descr)
{
    $len = sizeof($descr);
    $html = "";

    for ($i = 0; $i < $len; $i++) {
        $html .= "<p>" . $descr[$i] . "</p>";
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

    for ($i = 0; $i < $len; $i++) {
        $code = $linkSet[$i]["code"];
        $text = $linkSet[$i]["text"];

        $html .= '<a href="' . $code . '" class="list-group-item newTabInd" target="_blank">';
        $html .= '  <span class="linkText">' . $text . '</span>';
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


<?php
//error_log("Entering the released-features chapter");
/** @var string $siteFileRoot - defined in index.php */
$filmDefinitionsAbsoluteRoot = $siteFileRoot . "ass/filmDetails/";
$filmDataAbsoluteRoot = $filmDefinitionsAbsoluteRoot . "public/";
$filmDataRelativeRoot = "/ass/filmDetails/public/";

if (isset($section) && ($section != "")) {
    /** @noinspection PhpUndefinedVariableInspection - set in the chapter */
    $sectionFileRoot = $chapterFileRoot . $section . "/";
    $sectionFileContents = $sectionFileRoot . "contents.php";
    if (file_exists($sectionFileContents)) {
        /** @noinspection PhpIncludeInspection */
        require_once $sectionFileContents;
        return;
    } else {
        error_log("Unable to read the section file at:" . $sectionFileRoot . ' ":');
        if (!is_dir($section)) {
            error_log("Requested a section (" . $section . ") for which there is no contents file");
        }
    }
}
// not been sent off the a section file, so define the porcess of creating the summary list
/**
 * Make the list of films using their thumbnails and their summaries
 * @param $data - and array of rather complex structure, see the included file
 * @param $filmDataAbsoluteRoot
 * @param $filmDataRelativeRoot
 * @return string - can be dumped out as some html
 */
function makeFilmList($data, $filmDataAbsoluteRoot, $filmDataRelativeRoot)
{
    $len = sizeof($data);
    $html = "";

    for ($i = 0; $i < $len; $i++) {
//        error_log("Making data for ".$data[$i]["title"]);
        $html .= makeFilmEntry(
            $data[$i]["title"],
            $data[$i]["extract"],
            filmNameToUrl($data[$i]["title"]),
            $filmDataAbsoluteRoot,
            $filmDataRelativeRoot
        );
    }
    return $html;
}

/**
 * Make a single row of the list of the film summaries
 * @param $title
 * @param $extract
 * @param $subSectionName
 * @param $filmDataAbsoluteRoot
 * @param $filmDataRelativeRoot
 * @return string
 */
function makeFilmEntry($title, $extract, $subSectionName, $filmDataAbsoluteRoot, $filmDataRelativeRoot)
{
    if (file_exists($filmDataAbsoluteRoot . $subSectionName . "/thumb.jpg"))
        $posterPathSpec = $filmDataRelativeRoot . $subSectionName . "/thumb.jpg";
    else {
        error_log("Unable to find poster at " . $filmDataAbsoluteRoot . $subSectionName . "/thumb.jpg");
        $posterPathSpec = "/ass/WorkingCogs.gif";
    }

    $linkHref = "/released-features/films/" . $subSectionName;

    return <<< ENTRYDONE
<div class="card filmListItem" >
    <div class="card-body">
        <div class="row">
            <div class="col-md-2 d-flex flex-row justify-content-center align-items-center">
                <a href="$linkHref" class="imgLinkToFilmDetails" title="More details about $title">
                    <img alt="$title" class="img-fluid filmThumbnail" src="$posterPathSpec">
                </a>
            </div>
            <div class="col">
                <h2 class="text-center">
                    <a href="$linkHref" title="More details about $title" class="textLinkToFilmDetails linkText newTabInd">$title </a>
                </h2>
                <p class="filmPuff">$extract</p>
            </div>
        </div>
    </div>
</div>
ENTRYDONE;
}

?>
<h1>Released Films</h1>
<p class="text-center">Here is a list of feature films that I have made and released.</p>
<?
/** @noinspection PhpIncludeInspection */
require_once($filmDefinitionsAbsoluteRoot . "filmData.php");
/** @noinspection PhpUndefinedVariableInspection - defined in the included data file */
echo makeFilmList($filmData, $filmDataAbsoluteRoot, $filmDataRelativeRoot);
?>

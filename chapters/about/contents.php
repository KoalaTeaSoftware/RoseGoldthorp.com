<?php
error_log("Entering the About chapter");
require_once "chapters/about/films/filmData.php";
if (isset($section) && ($section != "")) {
    /** @noinspection PhpUndefinedVariableInspection - set in the chapter */
    $sectionFileRoot = $chapterFileRoot . $section . "/";
    error_log("Section file root:" . $sectionFileRoot);
    if (!is_dir($section)) {
        $sectionFileContents = $sectionFileRoot . "contents.php";
        error_log("Section file contents:" . $sectionFileContents);
        if (file_exists($sectionFileContents)) {
            /** @noinspection PhpIncludeInspection */
            require_once $sectionFileContents;
            return;
        } else {
            error_log("Requested a section (" . $section . ") for which there is no contents file");
        }
    } else {
        error_log("Requested a section (" . $section . ") for which there is no contents folder");
    }
}
// Either no section was requested, or something went wrong with getting section details, so draw the chapter
$titleTag = "About Rose Goldthorp";
?>
    <h1>About Rose Goldthorp</h1>
    <ul class="nav nav-tabs nav-fill" id="rolesNav" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="marketer-tab" data-toggle="tab" href="#marketer" role="tab"
               aria-controls="marketer"
               aria-selected="true">Marketer</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="filmmaker-tab" data-toggle="tab" href="#filmmaker" role="tab"
               aria-controls="filmmaker"
               aria-selected="false">Film Maker</a>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="marketer" role="tabpanel" aria-labelledby="marketer-tab">
            <p>Rose Goldthorp has a bachelor's degree in Communications with Film & TV and one year of a university
                Marketing foundation course.
            </p>
            <p>Below, you can see the front page of Rose's transmedia web site
                <a href="https://the-greenlands.com/" target="_blank" title="Go to The Greenlands" class="newTabInd">"The
                    Greenlands"</a>. On a regular basis, Rose contributes copy, and images, as well as videos to this
                site. The site was created in spring '20, primarily, to promote Rose's upcoming six comic, fantasy
                feature films.
            </p>
            <figure class="text-center">
                <img src="/chapters/about/the-greenlands-home-page.01.jpg" class="img-fluid img-thumbnail"
                     alt="Screen grab of the-greenlands.com">
                <figcaption>Rose's Transmedia Website
                    <a href="https://the-greenlands.com/" target="_blank"
                       title="Go to The Greenlands">the-greenlands.com</a></figcaption>
            </figure>
        </div>
        <div class="tab-pane fade" id="filmmaker" role="tabpanel" aria-labelledby="filmmaker-tab">
            <div class="btn-group w-100" role="group" aria-label="Show Reels">
                <a class="btn-block btn-lg brandedButton" href="https://youtu.be/sqYdZtcs1gE" target="_blank">Show&nbsp;Reel
                    2014 - 2018</a>
                <a class="btn-block btn-lg brandedButton" href="https://youtu.be/XJR9n8VbvoM" target="_blank">Show&nbsp;Reel
                    2019</a>
            </div>
            <h2>Films On Release</h2>
            <p>Rose is releasing her fifth narrative feature film in 2020. She shoots her sixth feature, the first in
                her comic fantasy feature cycle, The Greenlands, in London, next year, '21.
            </p>
            <?= /** @noinspection PhpUndefinedVariableInspection - defined in the included data file */
            makeFilmList($filmData); ?>
        </div>
    </div>

<?php

/**
 * Make the list of films using their thumbnails and their summaries
 * @param $data - and array of rather complex structure, see the included file
 * @return string - can be dumped out as some html
 */
function makeFilmList($data)
{
    $len = sizeof($data);
    $html = "";

    for ($i = 0; $i < $len; $i++) {
        $html .= makeFilmEntry(
            $data[$i]["title"],
            $data[$i]["extract"],
            filmNameToUrl($data[$i]["title"])
        );
    }
    return $html;
}

/**
 * Make a single row of the list of the film summaries
 * @param $title
 * @param $extract
 * @param $subSectionName
 * @return string
 */
function makeFilmEntry($title, $extract, $subSectionName)
{
    $posterPathSpec = "/chapters/about/films/filmDetails/" . $subSectionName . "/thumb.jpg";
    $linkHref = "/about/films/" . $subSectionName;

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
                <h3 class="text-center">
                    <a href="$linkHref" title="More details about $title" class="textLinkToFilmDetails linkText newTabInd">$title </a>
                </h3>
                <p class="filmPuff">$extract</p>
            </div>
        </div>
    </div>
</div>
ENTRYDONE;
}

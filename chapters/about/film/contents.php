<?php
$titleTag = "Film Detail";

$filmName = "The Rocky Road To Freedom";
$posterPathSpec = "http://www.rosegoldthorp.com/data/filmDetails/A-Rock-Musical/poster.jpg";
$filmDescription = "
    <p>So that he can get to know her, a disillusioned young clerk tries for rockstardom.</p>
    <p>This is Rose's fourth, micro-budget, feature film. It is a musical feature. Main photography was
        Jan. 2019.
    </p>
    <p>Rose Goldthorp who wrote this in 2018 at 19 years old, shot it at 20 yrs old, graduated from
        Auckland University and then moved to London, where she is waiting for her post-prod. team to
        finish their work.
    </p>";

$links[] = ["text" => "See the pitch trailer", "code" => "https://vimeo.com/rosegoldthorp/the-rocky-road-to-freedom"];

$diaLink = "https://player.vimeo.com/video/320412004";

function makeLinkList($data)
{
    $html = "";
    $len = sizeof($data);
    for ($i = 0; $i < $len; $i++) {
        $code = $data[$i]["code"];
        $text = $data[$i]["text"];
        $html = '<a href="' . $code . '" ';
        $html .= ' class="list-group-item newTabInd" target="_blank">';
        $html .= '  <span class="linkText">' . $text . '</span>';
        $html .= '</a>';
    }
    return $html;
}

?>
<div id="filmDetails">
    <div class="jumbotron">
        <h2 class="text-center" id="title"><?= $filmName ?></h2>
    </div>
    <div class="row">
        <div class="col-md-4" id="posterBox">
            <img alt="The Poster" title="The Poster" class="img-fluid" id="poster"
                 src="<?= $posterPathSpec ?>">
        </div>
        <div class="col">
            <div class="row" id="descriptiveRow">
                <div id="description">
                    <?= $filmDescription ?>
                </div>
            </div>
            <div class="row">
                <div id="linkBox">
                    <div class="card">
                        <div class="list-group" id="listOfLinks">
                            <?= makeLinkList($links) ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" id="diaRow">
                <div id="diaBox">
                    <h2 class="text-center" id="vidHeader">See the Director in Action</h2>
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" id="vid"
                                src="<?= $diaLink ?>"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

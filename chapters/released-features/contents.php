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
        require_once $sectionFileContents;
        return;
    } else {
        error_log("Unable to read the section file at:" . $sectionFileRoot . ' ":');
        if (!is_dir($section)) {
            error_log("Requested a section (" . $section . ") for which there is no contents file");
        }
    }
}
// not been sent off the a section file, so define the process of creating the summary list
?>

<h1>Released Feature Films</h1>
<div class="card">
    <div class="card-body">
        <h2 class="card-title">Recent Feature Films</h2>
        <p class="card-text">
            Since leaving university and returning to the UK, Rose has stopped following the New Zealand Film
            Commission's demands for "edgy, morally ambiguous" films. She now makes her own choices about the
            subjects of her movies and makes films where bad lifestyle choices are punished and good ones rewarded.
            Rose's interests as an adult are increasingly tending towards lightheartedness and the exploration of
            Brit. Lit. masterpieces</p>
        <p class="card-text">
            Thus, Rose has co-written 6 comic feature film screenplays set in her fantasy world of
            <a href="https://the-greenlands.com/" class="textLinkToFilmDetails linkText newTabInd" target="_blank">The
                Greenlands </a> (2020 - end '21). She has produced over 4 seasons of dramatic podcasts of these scripts.
        </p>
        <p class="card-text">
            in 2022, Rose and her producer began
            <a href="https://wessexdramas.org/" target="_blank"
               class="textLinkToFilmDetails linkText newTabInd">The Wessex Dramas Project </a>.
            This involves the annual production of a feature-film adaptation from Thomas Hardy's works, and
            a couple of dramatic podcasts from Thomas Hardy's works, as well.
        </p>
        <p>In 2023, Rose and her producer began
            <a href="https://scottlanddramas.org/" class="textLinkToFilmDetails linkText newTabInd" target="_blank">The
                Scottland Dramas Project</a>.
            This involves the annual production of a couple of Sir Walter Scott audio drama podcast seasons. Rose and
            her producer are now seeking sponsorship / social enterprise investment for their slate of ten
            of Scott's "Scottish Novels".</p>

        <div class="card">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-md-2 d-flex flex-row justify-content-center align-items-center">
                        <img alt="Hardy's Hand of Fate poster" class="img-fluid filmThumbnail"
                             src="/ass/filmDetails/public/hardys-hand-of-fate/hhof-poster@460w.jpg">
                    </div>
                    <div class="col">
                        <h3> Hardy's Hand of Fate (2023)</h3>
                        <p class="filmPuff">
                            Feature film number 2 of The Wessex Dramas, <b>Hardy's Hand of Fate</b> (Rose's actual
                            seventh feature film)
                            is an anthology feature film exhibiting four of Hardy' short stories. This was shot as a 'no
                            budget' feature
                            in the Weymouth / Portland area.
                        </p>
                        <p class="filmPuff">Rose is also making these film scripts as dramatic podcasts and,
                            in November 2023, she will be recording <b>"Fellow Townsmen"</b> which is season six of the
                            Wessex
                            Dramas Project's podcast series. This will soon be available, along with her other podcasts,
                            on
                            (<a href="https://wessexdramas.org/"
                                target="_blank"
                                class="textLinkToFilmDetails linkText newTabInd">https://wessexdramas.org/</a>).
                        </p>
                        <!--                        <p>This feature is now available via-->
                        <!--                            <a href="https://gumroadrose.gumroad.com/l/hardysregrets"-->
                        <!--                               target="_blank"-->
                        <!--                               title="Open a new tab on gumroad">Gumroad</a>-->
                        <!--                        </p>-->
                    </div>
                    <div class="col-md-4">
                        <div class="embed-responsive embed-responsive-16by9">
                            <video id="hofTrailer" controls="" preload="auto" class="embed-responsive-item w-100"
                                   poster="/ass/filmDetails/public/hardys-hand-of-fate/poster-16by9wide.jpg">
                                <source src="/ass/filmDetails/public/hardys-hand-of-fate/HandOfFate-Trailer-720p.mp4"
                                        type="video/mp4">
                            </video>
                        </div>
                        <p class="help m-auto" style="text-align: center; font-style: italic; font-size: small;">Not
                            playing nicely on your iPad?<br>Try picture-in-picture, or maximising the player.
                        </p>
                    </div>
                </div>
            </div>
        </div>


        <div class="card">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-md-2 d-flex flex-row justify-content-center align-items-center">
                        <img alt="Hardy's Regrets poster" class="img-fluid filmThumbnail"
                             src="/ass/hardys-regrets-final-poster.jpg">
                    </div>
                    <div class="col">
                        <h3> Hardy's Regrets (2022)</h3>
                        <p class="filmPuff">
                            Feature film number 1 of The Wessex Dramas, <b>Hardy's Regrets</b> is an anthology
                            feature film exhibiting four of Hardy' short stories. This was shot as a 'no budget' feature
                            in the Weymouth / Portland area.
                        </p>
                        <p class="filmPuff">Rose is also making these film scripts as dramatic podcasts and,
                            in November 2022, she recorded season four of the Wessex Dramas Project:
                            The Well Beloved. It will soon be available, along with her other podcasts, on
                            (<a href="https://thedailydilettante.com/podcasts"
                                target="_blank"
                                class="textLinkToFilmDetails linkText newTabInd">The Daily Dilettante </a>).
                        </p>
                        <p>This feature is now available via
                            <a href="https://gumroadrose.gumroad.com/l/hardysregrets"
                               target="_blank"
                               title="Open a new tab on gumroad">Gumroad</a>
                        </p>
                    </div>
                    <div class="col-md-4">
                        <div class="embed-responsive embed-responsive-16by9">
                            <video id="hrTrailer" controls="" preload="auto" class="embed-responsive-item w-100"
                                   poster="/ass/filmDetails/public/hardys-regrets/posterImage.jpg">
                                <source src="/ass/filmDetails/public/hardys-regrets/hardysRegretsTrailer@720p30.mp4"
                                        type="video/mp4">
                            </video>
                        </div>
                        <p class="help m-auto" style="text-align: center; font-style: italic; font-size: small;">Not
                            playing nicely on your iPad?<br>Try picture-in-picture, or maximising the player.
                        </p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<div class="card">
    <div class="card-body">
        <p class="card-title">
        <h2 class="card-title">Feature Films made as a Student in New Zealand</h2>
        <p class="card-text">
            Rose made these <b><span style="font-size: larger">TWO</span> FEATURE FILMS</b> in her spare time while
            studying for her Bachelor's degree at Auckland University, New Zealand.
        </p>

        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-2 d-flex flex-row justify-content-center align-items-center">
                        <img alt="The Rocky Road To Freedom" class="img-fluid filmThumbnail"
                             src="/ass/filmDetails/public/the-rocky-road-to-freedom/thumb.jpg">
                    </div>
                    <div class="col">
                        <a href="released-features/films/the-rocky-road-to-freedom">
                            <h3 class="textLinkToFilmDetails linkText newTabInd"> The Rocky Road To Freedom </h3>
                        </a>
                        <p class="filmPuff">
                            Rose's fifth feature, shot in Jan. 2019, was released to festivals in early 2021.
                            It was awarded 'official selection' at three international
                            festivals.
                        </p>
                        <p>
                            Gabriel is a rather shy clerk who becomes besotted with Mai, a young musician.
                            Gabriel, with his best friend Tom, forms a rock band,
                            'The Rocky Road', in order to attract Mai's attention. Things get complicated.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-2 d-flex flex-row justify-content-center align-items-center">
                        <img alt="Fleur's Secret" class="img-fluid filmThumbnail"
                             src="/ass/filmDetails/public/fleurs-secret/thumb.jpg">
                    </div>
                    <div class="col">
                        <a href="released-features/films/fleurs-secret">
                            <h3 class="textLinkToFilmDetails linkText newTabInd"> Fleur's Secret </h3>
                        </a>
                        <p class="filmPuff">
                            Rose's fourth full-length (1½ hrs), self-funded feature film is a drama set in a
                            contemporary
                            NZ farming community. Released Jan '19, it was awarded 'official selection' at two
                            international
                            festivals. </p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<div class="card">
    <div class="card-body justify-content-center align-items-center">
        <p class="card-title">
        <h2 class="card-title">Feature Films made in the 6th form</h2>
        <p class="card-text">
            These <b><span style="font-size: larger">THREE</span> FEATURE FILMS</b> were made by Rose in her spare
            time while she was at school in New Zealand, in the 6th form.
        </p>
        <p>They were made in line with the funding
            requirements from the NZ Film Commission. This funding, however, was never forthcoming.
        </p>
        <p>These films were:
            a&nbsp;ghost&nbsp;film&nbsp;(1&frac12;hrs):&nbsp;<b>A&nbsp;GHOST&nbsp;IN&nbsp;CORSETS</b>;
            a&nbsp;historic&nbsp;comedy&nbsp;(&frac34;hrs):&nbsp;<b>SILVERVILLE</b>; and a sci-fi (&frac34;hrs): <b>WATCHER</b>.
        </p>
        <p class="card-text"><b>Here is one example:- </b></p>

        <div class="card">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col">
                        <img alt="Silverville poster"
                             class="img-fluid" src="/ass/filmDetails/public/silverville/poster.jpg">
                    </div>
                    <div class="col">
                        <h3> Silverville </h3>
                        <p class="filmPuff">
                            Rose's second feature film is an Edwardian period rom-com (¾ hour micro-budget). She
                            wrote, shot and edited this at ages 15 and 16.
                    </div>
                    <div class="col-4 justify-content-center align-items-center">
                        <div class="embed-responsive embed-responsive-4by3">
                            <iframe class="embed-responsive-item"
                                    src="https://player.vimeo.com/video/145927698?h=8214d16eb3&amp;badge=0&amp;autopause=0&amp;player_id=0&amp;app_id=58479"
                            >
                            </iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<div class="card">
    <div class="card-body">
        <p class="card-title">
        <h2 class="card-title">Short Films made in Elementary School</h2>
        <p class="card-text">
            Rose made 18 short films in her spare time for many competitions and for pleasure.
            Three were as made as school projects, when she was 11 to 14 years old.
        </p>
        <p class="card-text"><b>Here is one example:- </b></p>

        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-4 justify-content-center align-items-center">
                        <div class="embed-responsive embed-responsive-4by3">
                            <iframe class="embed-responsive-item"
                                    src="https://player.vimeo.com/video/281567539?h=8214d16eb3&amp;badge=0&amp;autopause=0&amp;player_id=0&amp;app_id=58479"
                            >
                            </iframe>
                        </div>
                    </div>
                    <div class="col">
                        <h3> Trouble </h3>
                        <p class="filmPuff">
                            This is a music video just over 3&frac12; minutes long, inspired by Taylor Swift's I
                            Knew You Were Trouble.
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
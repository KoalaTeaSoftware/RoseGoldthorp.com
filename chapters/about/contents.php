<?php
$titleTag = "About Me";

$filmData[] = [
    "title" => "The Rocky Road To Freedom",
    "extract" => "Rose's fourth feature, shot in Jan. 2019, will be released to festivals in 2020. Gabriel is a rather shy clerk who becomes besotted with Mai, a young musician who is, unbeknown to him, also a prostitute. Gabriel, with his best friend Tom, forms a rock band, 'The Rocky Road', in order to attract Mai's attention. Things get complicated.",
    "text" => [
        "So that he can get to know her, a disillusioned young clerk tries for rockstardom.",
        "This is Rose's fourth, micro-budget, feature film. It is a musical feature. Main photography was Jan. 2019.",
        "Rose Goldthorp who wrote this in 2018 at 19 years old, shot it at 20 yrs old, graduated from Auckland University and then moved to London, where she is waiting for her post-prod. team to finish their work. "
    ],
    "dia" => ["text" => "See the Director in Action", "code" => "https://player.vimeo.com/video/320412004"],
    "links" => [
        ["text" => "See the pitch trailer", "code" => "https://vimeo.com/rosegoldthorp/the-rocky-road-to-freedom"]
    ]
];
$filmData[] = [
    "title" => "Fleur's Secret",
    "extract" => "Another full-length, self-funded feature film which is a drama set in a contemporary NZ farming community. (Released Jan&nbsp;'19)",
    "text" => [
        "Fleur&#39;s Secret is set in a small farming community on the North Island of New Zealand. Helen flees her drunkard husband in Sydney, taking her daughter, Fleur, to stay with her on Grandpa's farm. 13 year old Fleur is blackmailed, while there, for a dreadful lie that she told. This film deals with the problems that alcohol can cause a family.",
        "Fleur&#39;s Secret has been released to international film festivals, Jan. &#39;19.",
        "Rose Goldthorp wrote this screenplay at 16 years old, and did 3 revisions at 17 (working with a script consultant). Rose then &#39;PM&#39;ed and directed Fleur's Secret at 19 years old.",
        "2019: 2 sets of laurels have been awarded at international film festivals for Fleur&#39;s Secret."
    ],
    "dia" => ["text" => "See the Director in Action", "code" => "https://player.vimeo.com/video/252835658"],
    "links" => [
        ["text" => "See the screenplay", "code" => "/secureFilmDetails/Fleurs-Secret/Fleur's-Secret-screenplay.pdf"],
        ["text" => "See the trailer", "code" => "https://vimeo.com/rosegoldthorp/fleurssecretreleasetrailer"],
        ["text" => "See the Press Kit", "code" => "/filmDetails/Fleurs-Secret/press-kit"]
    ]
];

function makeFilmEntry($title, $extract)
{
    return <<< ENTRYDONE
<div class="card" >
    <div class="card-body">
        <div class="row">
            <div class="col-md-2 d-flex flex-row justify-content-center align-items-center">
                <a href="/film/A-Rock-Musical" title="More details about $title">
                    <img alt="$title" class="img-fluid" src="/ass/WorkingCogs.gif">
                </a>
            </div>
            <div class="col">
                <h3 class="text-center">
                    <a href="about/film/A-Rock-Musical" title="More details about $title">$title</a>
                </h3>
                <p>$extract</p>
            </div>
        </div>
    </div>
</div>
ENTRYDONE;
}

function makeFilmList($data)
{
    $len = sizeof($data);
    $html = "";

    for ($i = 0; $i < $len; $i++) $html .= makeFilmEntry($data[$i]["title"], $data[$i]["extract"]);

    return $html;
}

?>
<h1>About Me</h1>

<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" id="marketer-tab" data-toggle="tab" href="#marketer" role="tab" aria-controls="home"
           aria-selected="true">Marketer</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="filmmaker-tab" data-toggle="tab" href="#filmmaker" role="tab" aria-controls="profile"
           aria-selected="false">Film Maker</a>
    </li>
</ul>
<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="marketer" role="tabpanel" aria-labelledby="marketer-tab">
        <p>I have a degree in Communications with Film & Tv and 1 year of marketing and one year of a Marketing
            Foundation
            course. I also have a 'A'&nbsp;level (equivalent) in Media Studies.
        </p>
        <p>Below, you can see the front page of my transmedia web site
            <a href="https://the-greenlands.com/" target="_blank" title="Go to The Greenlands">"The Greenlands"</a>.
            On
            a regular basis, I contribute blogs, and images, as well as videos to this site. The site is primarily,
            to
            promote
            my upcoming six comic fantasy feature films.
        </p>
        <figure>
            <img src="/chapters/about/the-greenlands.JPG" class="img-fluid img-thumbnail"
                 alt="Screen grab of the-greenlands.com">
            <figcaption>My Transmedia Website
                <a href="https://the-greenlands.com/" target="_blank"
                   title="Go to The Greenlands">"The Greenlands"</a></figcaption>
        </figure>
    </div>
    <div class="tab-pane fade" id="filmmaker" role="tabpanel" aria-labelledby="filmmaker-tab">
        <h2>On Release</h2>
        <?= makeFilmList($filmData); ?>
        <h2>Comming Soon</h2>
    </div>
</div>



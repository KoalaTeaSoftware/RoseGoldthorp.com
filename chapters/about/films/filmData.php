<?php
$filmData[] = [
    "title" => "The Rocky Road To Freedom",
    "extract" => "Rose's fourth feature, shot in Jan. 2019, will be released to festivals in 2020. Gabriel is a rather shy clerk who becomes besotted with Mai, a young musician who is, unbeknown to him, also a prostitute. Gabriel, with his best friend Tom, forms a rock band, 'The Rocky Road', in order to attract Mai's attention. Things get complicated.",
    "text" => [
        "So that he can get to know her, a disillusioned young clerk tries for rockstardom.",
        "This is Rose's fourth, micro-budget, feature film. It is a musical feature. Main photography was Jan. 2019.",
        "Rose Goldthorp who wrote this in 2018 at 19 years old, shot it at 20 yrs old, graduated from Auckland University and then moved to London, where she is waiting for her post-prod. team to finish their work. "
    ],
    "dia" => "https://player.vimeo.com/video/320412004",
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
    "dia" => "https://player.vimeo.com/video/252835658",
    "links" => [
        ["text" => "See the screenplay", "code" => "/secureFilmDetails/Fleurs-Secret/Fleur's-Secret-screenplay.pdf"],
        ["text" => "See the trailer", "code" => "https://vimeo.com/rosegoldthorp/fleurssecretreleasetrailer"],
        ["text" => "See the Press Kit", "code" => "/filmDetails/Fleurs-Secret/press-kit"]
    ]
];

function filmNameToUrl($given)
{
    $url = str_replace("'", "", $given);
    $url = str_replace(" ", "-", $url);
    $url = strtolower($url);
    return $url;
}

function findByNiceName($inList, $subSectionName)
{
    error_log("looking for the film :" . $subSectionName . ":");
    $len = sizeof($inList);
    for ($i = 0; $i < $len; $i++) {
        $testElement = $inList[$i];
//        error_log("Reviewing film :" . $i . ": in the list " . print_r($inList,true));
        if (filmNameToUrl($testElement["title"]) === $subSectionName) return $testElement;
    }
    return null;
}

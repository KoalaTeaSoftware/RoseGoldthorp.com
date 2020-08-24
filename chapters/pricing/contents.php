<?php
$data[] = ["text" => "A blog entry loaded on a web site and social media each week for a year", "price" => "12,000 for the year"];
$data[] = ["text" => "A video created and loaded on a website and social media",
    "price" => "2,500 each<br>&pound;&nbsp;24,000 weekly for the year"];
$data[] = ["text" => "Build a website with SEO and weekly blog created and loaded on a website and social media",
    "price" => "24,000for the year<br>(plus hosting fees)"];
$data[] = ["text" => "A social media campaign", "price" => "9,000 for a 3 month campaign<br>&pound;&nbsp;30,000 annually for an ongoing campaign"];
$data[] = ["text" => "A website with weekly blog, marketing video and social media posting", "price" => "5,000"];
$data[] = ["text" => "Full package<ul>
<li>Website build and management</li>
    <li>3-month campaign</li>
    <li>Monthly video</li>
    <li>Weekly blog</li>
    <li>Daily social posting</li>
</ul>",
    "price" => "86,300 for the year"];


function drawAPackage($number, $text, $price)
{
    return <<<PACKAGE
<div class="col-md col-sm-6 col-xs-12 pricingPackage">
    <div class="card text-center">
        <div class="card-header">
            Package $number
        </div>
        <div class="card-body">
            <p class="card-text">$text.</p>
            <a href="#" class="btn btn-primary">Get Details</a>
        </div>
        <div class="card-footer text-muted">
            From &pound;&nbsp;$price <br>(depending on your needs).
        </div>
    </div>
</div>
PACKAGE;
}

function drawAllPackages($data)
{
    $htmlBlock = "";
    for ($i = 0; $i < sizeof($data); $i++) {
        $htmlBlock .= drawAPackage($i + 1, $data[$i]["text"], $data[$i]["price"]);
    }
    return $htmlBlock;
}

?>

<h2>Pricing</h2>
<p>We offer the following packages, for your guidance, but all can be customised to suit your needs.</p>
<div class="row">
    <?= drawAllPackages($data) ?>
</div>

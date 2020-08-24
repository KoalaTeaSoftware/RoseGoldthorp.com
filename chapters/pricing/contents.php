<?php
$data[] = ["text" => "A weekly blog entry loaded on a web site and social media, each week for a year", "price" => "4,950 for the year"];
$data[] = ["text" => "A video created and loaded on a website and social media",
    "price" => "2,500 for a single video<br>&pound;&nbsp;27,000 for monthly posts for a year"];
$data[] = ["text" => "Build a website with SEO and weekly blog created and posted on that website and social media",
    "price" => "6,500 for the year<br>(plus hosting fees)"];
$data[] = ["text" => "Build a website with SEO and weekly blog and monthly video created and posted on that website and social media",
    "price" => "32,000 for the year<br>(plus hosting fees)"];
$data[] = ["text" => "A social media campaign", "price" => "6,950 for a 1&nbsp;month campaign<br>&pound;&nbsp;17,950 for a 3&nbsp;month campaign"];
$data[] = ["text" => "Full package<ul>
<li>Website build and management</li>
    <li>3-month campaign</li>
    <li>Monthly video</li>
    <li>Weekly blog</li>
    <li>Daily social posting</li>
</ul>",
    "price" => "49,000 for the year<br>(plus hosting fees)"];

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
            <a href="#" class="btn btn-primary brandedButton">Get Details</a>
        </div>
        <div class="card-footer text-muted">
            From &pound;&nbsp;$price <br><small>(depending on your needs)</small>
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
<h1>Pricing</h1>
<h2>Customised</h2>
<p>All packages can be customised to suit your own circumstances, or we can discuss your business and offer a completely
    customised approach.
</p>
<h2>Packages</h2>
<p>We offer the following packages, for your guidance, but all can be customised to suit your needs.</p>
<div class="row">
    <?= drawAllPackages($data) ?>
</div>

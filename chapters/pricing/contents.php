<?php
require_once "chapters/pricing/data.php";

function drawAPackage($number, $text, $price)
{
    return <<<PACKAGE
<div class="col-sm-6 col-md-4 col-lg pricingPackage">
    <div class="card text-center">
        <div class="card-header">
            Package $number
        </div>
        <div class="card-body">
            <p class="card-text">$text.</p>
            <a href="/contact" class="btn btn-primary brandedButton">Get Details</a>
        </div>
        <div class="card-footer text-muted">
            From $price <br><small>(depending on your needs)</small>
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
<p>We can of course discuss your business and offer a completely customised approach, instead of these packages.
    Provision of affiliate facilities are customised arrangements.
</p>
<h2>Packages</h2>
<p>We offer the following packages, for your guidance.</p>
<div class="row">
    <?= drawAllPackages($data) ?>
</div>

<?
$xml = simplexml_load_file('https://rosegoldthorp.wordpress.com/blog/feed/');
header("Expires: Wed 23 Dec 1980 00:01:00 GMT");
header("Last-Modifed: " . gmdate("D, d M Y H:i:s" . " GMT"));
header("Xache-Contrl: no-cache, must-revalidate");
header("Pragma: no-cache");
header("Content-Type: text/html");
?>
<!-- h4>
  <a href="<?= $xml->channel->link ?>" target="_blank"><?= $xml->channel->title ?></a>
</h4 -->
<?
//https://rosegoldthorp.files.wordpress.com/2017/06/cropped-untitled-design-11.png
$count = 0;
$pat = '/\> *Continue/i';
$new = 'target="_blank"> Continue';
foreach ($xml->channel->item as $item) {
    $str = preg_replace($pat, $new, $item->description->__toString());

    echo('<h5><a href="' . $item->link . '">' . $item->title . "</a></h5>\n");
    echo("<p>" . $str . "</p>\n");
    $count += 1;
    if ($count == 1) break;
}
?>

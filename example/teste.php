<?php
//error_reporting(E_ERROR | E_PARSE);
libxml_use_internal_errors(true);

$url = "https://secure.tibia.com/community/?subtopic=worlds";

$dom = new \DOMDocument('1.0', 'ISO-8859-1');
$dom->loadHTMLFile($url, LIBXML_NOBLANKS);
$dom->preserveWhiteSpace = false;

$tblRows = $dom->getElementById('worlds')
    ->getElementsByTagName('table')->item(3);

echo "tagName: " . $tblRows->tagName . PHP_EOL;
echo "class: " . $tblRows->getAttribute('class') . PHP_EOL;
echo "childs: " . $tblRows->childNodes->length . PHP_EOL;
//exit;

foreach ($tblRows->childNodes as $row) {
    foreach ($row->childNodes as $td) {
        echo $td->nodeValue . "\t";
    }
    echo PHP_EOL;
}

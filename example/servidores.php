<?php
//error_reporting(E_ERROR | E_PARSE);
libxml_use_internal_errors(true);

$url = "https://secure.tibia.com/community/?subtopic=worlds";

$dom = new \DOMDocument('1.0', 'ISO-8859-1');
$dom->loadHTMLFile($url, LIBXML_NOBLANKS);
$dom->preserveWhiteSpace = false;

$tblRows = $dom->getElementById('worlds')
    ->getElementsByTagName('table')->item(3);

foreach ($tblRows->childNodes as $row) {
    foreach ($row->childNodes as $td) {
        echo $td->textContent. "\t";
    }
    echo PHP_EOL;
}

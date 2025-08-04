<?php 
include_once "theme-module.anchor.php";   
$e = new website_theme(); 
echo $e->construct_header(); 
echo $e->preview_theme(); 

/* 
$dom = new DOMDocument();
libxml_use_internal_errors(true); // Suppress warnings for invalid HTML
$dom->loadHTML($html);
libxml_clear_errors();

$xpath = new DOMXPath($dom);
$elements = $xpath->query("//h1"); // Example: get all <h1> tags

foreach ($elements as $element) {
    echo $element->nodeValue; // Output the text of <h1>
}
    */
?>
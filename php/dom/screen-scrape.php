<?php

/**
 * File            screen-scrape.php
 * Created        5/18/12 4:04 PM
 * Author        Matt Thomas matt@betweenbrain.com
 * Copyright    Copyright (C) 2012 betweenbrain llc.
 */
 
// Set up xpath goodness
$doc = new DOMDocument;

// Fetch remote HTML file - use @doc to suppress errors
@$doc->loadHTMLFile("http://www.sbe.org/sections/CCE_List.php");

$xpath = new DOMXPath($doc);

$nodes = $xpath->evaluate("//h2 | //p ");

foreach ($nodes as $node) {

	if ($nodes->length) {
		$node->removeAttribute('style');
		$node = $doc->saveXML($node);

		$node = strip_tags($node,'<h2><p><br>');

		// Replace comma with ","
		//$node = preg_replace("/,/", "&quot;,&quot;", $node);

		// Capture and separate state and zip codes
		$node = preg_replace("/(\d{5})/", "&quot;,&quot;$1", $node);

		$node = preg_replace("/(,\s)([A-Z]{2})/", "&quot;,&quot;$2", $node);

		// Replace <br> tag with ","
		$node = preg_replace("[\<br\s*/?\>]", "&quot;,&quot;", $node);

		// Replace opening <h2> tag with "," and carriage return
		$node = preg_replace("[\<h2\s*/?\>]", "\r\n&quot;,&quot;", $node);

		// Replace opening <p> tag with ","
		$node = preg_replace("[\<p\s*/?\>]", "&quot;,&quot;", $node);

		// Remove closing </p> tag
		$node = preg_replace("[\<\/p\s*/?\>]", "", $node);

		$node = strip_tags($node);

		echo $node;
	}
}
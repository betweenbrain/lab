<?php
/**
 * File            parse-inner-html-attrib-match.php
 * Created        5/17/12 1:17 PM
 * Author        Matt Thomas matt@betweenbrain.com
 * Copyright    Copyright (C) 2012 betweenbrain llc.
 */

// Set up xpath goodness
$doc = new DOMDocument;

// Fetch remote HTML file - use @doc to suppress errors or libxml_use_internal_errors(true);
// $doc->loadHTMLFile("http://betweenbrain.com/notes/");

// Parse HTML from a variable (i.e. buffer) - $doc->loadXML is less forgiving of malformed markup
// $doc->loadHTML

$doc->loadHTMLFile('test.html');
$xpath = new DOMXPath($doc);

$target = 'foo';
$replacement = '<i class="bar">bar</i>';

$query = $xpath->evaluate("//*[contains(.,'" . trim($target) . "')]");

// Number of matched nodes - http://ca.php.net/manual/en/class.domnodelist.php
echo '<h4>Counted ' . $query->length . ' nodes</h4>';

$i = '';

foreach ($query as $match) {
	$i++;

	// String representation of a DOMElement - preserve HTML
	// echo $doc->saveXML($match). '<br/>';
	$match = $doc->saveXML($match);

	// Only act on last match

	if ($i < $query->length) {
		continue;
	} elseif (preg_match('/class=\"bar\"/', $match)){
		echo 'Matched class bar';
		continue;
	} else {

		echo '<h5>Node: ' . $i . '</h5>';

		// Text string of match
		// echo 'Node Value: ' . $match->nodeValue . '<br/>';

		if (preg_match("/(title)=\"(.*?)($target)(.*?)\"/", $match, $attributes)) {
			// What did we find?
			echo "Matched attributes: ".$attributes[0].'<br/>';
			// Explode match on title attribute
			$matches = explode($attributes[0], $match);
			// What's left?
			echo 'Splinter: '.$matches[1].'<br/>';
			// Replace only matches after great than symbol
			// <[^>]+> matches an opening HTML tag, and only that.
			// \s* captures any whitespace (equivalent to [ \t\r\n]*)
			// <\/[^>]+> matches a closing HTML tag
			$match = preg_replace("/(<[^>]+>)(.*?)($target)/i", "$1$2$replacement", $match);

		} else {
		// Regex to find and replace a pure text match
		$match = preg_replace("/($target)/", $replacement, $match);
		}
	}
	echo $match.'<br/>';
}

// Print the page
//echo $doc->saveHTML();

<?php
/**
 * File            parse-inner-html-attrib-match.php
 * Created        5/17/12 1:17 PM
 * Author        Matt Thomas matt@betweenbrain.com
 * Copyright    Copyright (C) 2012 betweenbrain llc.
 */

// Set up xpath goodness
$doc = new DOMDocument;
// Fetch remote HTML file
// use @doc to suppress errors
// $doc->loadHTMLFile("http://betweenbrain.com/notes/");

// Fetch local html
$html = '
<ul>
	<li>
		<a href="test" title="test">foo</a>
		bar
	</li>
	<li>
		<a href="test" title="test">foo</a>
		bar
	</li>
	<li>
		<a href="test" title="test">foo</a>
		bar
		<ul>
			<li>
				<a href="test" title="test">foo</a>
				bar
			</li>
			<li>
				<a href="test" title="test">foo</a>
				bar
			</li>
			<li>
				<a href="test" title="test foo baz">foo bar baz</a>
				bar
			</li>
		</ul>
	</li>
</ul>
';

$doc->loadHTML($html);
$xpath = new DOMXPath($doc);

$target = 'foo';
$replacement = '<i>bar</i>';

$query = $xpath->evaluate("//*[contains(.,'" . trim($target) . "')]");

// Number of matched nodes - http://ca.php.net/manual/en/class.domnodelist.php
echo '<h4>Counted ' . $query->length . ' nodes</h4>';

$i = '';

foreach ($query as $match) {
	$i++;
    echo '<h5>Node: ' . $i . '</h5>';

	// Only act on last match
	if ($i < $query->length) {
		continue;
	}

	// String representation of a DOMElement - preserve HTML
	// echo $doc->saveXML($match). '<br/>';
	$match = $doc->saveXML($match);

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
		$match = preg_replace("/(>.*?)($target)(.*?)/i", "$1$replacement$3", $match);
		// $match = preg_replace("/(>[^a-zA-Z0-9 ])($target)([^a-zA-Z0-9 ])/i", "$1$replacement$3", $match);

	} else {
	// Change contents of match
	$match = preg_replace("/($target)/", $replacement, $match);
	}

	echo '<pre>'.$match.'</pre>';
}


// Print the page
// echo $doc->saveHTML();

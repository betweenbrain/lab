<?php

/**
 * File            preg-matchall.php
 * Created        5/22/12 1:33 PM
 * Author        Matt Thomas matt@betweenbrain.com
 * Copyright    Copyright (C) 2012 betweenbrain llc.
 */
 
$html = '<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<ul>
	<li>
		<a href="test" title="test foo" class="bar level-1">foo</a>
		bar
	</li>
	<li>
		<a href="test" title="test" class="bar level-1">foo</a>
		bar
	</li>
	<li>
		<a href="test" title="test" class="bar level-1">test foo bar 1</a>
		bar
		<ul>
			<li>
				<a href="test" title="test" class="bar level-2">foo</a>
				bar
			</li>
			<li>
				<a href="test" title="test" class="bar" class="bar level-2">foo</a>
				bar
			</li>
			<li>
				<a href="test" title="test foo bar" class="bar level-2">test foo bar 2</a>
				bar
					<ul>
						<li>
							<a href="test" title="test" class="bar level-3">foo</a>
							bar
						</li>
						<li>
							<a href="test" title="test" class="bar" class="bar level-3">foo</a>
							bar
						</li>
						<li>
							<a href="test" title="test foo bar" class="bar level-3">test foo bar 3</a>
							bar
						</li>
					</ul>
			</li>
		</ul>
	</li>
</ul>
</body>
</html>';

preg_match_all("|<[^>]+>((.+?)[ foo]+)</[^>]+>|U",$html,$matches, PREG_PATTERN_ORDER);

foreach($matches as $key => $value) {
	echo 'Key: ' . $key."\n";
	foreach ($value as $match) {
		echo 'Match: '.$match."\n";

	}

}
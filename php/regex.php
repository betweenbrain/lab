<?php

/**
 * File            regex.php
 * Created        5/25/12 2:53 PM
 * Author        Matt Thomas matt@betweenbrain.com
 * Copyright    Copyright (C) 2012 betweenbrain llc.
 */

$html = '<!DOCTYPE html>
<html>
<head>
	<title>foo</title>
</head>
<body>
<ul>
	<li>
		<a href="test" title="test foo" class="bar level-1">foo</a>
	</li>
	<li>
		<a href="test" title="test" class="bar level-1">foo</a>
	</li>
	<li>
		<a href="test" title="test" class="bar level-1">test foo bar 1</a>
		<ul>
			<li>
				<a href="test" title="test" class="bar level-2">foo</a>
			</li>
			<li>
				<a href="test" title="test" class="bar" class="bar level-2">foo</a>
			</li>
			<li>
				<a href="test" title="test foo bar" class="bar level-2">test foo bar 2</a>
					<ul>
						<li>
							<a href="test" title="test" class="bar level-3">foo</a>
						</li>
						<li>
							<a href="test" title="test" class="bar" class="bar level-3">foo</a>
						</li>
						<li>
							<a href="test" title="test foo bar" class="bar level-3">test <span>foo</span> bar 3</a>
						</li>
					</ul>
			</li>
		</ul>
	</li>
</ul>
</body>
</html>';

$target = 'foo';
$replacement = '<span style="color:red;">'.$target.'</span> ';
echo (preg_replace("/(<[^>]+[^head]+>)($target)/","$1$replacement",$html));

// '/(<[^>]+>[A_Za-z ]*)('.$target.')([A_Za-z ]*)/'

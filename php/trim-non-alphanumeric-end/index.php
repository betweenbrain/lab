<?php

/**
 * File       index.php
 * Created    7/25/13 4:04 PM
 * Author     Matt Thomas | matt@betweenbrain.com | http://betweenbrain.com
 * Support    https://github.com/betweenbrain/
 * Copyright  Copyright (C) 2013 betweenbrain llc. All Rights Reserved.
 * License    GNU GPL v3 or later
 */

$string = "Mary had a little lamb b :#$";
$length = strlen($string);
$regex  = "/[^a-z0-9]/i";

for ($i = 1; $i <= $length; $i++) {
	if (preg_match($regex, substr($string, $length - 1, 1))) {
		$string = substr($string, 0, $length -1 );
		--$length;
	} else {
		break;
	}
}

echo "<p>Looped $i times. Result: " . $string . "</p>";


$string = preg_replace('/[^a-z0-9]+$/i', '', $string);

echo "<p>Result 2: " . $string . "</p>";


if (strlen($string) >= 22) {
	$string = substr($string, 0, 23);
	$string = preg_replace('/[^a-z0-9\s]+$/i', '', $string);
	$string = preg_replace('/[^\s]+$/i', '', $string);
	$string = substr($string, 0, strlen($string) -1 );
}

echo "<p>Result 3: " . $string . "</p>";
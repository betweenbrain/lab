<?php

/**
 * File       index.php
 * Created    6/19/12 3:47 PM
 * Author     Matt Thomas matt@betweenbrain.com
 * Copyright  Copyright (C) 2012 betweenbrain llc.
 */
 
	foreach($_COOKIE as $key => $value) {
		echo 'Key: ' . $key . ' Value: ' . $value . '<br/>';
	};

	print_r($_COOKIE);

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<a href="index2.php">Set The Cookies!</a>
</body>
</html>

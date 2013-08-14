<?php

/**
 * File       destroy.php
 * Created    5/17/13 10:15 AM 
 * Author     Matt Thomas | matt@betweenbrain.com | http://betweenbrain.com
 * Support    https://github.com/betweenbrain/
 * Copyright  Copyright (C) 2013 betweenbrain llc. All Rights Reserved.
 * License    GNU GPL v3 or later
 */

session_start();

session_destroy();

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
</head>
<body>
<p>Session destroyed! Check it now.</p>
<a href="display.php">Display Session</a>
</body>
</html>
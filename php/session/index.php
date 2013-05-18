<?php

/**
 * File       index.php
 * Created    5/17/13 10:08 AM
 * Author     Matt Thomas | matt@betweenbrain.com | http://betweenbrain.com
 * Support    https://github.com/betweenbrain/
 * Copyright  Copyright (C) 2013 betweenbrain llc. All Rights Reserved.
 * License    GNU GPL v3 or later
 */

session_start();

/*
 * Create $_SESSION['time'] as array
 * Using isset to not throw an error
 */

if (!isset($_SESSION['time'])) {
	$_SESSION['time'] = array();
}
/*
 * Populate $_SESSION['time'] only with new $_POST['time'] data
 * Using isset check to avoid throwing an error if the array exists but empty
 */
if (isset($_POST['time']) && !in_array($_POST['time'], $_SESSION['time'])) {
	$_SESSION['time'][] = $_POST['time'];
}

/*
 * Check for existence and display state and contents
 */
if ($_SESSION['time']) {
	echo 'Session Array: <pre>' . print_r($_SESSION, TRUE) . '</pre>';
} else {
	echo '<p>No time set!</p>';
}

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
	<script>
		(function ($) {
			$().ready(function () {
				$.ajax({
					type   : "POST",
					data   : "time=" + <?php echo time() ?>,
					success: function () {
						$(".status").append('<p>Yep</p>');
					},
					error  : function () {
						$(".status").append('<p>Nope</p>');
					}
				});
			});
		})(jQuery)

	</script>
</head>
<body>
<a href="display.php">Display Session Variable</a>
<p class="status"></p>
</body>
</html>
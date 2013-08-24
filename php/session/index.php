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
 * Populate $_SESSION['time'] only with new $_GET['time'] data
 * Using isset check to avoid throwing an error if the array exists but empty
 */
if (isset($_GET['time']) && !in_array($_GET['time'], $_SESSION['time'])) {
	$_SESSION['time'][] = $_GET['time'];
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
			// TODO: should start using .on instead of .live
			$('.submit').live('click', function (e) {
				$.ajax({
					data   : {time: "<?php echo time() ?>"},
					success: function (data) {
						$(".status").empty();
						$(".status").append(data);
					},
					error  : function () {
						$(".status").append('<p>Nope</p>');
					}
				});
				e.preventDefault();

				/*
				 $.get("index.php",{time: "
				<?php echo time() ?>"});
				 */

			});
		})(jQuery)

	</script>
</head>
<body>
<a href="display.php">Display Session Variable</a>
<input type="button" class="submit" value="Submit" />
<p class="status"></p>
</body>
</html>
<?php

/**
 * File       index2.php
 * Created    5/17/13 10:11 AM
 * Author     Matt Thomas | matt@betweenbrain.com | http://betweenbrain.com
 * Support    https://github.com/betweenbrain/
 * Copyright  Copyright (C) 2013 betweenbrain llc. All Rights Reserved.
 * License    GNU GPL v3 or later
 */

session_start();

if (isset($_SESSION['time'])) {
	echo '<pre>' . print_r($_SESSION['time'], TRUE) . '</pre>';
} else {
	echo '<p>No time set!</p>';
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	</head>
<body>
<a href="destroy.php">Destroy Session</a>
<a href="index.php?time=<?php echo time() ?>">Set Session</a>
<p class="cart">

</p>
</body>
</html>
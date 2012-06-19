<?php defined('_WL') or die;

/**
 * File     output.html.php
 * Created  6/18/12 9:45 PM
 * Author   Matt Thomas matt@betweenbrain.com
 * Copyright    Copyright (C) 2012 betweenbrain llc.
 */

?>
<!DOCTYPE html>
<html>
<head>
	<title><?php
		if ($state) {
			echo $state;
		} else {
			echo $appname;
		} ?></title>
</head>
<body>
<p>
	<?php echo $output ?>
</p>
</body>
</html>

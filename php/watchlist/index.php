<?php

/**
 * File         index.php
 * Created      6/18/12 9:43 PM
 * Author       Matt Thomas matt@betweenbrain.com
 * Copyright    Copyright (C) 2012 betweenbrain llc.
 */

	// Define global check to prevent direct access to files
	define('_WL', 1);

	// Define root constant for later use
	define('__ROOT__', dirname(__FILE__));

	// Require configuration file
	require_once(__ROOT__ . '/config.php');

	// Require database connection
	require_once(__ROOT__ . '/connection.php');

	// Some magic security hokum
	if (get_magic_quotes_gpc()) {
		$process = array(&$_GET, &$_POST, &$_COOKIE, &$_REQUEST);
		while (list($key, $val) = each($process)) {
			foreach ($val as $k => $v) {
				unset($process[$key][$k]);
				if (is_array($v)) {
					$process[$key][stripslashes($k)] = $v;
					$process[]                       = &$process[$key][stripslashes($k)];
				} else {
					$process[$key][stripslashes($k)] = stripslashes($v);
				}
			}
		}
		unset($process);
	}

	// Select all records
	try {
		$sql     = 'SELECT * FROM ' . $dbtable;
		$results = $pdo->query($sql);
	} catch (PDOException $e) {
		$state  = 'Error';
		$output = 'Error fetching records: ' . $e->getMessage();
		include 'output.html.php';
		exit();
	}

	// Check for form submission and text having content
	if (isset($_POST['text']) && $_POST['text'] != '') {
		try {
			// :text is a placeholder for preparing our data
			$sql = 'INSERT INTO ' . $dbtable . ' SET
			text = :text,
			date = CURDATE()';
			// Prepare data
			$s   = $pdo->prepare($sql);
			// Bind submitted data to placeholder
			$s->bindValue(':text', $_POST['text']);
			$s->execute();
		} catch (PDOException $e) {
			$state  = 'Error';
			$output = 'Error fetching records: ' . $e->getMessage();
			include 'output.html.php';
			exit();
		}
		// Redirect to remove the query string
		header('Location: .');
		exit();
	}

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
	<?php if ($debug) : ?>
	<p>
		<?php echo 'Records successfully fetched.' ?>
	</p>
	<?php endif ?>
	<table>
		<tbody>
			<tr>
				<th>ID</th>
				<th>Text</th>
				<th>Date</th>
			</tr>
			<?php foreach ($results as $result) : ?>
			<tr>
				<?php
				// Seriously, don't forget to escape the output
				$row  = '<td>' . htmlspecialchars($result['id']) . '</td>';
				$row .= '<td>' . htmlspecialchars($result['text']) . '</td>';
				$row .= '<td>' . htmlspecialchars($result['date']) . '</td>';
				echo $row;
				?>
			</tr>
			<?php endforeach ?>
		</tbody>
	</table>
	<form action="?" method="post">
		<label for="text">Type text here:
			<textarea id="text" name="text" rows="1" cols="40"></textarea>
		</label>
		<input type="submit" value="Add">
	</form>
</body>
</html>
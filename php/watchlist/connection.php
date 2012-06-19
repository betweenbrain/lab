<?php defined('_WL') or die;

/**
 * File     connection.php
 * Created  6/18/12 9:46 PM
 * Author   Matt Thomas matt@betweenbrain.com
 * Copyright    Copyright (C) 2012 betweenbrain llc.
 */

// Attempt database connection
try {
	$pdo = new PDO("mysql:host=localhost;dbname=$dbname", "$dbuser", "$dbpass");
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$pdo->exec('SET NAMES "utf8"');

	if ($debug) {
		$output = 'Database connection established.';
		include 'output.html.php';
	}

// Display an error if database connection fails
} catch (PDOException $e) {
	$state  = 'Error';
	$output = 'Database connection error: ' . $e;
	include 'output.html.php';
	exit();
}

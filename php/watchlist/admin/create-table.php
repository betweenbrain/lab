<?php defined('_WL') or die;
/**
 * File       create-table.php
 * Created    6/18/12 9:46 PM
 * Author     Matt Thomas matt@betweenbrain.com
 * Copyright  Copyright (C) 2012 betweenbrain llc.
 */

//TODO: Make this work
require_once '../config.php';
require_once '../connection.php';

// Create table
try {
	$sql = 'CREATE TABLE IF NOT EXISTS test (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    text TEXT,
    date DATE NOT NULL
    ) DEFAULT CHARACTER SET utf8 ENGINE=InnoDB';
	$pdo->exec($sql);
} catch (PDOException $e) {
	$output = 'Error creating test table: ' . $e->getMessage();
	include '../output.html.php';
	exit();
}
$output = 'Test table successfully created or already exists.';
include '../output.html.php';


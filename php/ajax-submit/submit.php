<?php

/**
 * File       submit.php
 * Created    5/20/13 9:26 AM
 * Author     Matt Thomas | matt@betweenbrain.com | http://betweenbrain.com
 * Support    https://github.com/betweenbrain/
 * Copyright  Copyright (C) 2013 betweenbrain llc. All Rights Reserved.
 * License    GNU GPL v3 or later
 */

/*
 * Initialize session
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

if($_POST['option'] == "bob"){
	echo "Hello Bob!";
};

/*
 * Return info submitted
 */
echo $_POST['time'];
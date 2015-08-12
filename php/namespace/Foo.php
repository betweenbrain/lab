<?php
namespace Foo;

/**
 * File       Foo.php
 * Created    8/12/15 2:32 PM
 * Author     Matt Thomas | matt@betweenbrain.com | http://betweenbrain.com
 * Support    https://github.com/betweenbrain/
 * Copyright  Copyright (C) 2015 betweenbrain llc. All Rights Reserved.
 * License    GNU GPL v2 or later
 */

class Bar
{

	public function __construct(){

		echo __CLASS__ . '<br/>';

		$dbhost = "localhost";
		$dbuser = "root";
		$dbpass = "";
		$dbname = "foo";

		$mysql_conn_string = "mysql:host=$dbhost;dbname=$dbname";

		// Try database connection and die if it fails
		try
		{
			$db = new \PDO($mysql_conn_string, $dbuser, $dbpass);
			$db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

		} catch (PDOException $e)
		{
			die(sprintf('DB connection error: %s', $e->getMessage()));
		}

	}


	// Regular PHP code goes here, anything goes!
	function Baz()
	{
		echo 'Running from a namespace!';
	}
}
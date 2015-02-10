<?php

/**
 * File       images.php
 * Created    2/10/15 11:22 AM
 * Author     Matt Thomas | matt@betweenbrain.com | http://betweenbrain.com
 * Support    https://github.com/betweenbrain/
 * Copyright  Copyright (C) 2015 betweenbrain llc. All Rights Reserved.
 * License    GNU GPL v2 or later
 */

$base_dir  = __DIR__; // Absolute path to your installation, ex: /var/www/mywebsite
$doc_root  = preg_replace("!{$_SERVER['SCRIPT_NAME']}$!", '', $_SERVER['SCRIPT_FILENAME']); # ex: /var/www
$base_url  = preg_replace("!^{$doc_root}!", '', $base_dir); # ex: '' or '/mywebsite'
$protocol  = empty($_SERVER['HTTPS']) ? 'http' : 'https';
$port      = $_SERVER['SERVER_PORT'];
$disp_port = ($protocol == 'http' && $port == 80 || $protocol == 'https' && $port == 443) ? '' : ":$port";
$domain    = $_SERVER['SERVER_NAME'];
$full_url  = "$protocol://{$domain}{$base_url}"; # Ex: 'http://example.com', 'https://example.com/mywebsite', etc.';

$images[0]       = new stdClass;
$images[0]->src  = $full_url . '/buddha1.jpg';
$images[0]->text = 'Buddha 1';

$images[1]       = new stdClass;
$images[1]->src  = $full_url . '/buddha2.jpg';
$images[1]->text = 'Buddha 2';

$images[2]       = new stdClass;
$images[2]->src  = $full_url . '/buddha3.jpg';
$images[2]->text = 'Buddha 3';

$images[3]       = new stdClass;
$images[3]->src  = $full_url . '/buddha4.jpg';
$images[3]->text = 'Buddha 4';

$images[4]       = new stdClass;
$images[4]->src  = $full_url . '/buddha5.jpg';
$images[4]->text = 'Buddha 5';

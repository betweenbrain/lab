<?php

/**
 * File       index.php
 * Created    6/25/12 5:08 PM
 * Author     Matt Thomas matt@betweenbrain.com
 * Copyright  Copyright (C) 2012 betweenbrain llc.
 */
 
	$link    = 'https://www.googleapis.com/webfonts/v1/webfonts';
	$json    = @file_get_contents($link);
	//var_dump(json_decode($json, true));
	$data = json_decode($json,true);
	$items = $data['items'];

	foreach ($items as $item) {
	    $str = 'Font: '.$item['family'].' Subsets: ';
	    foreach ($item['variants'] as $variant) {
	      $str .= ' '.$variant.' ';
	    }
	    $str.= ' Variants: ';
	    foreach ($item['subsets'] as $subset) {
	      $str .= ' '.$subset;
	    }
	    echo $str.'<br />';
	}

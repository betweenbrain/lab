<?php

/**
 * File       index.php
 * Created    2/25/13 3:19 PM
 * Author     Matt Thomas
 * Website    http://betweenbrain.com
 * Email      matt@betweenbrain.com
 * Support    https://github.com/betweenbrain/
 * Copyright  Copyright (C) 2013 betweenbrain llc. All Rights Reserved.
 * License    GNU GPL v3 or later
 */

require 'foo.php';

$spaz = new foo();
$tic  = $spaz->bar('bob', 'sam');

echo $tic;
<?php

/**
 * File       index.php
 * Created    7/24/13 1:54 PM 
 * Author     Matt Thomas | matt@betweenbrain.com | http://betweenbrain.com
 * Support    https://github.com/betweenbrain/
 * Copyright  Copyright (C) 2013 betweenbrain llc. All Rights Reserved.
 * License    GNU GPL v3 or later
 */


for ($i = 0; $i <= 30; $i++) {
	echo '<pre>fmod('. $i .', 6) = ' . fmod($i, 6) . '</pre>';
}

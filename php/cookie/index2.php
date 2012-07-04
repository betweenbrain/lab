<?php

/**
 * File       index2.php
 * Created    6/19/12 3:47 PM
 * Author     Matt Thomas matt@betweenbrain.com
 * Copyright  Copyright (C) 2012 betweenbrain llc.
 */

$value = rand();
setcookie("TestCookie", $value, time()+(60*60*24*365));

header("Location: index.php");
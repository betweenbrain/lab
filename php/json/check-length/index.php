<?php

/**
 * File       index.php
 * Created    12/12/12 2:44 PM
 * Author     Matt Thomas
 * Website    http://betweenbrain.com
 * Email      matt@betweenbrain.com
 * Support    https://github.com/betweenbrain/
 * Copyright  Copyright (C) 2012 betweenbrain llc. All Rights Reserved.
 * License    GNU GPL v3 or later
 */

function searchTwitter() {

    // Build the search URL
    $url = 'http://search.twitter.com/search.json?q=bob';

    $curl = curl_init();

    curl_setopt_array($curl, Array(
        CURLOPT_USERAGENT      => "YetAnotherTwitterModule",
        CURLOPT_URL            => $url,
        CURLOPT_TIMEOUT        => 300,
        CURLOPT_CONNECTTIMEOUT => 60,
        CURLOPT_RETURNTRANSFER => TRUE,
        CURLOPT_SSL_VERIFYHOST => FALSE,
        CURLOPT_SSL_VERIFYPEER => FALSE,
        CURLOPT_ENCODING       => 'UTF-8'
    ));

    $json = curl_exec($curl);
    $data = json_decode($json, TRUE);

    if ($data) {

        return $json;
    }

    return FALSE;
}

$json1 = '';

$json2 = '{
        "firstname":"foo",
        "lastname":"bar",
        "birthdate": {
            "date":"2012-06-06 08:46:58",
            "timezone_type":3,
            "timezone":"Europe\/Berlin"
        }
    }';

/*
if (($data = json_decode($json2, TRUE)) && isset($data)) {

    echo var_dump($data);

} else {
    echo 'No data!';
}
*/
//if (($json = $this->searchTwitter()) && ($data = json_decode($json, TRUE)) && isset($data)) {

$data = searchTwitter();

if ($data) {
    return var_dump($data);
} else {
    echo 'no length';
}



/*
if ($json) {
    echo var_dump($json);
} else {
    echo 'no length';
}
*/
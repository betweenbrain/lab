<?php

/**
 * File       index.php
 * Created    1/29/14 4:18 PM
 * Author     Matt Thomas | matt@betweenbrain.com | http://betweenbrain.com
 * Support    https://github.com/betweenbrain/
 * Copyright  Copyright (C) 2014 betweenbrain llc. All Rights Reserved.
 * License    GNU GPL v3 or later
 */

// Required. The OAuth 2.0 client ID for your application.
// https://cloud.google.com/console/project => APIs & auth => Credentials
// Create new client ID as web application
$api_key       = 'AIzaSyAaNdmw95WRa8Oyssm8x6LRTsfIvyOQUk4';
$client_id     = '170197625952-utg3jut54k6ld250gaqfs64bhes694jh.apps.googleusercontent.com';
$client_secret = 'MF_7s55DeL1xu6ZFfUqwxYGv';
$redirect_uri  = 'http://localhost/lab/php/google-oauth/';

$google = new gooogleOauth($client_id, $client_secret, $api_key, $redirect_uri);

// Required. A space-delimited list of scopes that identify the resources that your application could access on the user's behalf.
$scope = 'https://www.googleapis.com/auth/yt-analytics.readonly';

if (!file_exists($google->refreshToken))
{

	$parameters = array(
		'client_id'     => $client_id,
		'redirect_uri'  => $redirect_uri,
		'scope'         => $scope,
		'response_type' => 'code',
		'access_type'   => 'offline'
	);

	echo $google->renderAuthLink($parameters);

	$google->fetchTokens();
}
else
{

	$google->validateBearerToken();
}

$parameters = array(
	'ids'        => 'channel==UCiAY9AsPrNPa8T4sMP23_vg',
	'start-date' => '2012-01-01',
	'end-date'   => '2014-01-28',
	'metrics'    => 'views',
	'filters'    => 'video==rapF1YwQ3n4',
	'key'        => $api_key
);

$google->fetchYoutubeReport($parameters);

/**
 * Class gooogleOauth
 *
 *
 */
class gooogleOauth
{

	public $client_id = null;
	public $client_secret = null;
	public $api_key = null;
	public $redirect_uri = null;
	public $refreshToken = 'refresh.token';
	public $accessToken = 'access.token';

	public function __construct($client_id, $client_secret, $api_key, $redirect_uri)
	{
		$this->client_id     = $client_id;
		$this->client_secret = $client_secret;
		$this->api_key       = $api_key;
		$this->redirect_uri  = $redirect_uri;
	}

	public function fetchTokens()
	{
		if (isset($_GET['code']))
		{

			$url = 'https://accounts.google.com/o/oauth2/token';

			$parameters = array(
				'code'          => $_GET['code'],
				'client_id'     => $this->client_id,
				'client_secret' => $this->client_secret,
				'redirect_uri'  => $this->redirect_uri,
				'grant_type'    => 'authorization_code'
			);

			$query = http_build_query($parameters);

			//open connection
			$curl = curl_init();

			// Make a POST request to get bearer token
			curl_setopt_array($curl, Array(
				CURLOPT_URL            => $url,
				CURLOPT_POST           => true,
				CURLOPT_POSTFIELDS     => $query,
				CURLOPT_RETURNTRANSFER => 1
			));

			//execute post
			$response = curl_exec($curl);
			$response = json_decode($response);

			//close connection
			curl_close($curl);

			file_put_contents($this->accessToken, $response->access_token);
			file_put_contents($this->refreshToken, $response->refresh_token);
		}
	}

	public function renderAuthLink($parameters)
	{
		$url   = 'https://accounts.google.com/o/oauth2/auth?';
		$query = http_build_query($parameters);

		return '<a href="' . $url . $query . '">Get Authorization Code</a><br/><br/><br/>';
	}

	public function validateBearerToken()
	{
		if (file_exists($this->accessToken))
		{
			$fileAge = filemtime($this->accessToken);
			$now     = time();

			if ($now - $fileAge > 3600)
			{
				unlink($this->accessToken);
				$this->fetchBearerToken();
			}

			return;
		}
		$this->fetchBearerToken();
	}

	public function fetchBearerToken()
	{

		if (file_exists($this->refreshToken))
		{

			$url = 'https://accounts.google.com/o/oauth2/token';

			$parameters = array(
				'refresh_token' => file_get_contents($this->refreshToken),
				'client_id'     => $this->client_id,
				'client_secret' => $this->client_secret,
				'grant_type'    => 'refresh_token'
			);

			$query = http_build_query($parameters);

			//open connection
			$curl = curl_init();

			// Make a POST request to get bearer token
			curl_setopt_array($curl, Array(
				CURLOPT_URL            => $url,
				CURLOPT_POST           => true,
				CURLOPT_POSTFIELDS     => $query,
				CURLOPT_RETURNTRANSFER => 1
			));

			//execute post
			$response = curl_exec($curl);

			//close connection
			curl_close($curl);

			$response = json_decode($response, true);

			file_put_contents($this->accessToken, $response['access_token']);

			header('Location: ' . filter_var($this->redirect_uri, FILTER_SANITIZE_URL));
		}
	}

	public function fetchYoutubeReport($parameters)
	{
		if (file_exists($this->accessToken))
		{
			$url   = 'https://www.googleapis.com/youtube/analytics/v1/reports?';
			$query = http_build_query($parameters);
			$curl  = curl_init();

			curl_setopt_array($curl, Array(
				CURLOPT_HTTPHEADER     => array('Authorization:  Bearer ' . file_get_contents($this->accessToken)),
				CURLOPT_URL            => $url . $query,
				CURLOPT_RETURNTRANSFER => 1
			));

			$response = curl_exec($curl);
			$response = json_decode($response);

			echo '<pre>Views: ' . print_r($response->rows[0][0], true) . '</pre>';
		}
	}
}

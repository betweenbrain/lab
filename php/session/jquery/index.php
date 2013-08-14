<?php

/**
 * File       index.php
 * Created    5/17/13 10:31 AM
 * Author     Matt Thomas | matt@betweenbrain.com | http://betweenbrain.com
 * Support    https://github.com/betweenbrain/
 * Copyright  Copyright (C) 2013 betweenbrain llc. All Rights Reserved.
 * License    GNU GPL v3 or later
 */

// Initialize session
session_start();


if ( ! is_array($_SESSION['ids']))
{
    $_SESSION['ids'] = array();
}
// fill $_SESSION['ids'] only with new $_POST['session'] posted
if ( ! in_array($_POST['session'], $_SESSION['ids']))
{
    $_SESSION['ids'][] = $_POST['session'];
}

//echo '<pre>' . print_r($_SESSION, TRUE) . '</pre>';
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
	<script>
		$(function () {
			$('input.add').click(function () {
				addToAlbum($(this).parent());
			});
			$('.view').click(function () {
				$.get('index.php', function (data) {
					$('.cart').text(<?php '<pre>' . print_r($_SESSION, TRUE) . '</pre>' ?>);
					alert('<?php '<pre>' . print_r($_SESSION, TRUE) . '</pre>' ?>');
				});
			});
		});

		function addToAlbum(data) {
			var title = data.find('i:eq(0)').html(),
				imageSrc = data.find('img:eq(0)').attr('src'),
				fileName = imageSrc.substr(imageSrc.lastIndexOf("/") + 1),
				itemNumber = fileName.split('_')[0],
				tmp = itemNumber + ',' + title + ',' + imageSrc,
				item = [];
			item["number"] = itemNumber;
			item["details"] = title;
			item["src"] = imageSrc;

			$.post("session.php", function(data) {
			  alert("Data Loaded: " + data);
			});

			/*

			 var item = {};
			 item[itemNumber] = {};
			 item[itemNumber]["title"] = title;
			 item[itemNumber]["src"] = imageSrc;

			 /*
			 var item = {
			 "item": itemNumber,
			 detail: [

			 ]
			 }
			 */

			/*
			 $.ajax({
			 url    : "session.php",
			 type   : "POST",
			 data   : item,
			 success: function () {
			 $(".cart").append('<p>submitted successfully</p>');
			 },
			 error  : function () {
			 $(".cart").html('<p>there is error while submit</p>');
			 }
			 });
			 */

		}
	</script>
</head>
<body>
<ul class="artwork-list clearfix">
	<div class="artworks-row clearfix">

		<div class="artworks-item">
			<img src="http://annex.guggenheim.org/collections/media/thumbnails/2012.139.3_cu_web_1.jpg">
			<span class="artist">Bani Abidi</span>
			<a href="/new-york/collections/collection-online/artwork/31333"><i>The Boy Who Got Tired of Posing</i></a></span>
			<input type="button" class="add" value="Add to Album" />
		</div>

		<div class="artworks-item">
			<img src="http://annex.guggenheim.org/collections/media/thumbnails/2012.139.1_cu_web_1.jpg">
			<span class="artist">Bani Abidi</span>
			<a href="/new-york/collections/collection-online/artwork/31318"><i>The Ghost of Mohammed Bin Qasim</i></a>
			<input type="button" class="add" value="Add to Album" />
		</div>

		<div class="artworks-item">
			<img src="http://annex.guggenheim.org/collections/media/thumbnails/2012.139.2_cu_web_1.jpg">
			<span class="artist">Bani Abidi</span>
			<a href="/new-york/collections/collection-online/artwork/31332"><i>This Video Is a Reenactment</i></a>
			<input type="button" class="add" value="Add to Album" />
		</div>
	</div>
</ul>

<div class="cart">

</div>
<input type="button" class="view" value="See Cart" />
</body>
</html>
/**
 * File
 * Created    5/15/13 5:15 PM
 * Author     Matt Thomas | matt@betweenbrain.com | http://betweenbrain.com
 * Support    https://github.com/betweenbrain/
 * Copyright  Copyright (C) 2013 betweenbrain llc. All Rights Reserved.
 * License    GNU GPL v3 or later
 */

$(function () {
	$('input.add').click(function () {
		addToAlbum($(this).parent());
	});
});

function addToAlbum(data) {
	var title = data.find('i:eq(0)').html(),
		imageSrc = data.find('img:eq(0)').attr('src'),
		fileName = imageSrc.substr(imageSrc.lastIndexOf("/") + 1),
		itemNumber = fileName.split('_')[0],
		tmp = itemNumber + ',' + title + ',' + imageSrc;

	if ($.cookie('image_licensing')) {
		var crumbs = $.cookie('image_licensing');
		var items = crumbs + ':' + tmp;
		alert($.cookie('image_licensing'));
	} else {
		var items = tmp;
	}

	$('.cart').append('<p>' + tmp + '</p>');

	$.cookie('image_licensing', items);

	var arr = items.split(":");
	$.each(arr, function (index, item) {
		var ar = item.split(","),
			work = '<li>Item#: ' + ar[0] + ' Title: ' + ar[1] + ' Image: ' + ar[2] + '</li>';
		//$('.cart').append(work);
	});
}
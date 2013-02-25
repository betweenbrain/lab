/**
 * File
 * Created    2/25/13 11:52 AM
 * Author     Matt Thomas
 * Website    http://betweenbrain.com
 * Email      matt@betweenbrain.com
 * Support    https://github.com/betweenbrain/
 * Copyright  Copyright (C) 2013 betweenbrain llc. All Rights Reserved.
 * License    GNU GPL v3 or later
 */

(function ($) {
	$(window).bind('load', function () {
		var urlHash = window.location.href.split('#')[1]; // Get hash from URL
		$('html,body').animate({scrollTop: $("[data-scroll='" + urlHash + "']").offset().top - 117}, 750);
	});

	$().ready(function () {
		$('a').click(function () {
			var linkHash = this.href.split("#")[1];
			$('html,body').animate({scrollTop: $("[data-scroll='" + linkHash + "']").offset().top - 117}, 750);
		});
	});
}(jQuery));
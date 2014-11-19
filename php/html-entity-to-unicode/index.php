<?php

/**
 * File       index.php
 * Created    11/18/14 3:30 PM
 * Author     Matt Thomas | matt@betweenbrain.com | http://betweenbrain.com
 * Support    https://github.com/betweenbrain/
 * Copyright  Copyright (C) 2014 betweenbrain llc. All Rights Reserved.
 * License    GNU GPL v2 or later
 */

// From http://stackoverflow.com/a/7483192
// See http://stackoverflow.com/a/1412764
// See http://www.w3.org/TR/CSS2/syndata.html#escaped-characters
// See http://www.w3.org/TR/CSS2/syndata.html#strings
// http://www.levihackwith.com/how-to-include-html-entities-in-css-content-property/

/**
 * Converts the input string to hexadecimal
 *
 * @param $str
 *
 * @return string
 */

function entityToHex($str)
{
	$dec = html_entity_decode($str, ENT_QUOTES, "UTF-8");

	// Convert to UTF-16BE
	$enc = mb_convert_encoding($dec, "UTF-16BE", "UTF-8");
	$out = '';

	foreach (str_split($enc, 2) as $f)
	{
		$out .= sprintf("%04X", ord($f[0]) << 8 | ord($f[1]));
	}

	return $out;
}

/**
 * Will replace only HTML entities found within a string of text
 *
 * @param $str
 *
 * @return mixed
 */
function replaceOnlyEnt($str)
{
	return preg_replace_callback('/&[^;]+;/',
		function ($m)
		{
			return entityToHex($m[0]);
		},
		$str);
}

$entities = array(
	'&#32;',
	'&#38;',
	'&#42;',
	'&#64;',
	'&#83;',
	'&#97;',
	'&#98;',
	'&#101;',
	'&#114;',
	'&#116;',
	'&#121;',
	'&#160;',
	'&#8192;',
	'&#8193;',
	'&#8194;',
	'&#8195;',
	'&#8196;',
	'&#8197;',
	'&#8198;',
	'&#8199;',
	'&#8200;',
	'&#8201;',
	'&#8202;',
	'&#8239;',
	'&#8287;',
	'&#9724;',
	'&#61745;',
	'&#61746;',
	'&#61747;',
	'&#61748;',
	'&#61749;',
	'&#61750;',
	'&#61751;',
	'&#61752;',
	'&#61753;',
	'&#61760;',
	'&#61761;',
	'&#61762;',
	'&#61763;',
	'&#61764;',
	'&#61765;',
	'&#61766;',
	'&#61767;',
	'&#61768;',
	'&#61769;',
	'&#61776;',
	'&#61777;',
	'&#61778;',
	'&#61779;',
	'&#61782;',
	'&#61784;',
	'&#61785;',
	'&#61792;',
	'&#61793;',
	'&#61794;'
); ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
	<style type="text/css">
		body {
			margin : 1em;
		}

		th, td {
			padding-right : 1em;
		}

		th {
			text-align : center;
		}

		table {
			table-layout : fixed;
		}

		pre {
			line-height : 1em;
		}

		.center {
			text-align : center;
		}

		@font-face {
			font-family : 'goandcoregular';
			src         : url('fonts/tk-regular-webfont.eot');
			src         : url('fonts/tk-regular-webfont.eot?#iefix') format('embedded-opentype'),
			url('fonts/tk-regular-webfont.woff') format('woff'),
			url('fonts/tk-regular-webfont.ttf') format('truetype'),
			url('fonts/tk-regular-webfont.svg#webfont') format('svg');
		}

		a.goco {
			text-decoration : none;
		}

		.hide-text {
			text-indent : 100%;
			white-space : nowrap;
			overflow    : hidden;
		}

		/* Required Styles */
		.goco {
			position : relative;
		}

		.goco:before {
			font-family     : goandcoregular;
			font-style      : normal;
			font-weight     : normal;
			text-decoration : inherit;
			/* Customize Below */
			color           : #f05323;
			font-size       : 6em;
			/*position        : absolute;*/
			top             : 0;
			left            : 0;
		}

		<?php foreach ($entities as $entity) :
		 $hex = entityToHex($entity); ?>
		.goco-<?php echo $hex ?>:before {
			content : '\<?php echo $hex ?>';
		}

		<?php endforeach ?>
	</style>
</head>
<body>
<pre>
	@font-face {
		font-family : 'goandcoregular';
		src         : url('fonts/tk-regular-webfont.eot');
		src         : url('fonts/tk-regular-webfont.eot?#iefix') format('embedded-opentype'),
		url('fonts/tk-regular-webfont.woff') format('woff'),
		url('fonts/tk-regular-webfont.ttf') format('truetype'),
		url('fonts/tk-regular-webfont.svg#webfont') format('svg');
	}

	.goco {
		position   : relative;
	}

	.goco:before {
		font-family     : goandcoregular;
		font-style      : normal;
		font-weight     : normal;
		text-decoration : inherit;
		/* Customize Below */
		color           : #f05323;
		font-size       : inherit;
		/* Set absolute for fixed width */
		position        : absolute;
		top             : 0;
		left            : 0;
	}
</pre>
<table class="table table-striped table-bordered table-condensed table-hover">
	<colgroup>
		<col style="width:50px">
		<col style="width:50px">
		<col style="width:50px">
		<col style="width:275px">
	</colgroup>
	<tbody>
	<th>HTML Entity</th>
	<th>Hex Code</th>
	<th>CSS</th>
	<th>Rendered Glyph</th>
	<?php foreach ($entities as $entity) :
		$hex = entityToHex($entity);
		?>
		<tr>
			<td class="center">
				<?php echo str_replace('&', '&amp;', $entity) ?>
			</td>
			<td class="center">
				<code>
					<?php echo $hex ?>
				</code>
			</td>
			<td>
				<code>
					.goco-<?php echo $hex ?>:before {
					content : '\<?php echo $hex ?>';<br />
					}
				</code>
			</td>
			<td class="center">
				<a class="goco goco-<?php echo $hex ?>" title="Some Title">
					<p class="hide-text">Some long passage of text replaced with a glyph.</p></a>
			</td>
		</tr>
	<?php endforeach ?>
	</tbody>
</table>
<script>
	var _gaq = [["_setAccount", "UA-2493745-1"], ["_trackPageview"]];
	(function (d, t) {
		var g = d.createElement(t), s = d.getElementsByTagName(t)[0];
		g.async = 1;
		g.src = ("https:" == location.protocol ? "//ssl" : "//www") + ".google-analytics.com/ga.js";
		s.parentNode.insertBefore(g, s)
	}(document, "script"));
</script>
</body>
</html>


<?php
// create curl resource
$ch = curl_init();

// set url
curl_setopt($ch, CURLOPT_URL, "http://maps.googleapis.com/maps/api/geocode/json?address=" . urlencode($_GET['address']) . "+06791&sensor=true");

//return the transfer as a string
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

// $output contains the output string
$output = json_decode(curl_exec($ch));

// close curl resource to free up system resources
curl_close($ch);

$lat = $output->results[0]->geometry->location->lat;
$lng = $output->results[0]->geometry->location->lng;
?>
<!DOCTYPE html>
<html>
<head>
	<title>Simple Map</title>
	<meta name="viewport" content="initial-scale=1.0, user-scalable=no">
	<meta charset="utf-8">
	<style>
		html, body, #map-canvas {
			height  : 100%;
			margin  : 0px;
			padding : 0px;
		}

		form {
			position : absolute;
			z-index  : 1;
		}
	</style>
	<script src="https://maps.googleapis.com/maps/api/js?v=3&sensor=false"></script>
	<script>
		var map;
		function initialize() {
			var mapOptions = {
				zoom  : 16,
				center: new google.maps.LatLng(<?php echo $lat ?>, <?php echo $lng ?>)
			};

			map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

			var contentString = '<div id="content">' +
				'<h1>Guggenheim Museum <br/><small><small>(custom info window)</small></small></h1>' +
				'<img src="http://media.guggenheim.org/content/New_York/about_us/au_home_690h.jpg" alt="The Solomon R. Guggenheim Museum" title="View of Solomon R. Guggenheim Museum exterior">' +
				'<div id="bodyContent">' +
				'<p>An internationally renowned art museum and one of the most significant architectural icons of the 20th century, the Guggenheim Museum is at once a vital cultural center, an educational institution, and the heart of an international network of museums. Visitors can experience special exhibitions of modern and contemporary art, lectures by artists and critics, performances and film screenings, classes for teens and adults, and daily tours of the galleries led by museum educators. Founded on a collection of early modern masterpieces, the Guggenheim Museum today is an ever-growing institution devoted to the art of the 20th century and beyond.</p>' +
				'</div>' +
				'</div>';

			var infowindow = new google.maps.InfoWindow({
				content: contentString,
				class  : 'info'
			});

			var image = 'arrow.png';
			var myLatLng = new google.maps.LatLng(40.782873, -73.959588);
			var marker = new google.maps.Marker({
				position : myLatLng,
				map      : map,
				icon     : image,
				draggable: true,
				title    : "Drag me! Click Me!"
			});

			var styles = [
				{
					stylers: [
						{ hue: "#8a2b87" },
						{ saturation: -20 }
					]
				},
				{
					featureType: "road",
					elementType: "geometry",
					stylers    : [
						{ lightness: 100 },
						{ visibility: "simplified" }

					]
				},
				{
					featureType: "road",
					elementType: "labels",
					stylers    : [
						{ visibility: "on" },
						{ hue: "#ff850b" }
					]
				},
				{
					featureType: "water",
					stylers    : [
						{ visibility: "on" },
						{ hue: "#0089a1" }
					]
				},
				{
					featureType: "poi.attraction",
					stylers    : [
						{ visibility: "on" },
						{ hue: "#ff850b" },
						{ saturation: 100 },
						{ weight: 10 }
					]
				}
			];

			map.setOptions({styles: styles});

			google.maps.event.addListener(marker, 'click', function () {
				infowindow.open(map, marker);
			});
		}

		google.maps.event.addDomListener(window, 'load', initialize);

	</script>
</head>
<body>
<form action="" method="get">
	<label for="address">Enter your address</label>
	<input type="text" name="address" size="32" />
</form>
<div id="map-canvas"></div>
</body>
</html>

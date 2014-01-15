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
			padding : 0px
		}
	</style>
	<script src="https://maps.googleapis.com/maps/api/js?v=3&sensor=false"></script>
	<script>
		var map;
		function initialize() {
			var mapOptions = {
				zoom  : 16,
				center: new google.maps.LatLng(40.782873, -73.959588)
			};
			map = new google.maps.Map(document.getElementById('map-canvas'),
					mapOptions);
			var marker = new google.maps.Marker({
				position: map.getCenter(),
				map     : map,
				title   : 'Click to zoom'
			});

			google.maps.event.addListener(map, 'center_changed', function () {
				// 3 seconds after the center of the map has changed, pan back to the
				// marker.
				window.setTimeout(function () {
					map.panTo(marker.getPosition());
				}, 3000);
			});

			google.maps.event.addListener(marker, 'click', function () {
				map.setZoom(20);
				map.setCenter(marker.getPosition());
			});

			// Listens for click to call placeMarker()
			google.maps.event.addListener(map, 'click', function (event) {
				placeMarker(event.latLng);
			});
		}

		function placeMarker(location) {
			var marker = new google.maps.Marker({
				position: location,
				map     : map
			});

			map.setCenter(location);
		}

		google.maps.event.addDomListener(window, 'load', initialize);

	</script>
</head>
<body>
<div id="map-canvas"></div>
</body>
</html>


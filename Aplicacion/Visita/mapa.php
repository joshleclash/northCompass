<html>
<head>
<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyA-OLwP8KTTrkuV5PqDOQg0Pjx5iKTgdU8&sensor=true" type="text/javascript"></script>
</head>
<script>
function initialize() {
        var mapOptions = {
          center: new google.maps.LatLng(4.681583,-74.042321),
          zoom: 8,
          mapTypeId: google.maps.MapTypeId.ROADMAP 
        };
        var map = new google.maps.Map(document.getElementById("map_canvas"),
            mapOptions);
			
      }
</script>
<body onload="initialize()">
	<div id="map_canvas" style="height: 100%; width: 100%;"></div>
</body>
</html>
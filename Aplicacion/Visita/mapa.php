<html>
<head>
<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyA-OLwP8KTTrkuV5PqDOQg0Pjx5iKTgdU8&sensor=true" type="text/javascript"></script>
</head>
<script>
  var geocoder;
  var map;
  var marker;  
  var infowindow = new google.maps.InfoWindow();
function initialize() {
    geocoder = new google.maps.Geocoder();
    var latlng = new google.maps.LatLng(4.598327,-74.070511);
    var mapOptions = {
      zoom: 8,
      center: latlng,
      mapTypeId: google.maps.MapTypeId.ROADMAP
    }
    map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);
    
  }
  marker.setMap(null);
   function codeAddress(latlong) {
     if(latlong==''){
         alert("Diligencia la informacion de latitud y longitud para poder ver la ubicacion en el mapa")
         return false;
     }
     var address = latlong.split(",");
     var lat = parseFloat(address[0]);
     var lng = parseFloat(address[1]);
     var latlng = new google.maps.LatLng(lat, lng);
     geocoder.geocode( { 'latLng': latlng}, function(results, status) {
      if (status == google.maps.GeocoderStatus.OK) {
		console.log(results)
		map.setZoom(15);
        map.setCenter(results[0].geometry.location);
        var marker = new google.maps.Marker({
            map: map,
            position: results[0].geometry.location              
        });
        infowindow.setContent(results[1].formatted_address+"<br/>Referenciacion<br/>Latitud:"+results[0].geometry.location.kb+"<br/>"+
                      "Longitud:"+results[0].geometry.location.jb);
        infowindow.open(map, marker);
      } else {
        alert("Geocode was not successful for the following reason: " + status);
      }
    });
  }
</script>
<body onload="initialize()">
	<div id="map_canvas" style="height: 100%; width: 100%;"></div>
</body>
</html>
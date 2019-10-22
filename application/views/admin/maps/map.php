<div class="content">
	<div class="container-fluid">
		<div class="card card-map">
			<div class="header">
				<h4 class="title">Map</h4>
			</div>
			<div class="map">
				<div id="map"></div>
			</div>
		</div>
	</div>
</div>
<script src="https://code.responsivevoice.org/responsivevoice.js"></script>
<input onclick='responsiveVoice.speak("apa Kabar ?", "Indonesian Female");' type='button' value='🔊 Play' />
<script>
 // This example creates circles on the map, representing populations in North
      // America.

      function initMap() {
        // Create the map.
        var map = new google.maps.Map(document.getElementById('map'), {	
          zoom: 4,
		  center: {lat: -6.885279, lng: 107.613689},
          mapTypeId: 'terrain'
        });
		var bounds = new google.maps.LatLngBounds();

        // Construct the circle for each value in citymap.
        // Note: We scale the area of the circle based on the population.
        function tambahbulat(Lat, Lng) {
			var pt = new google.maps.LatLng(Lat, Lng);
	        bounds.extend(pt);
          // Add the circle for this city to the map.
          var cityCircle = new google.maps.Circle({
            strokeColor: '#FF0000',
            strokeOpacity: 0.4,
            strokeWeight: 1,
            fillColor: '#FF0000',
            fillOpacity: 0.15,
            map: map,
            center: pt,
            radius: 50
          });
		  map.fitBounds(bounds);
        }
		
		<?php
			foreach($konten as $data){
				$lat = $data['lat'];
				$lon = $data['lon'];
				echo ("tambahbulat(-6.885279, 107.613689);");                       
			}
		?>
      }

    </script>
<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC5Rk6sfwVLygiFiSK-SzkDhz_TFe28OLA&libraries=places&callback=initMap">
</script>
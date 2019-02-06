<!DOCTYPE html>
<html>

<head>
    <script src="http://maps.google.com/maps/api/js?key=AIzaSyCDgDPM1e51R6SgC3Jxcq3rSbPn0g9qoRQ&sensor=false" type="text/javascript"></script>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
    <script src="angular/ngapp.js"></script>
    <script src="js/jquery-2.1.4.js"></script>
</head>
<body style="background-image:url('hcare2.jpeg'); background-repeat:no-repeat; background-size:100% 100%;">	
	<h1 style="color:maroon;text-align:center;text-decoration: underline; "> HEALTH CARE </h1>
	
		<?php
			require("connect2.php");
			
			$array1 = array();
			$array2 = array();
			
			
			$sql = "SELECT XCOR,YCOR FROM details";
			$result = $db->query($sql);

			if ($result->num_rows > 0) {
				// output data of each row
				while($row = $result->fetch_assoc()) {
					array_push($array1,$row['XCOR']);
					array_push($array2,$row['YCOR']);					
				}
						
			//echo'<br>"X-COORDINATES":'.json_encode($array1).'<br>';					
			//echo'"Y-COORDINATES":'.json_encode($array2);				
				
			} else {
				echo "0 results";
			}
			$db->close();

		?>
		
		<p id="demo"></p>
		<p id="id5026526_data12389"></p>
		
		<h3 style="text-align:center;">Density of diseased people.</h3>

		<div id="map" style="height: 400px; width: 400px; margin:auto;"></div>	
		
		<script>
			var local = [];
			var local2 = [];			
			
			local.push(<?php echo json_encode($array1); ?>);
			
			local2.push(<?php echo json_encode($array2); ?>);
			
		//	document.getElementById("demo").innerHTML = local;
		//	document.getElementById("id5026526_data12389").innerHTML = local2;	
		
		var map = new google.maps.Map(document.getElementById('map'), {
		  zoom: 8,
		  center: new google.maps.LatLng(13.3, 79.3),
		  mapTypeId: google.maps.MapTypeId.ROADMAP
		});

		var infowindow = new google.maps.InfoWindow();

		var marker, i;

		for (i = 0; i < local[0].length; i++) { 

		  marker = new google.maps.Marker({
			position: new google.maps.LatLng(parseFloat(local[0][i]), parseFloat(local2[0][i])),
			map: map
		  });		  

		}		
		</script>			


</body>
</html>

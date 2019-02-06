<?php

include 'connect2.php';

$pid2= $_POST["pid3"];
$landmark2 = $_POST["landmark3"];
$city2= $_POST["city3"];
$xcor2 = $_POST["xcor3"];
$ycor2= $_POST["ycor3"];
$disease2 = $_POST["disease3"];

if($db->query("INSERT INTO details (PID, LANDMARK, CITY, XCOR, YCOR, DISEASE) VALUES('$pid2', '$landmark2','$city2',$xcor2,$ycor2, '$disease2')")){
	echo 'Data inserted';
	echo '<br/>';
}

header ("location:main2.html");

?>

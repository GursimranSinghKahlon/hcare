<?php
error_reporting (E_ALL ^ E_NOTICE);
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<?php


function NewUser()
{
	$user = 'id5026526_root';
$pass = '';
$db = 'login';
	$connect = mysqli_connect('localhost',$user,$pass,$db) or die("Unable to Connect");
	$Name = $_POST['drop1'];
	$bankaddress = $_POST['drop2'];
	$IISC = $_POST['drop3'];
	$name =  $_POST['drop4'];
	$mname =  $_POST['drop21'];
	$lname =  $_POST['drop22'];
    $accountno= $_POST['drop5'];
    $tarikh= $_POST['drop6'];
    $address= $_POST['drop7'];
    $acctype= $_POST['drop10'];
    $branchno= $_POST['drop11'];
    $balance= $_POST['drop13'];  
	$bradd=$_POST['drop23'];
	$age=$_POST['drop25'];
	$gender=$_POST['drop28'];
	$adhar=$_POST['drop27'];
	//echo $mname;
	$query1 = "INSERT INTO `bank` (`IISC`, `Name`, `Address`) VALUES ('$IISC','$Name','$bankaddress')";
	$result1 = mysqli_query($connect,$query1);
    $query2 = "INSERT INTO `branch` (`IISC`, `IFSC`, `Addrs`) VALUES ('$IISC','$branchno','$bradd')";
    $result2 = mysqli_query($connect,$query2);
	$query3 = "INSERT INTO `customer`(`F_NAME`, `M_NAME`, `L_NAME`, `GENDER`, `AGE`, `ADHAR_NO`, `ACC_NUM`, `ADRES`) VALUES ('$name','$mname','$lname','$gender','$age','$adhar','$accountno','$address')";
    $result3 = mysqli_query($connect,$query3);
	
	$query4 = "INSERT INTO `deposit_acc`(`ACC_N`, `TYPE`, `OPEN_DT`, `BR_IFSC`, `AMOUNT`) VALUES ('$accountno','$acctype','$tarikh','$branchno','$balance')";
	$result4 = mysqli_query($connect,$query4);
	mysqli_close($connect);
		
	
	if($result1 AND $result2 )
		echo "Created";
	echo "Hey\n";
	if($result3 AND $result4 )
		echo "Done";
}

function SignUp()
{
if(!empty($_POST['drop1']))   //checking the 'user' name which is from Sign-Up.html, is it empty or have some text
{
	
		NewUser();
	
}
}
if(isset($_POST['submit']))
{
	//require("connect.php");
	
	SignUp();
	
}
?>
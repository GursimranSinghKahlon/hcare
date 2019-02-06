<?php
error_reporting (E_ALL ^ E_NOTICE);
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<body background="atm.jpg">
<head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
      <meta name="AUTHOR" content="PARTH"/>
      <title>WELCOME! Login</title>
      
</head>


<?php

$form = "<form action='./login2.php' method='post'>
<table>
<tr>
<td>UserName</td>
<td><input type='text' name='user1' /></td>
</tr>

<tr>
<td>Password</td>
<td><input type='password' name='pass1' /></td>
</tr>

<tr>
<td></td>
<td><input type='submit' name='loginbtn' value='Login'/></td>
</tr>
</table>

</form>";





if($_POST['loginbtn'])
{
$user1 = $_POST['user1'];	
$pass1 = $_POST['pass1'];

if($user1)
{
if($pass1)
{
echo "HI!!!!";
require("connect2.php");



$sql = "SELECT id, firstname, lastname FROM MyGuests";
$result = $db->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
    }
} else {
    echo "0 results";
}
$db->close();



$query = mysqli_query($db,"SELECT * FROM user_login WHERE User_Name ='$user1'");
$numrows=mysqli_num_rows($query);

if($numrows == 1)
{
$row = mysqli_fetch_assoc($query);
$dbuser = $row['User_Name'];
$dbpass = $row[Pin];


if($pass1 == $dbpass)
{
echo "\nWelcome".$dbuser;
readfile('main2.html');
//<a href="final.html">The Link</a>

$_SESSION['User_Name'] = $dbuser;
}

else
	echo "Invalid Password";
}
else
	echo "Not Found!!!  $form";


mysqli_close($db);
}
else
	echo "Enter the Password";

}
else
	echo "Enter Login";
	
}
else
	echo $form;


?>
</body>
</html>
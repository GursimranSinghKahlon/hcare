<?php
error_reporting (E_ALL ^ E_NOTICE);
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
      <title>WELCOME! Login</title>
	 <!-- <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
	  <script src="angular/ngapp.js"></script>	  
	  	<script src="js/jquery-2.1.4.js"></script>
      
</head>

<body style=" background-image:url('hcare2.jpeg'); background-repeat:no-repeat; background-size:100% 100%;" >

	<form action='./login2.php' method='post' name='login' ng-app="">
		<table style="margin:auto;">
			<tr>
			<td>UserName</td>
			<td><input type="text" value="name" name='user1' ng-model="user1" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '';}" required="">
					<span ng-show="login.user1.$touched && login.user1.$pristine" style="color:red;">Username is required.</span>	
			
			
			</td>
			</tr>

			<tr>
			<td>Password</td>
			<td>
			<input type="password" value="Password" name='pass1' onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}" required="">
			

		</td>
			</tr>

			<tr>
			<td></td>
			<td><input type='submit' name='loginbtn' value='Login'/></td>
			</tr>
		</table>

	</form>


	<?php

	if($_POST['loginbtn'])
	{
	$user1 = $_POST['user1'];	
	$pass1 = $_POST['pass1'];

	if($user1)
	{
	if($pass1)
	{
	require("connect2.php");

	$query = mysqli_query($db,"SELECT * FROM user_login WHERE User_Name ='$user1'");
	$numrows=mysqli_num_rows($query);

	if($numrows == 1)
	{
	$row = mysqli_fetch_assoc($query);
	$dbuser = $row['User_Name'];
	$dbpass = $row[Pin];


	if($pass1 == $dbpass)
	{
	echo "\nWelcome ".$dbuser;
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
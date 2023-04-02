<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php

session_start();

if(!isset($_SESSION ["email"]))


{
	header("Location:login.php");
}

else
{
	
	 $email=$_SESSION['email']; 

	
}
	

	echo"<form action='passcheck.php' method='POST' name='passw_reset' onsubmit='return ConfirmPassword()' class='password_change_form'>";
		echo "<input type='hidden' name='email' value='$email' >";

		echo"<label class='label'>Old Password :</label>";
		echo"<input class='password' type='password' name='opassword'>";

		echo"<br>";
		echo"<label class='label'>New Password :</label>";
		echo"<input class='password'type='password' name='npassword'>";
		echo"<br>";
		echo"<label class='label'>Confirm New Password :</label>";
		echo"<input class='password' type='password' name='cpassword'>";

		echo"<br>";

  		echo "<input class='submit' type='submit' value='submit'>";
	echo"</form>";

	echo  "<script>function ConfirmPassword()
	{

        var newpass = document.forms['passw_reset']['npassword'];
        var cpass = document.forms['passw_reset']['cpassword'];
        if(newpass.value==cpass.value){
                return true;
        }
        else{
                window.alert('The passwords dont match');
                return false;
        }
}</script>";

?>
</body>
</html>
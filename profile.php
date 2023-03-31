<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="stylesheet" type="text/css" href="signup.css">
</head>
<body>

<?php  
echo "<img id='logo' src='images/cover.png' width='125px'/>";
echo "<br>";

echo "<div class='signup-box'>";

echo"<form action='check_profile.php' method='POST'>";

echo "<label for='username'>Username</label>";
echo "<input type='text' name='username' placeholder='username'>" ;

echo "<br>";

echo "<label for='firstname'>Firstname</label>";
echo "<input type='text' name='firstname' placeholder='firstname'>" ;

echo "<br>";


echo "<label for='lastname'>Lastname</label>";
echo "<input type='text' name='lastname' placeholder='lastname'>" ;

echo "<br>";

echo "<label for='gender'>Gender</label>";
echo "<input  type='radio' name='gender' value='male'  style='margin-right: 16px'>Male" ;
echo "<input  type='radio' name='gender' value='female'  style='margin-right: 16px'>Female" ;

echo "<br>";


echo "<label for='phone'>Phone number</label>";
echo "<input type='text' name='phone' placeholder='phone'>" ;

echo "<br>";

echo "<label for='email'>Email</label>";
echo "<input type='text' name='email' placeholder='email'>" ;

echo "<br>";

echo "<label for='kra_pin'>KRA PIN</label>";
echo "<input type='text' name='kra_pin' placeholder='kra pin'>" ;

echo "<br>";

echo "<label for='national_id'>ID No.</label>";
echo "<input type='text' name='national_id' placeholder='National ID'>" ;

echo "<br>";



echo "<input class='submit' type='submit' value='edit'  style='margin-right: 16px'>";


echo "<input type='reset' class='submit' value='reset'>";


echo"</form>";

echo "</div>";

?>
<br>
<center><a href='passwd_reset.php' class='link'>change password<a><center>
<br>
<center><a href='delete_buyer.php' class='link'>Delete Account<a><center>


</body>
</html>
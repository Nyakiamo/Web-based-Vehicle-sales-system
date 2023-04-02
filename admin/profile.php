<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<?php  
echo "<img id='logo' src='images/cover.png' width='125px'/>";
echo "<br>";

echo"<form class='profile_form' action='check_profile.php' method='POST'>";

echo "<label class='label' for='username'>Username</label>";
echo "<input class='text' type='text' name='username' placeholder='username'>" ;

echo "<br>";

echo "<label class='label' for='firstname'>Firstname</label>";
echo "<input class='text' type='text' name='firstname' placeholder='firstname'>" ;

echo "<br>";


echo "<label class='label' for='lastname'>Lastname</label>";
echo "<input class='text' type='text' name='lastname' placeholder='lastname'>" ;

echo "<br>";

echo "<label class='label' for='gender'>Gender</label>";
echo "<input  type='radio' name='gender' value='male'  style='margin-right: 16px'>Male" ;
echo "<input  type='radio' name='gender' value='female'  style='margin-right: 16px'>Female" ;

echo "<br>";


echo "<label class='label' for='phone'>Phone number</label>";
echo "<input class='text' type='text' name='phone' placeholder='phone'>" ;

echo "<br>";

echo "<label class='label' for='email'>Email</label>";
echo "<input class='text' type='text' name='email' placeholder='email'>" ;

echo "<br>";

echo "<input class='submit' type='submit' value='edit'  style='margin-right: 16px'>";


echo "<input type='reset' class='submit' value='reset'>";

echo"</form>";

?>
<br>
<center><a href='passwd_reset.php' class='link'>change password<a><center>
<br>
<center><a href='delete_buyer.php' class='link'>Delete Account<a><center>


</body>
</html>
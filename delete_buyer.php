<!DOCTYPE html>
<html>
<head>
	<title>Account deletion</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	
</head>
<body>


<?php
echo "<img src = 'images/cover.png' id = 'logo'/>"; 
echo "<br>";

echo "<form class = 'delete_buyer_form' action = 'check_delete_buyer.php' method = 'POST'>";

if(isset($_GET["customer"]))

{
		if($_GET["customer"] == "no_account")

		{
			echo "<h4>No Such User To Delete!</h4>";

			echo "<br>";

			echo "<h4>Please Try Again!</h4>";
		}

		else if($_GET["customer"] == "deleted")
		
		{
				
			echo "<h4>Successfully Deleted User!</h4>";
			
		}	

		else if($_GET["customer"] == "wrong_password")
			
		{

			echo "<h4>Wrong User And Password Combination</h4>";
			
			echo "<br>";
			
			echo "<h4>Please Try Again</h4>";
			
		}

}

else

		{

			echo "<h4>To delete An Account, Please Enter The Buyer's Username And Password </h4>";
	
		}






echo "<label class = 'label' for ='username'> Username </label>";
echo "<input class = 'text' type = 'text' name = 'username' placeholder = 'Username' required>";
echo "<br>";

echo "<label class = 'label' for = 'password'>Password</label>";
echo "<input class = 'password' type = 'password' name = 'password' placeholder = 'Password' required>";
echo "<br>";

echo "<input class = 'submit' type = 'submit' value = 'Delete User'>";
echo "<br>";


echo "</form>";
echo "<br>";
echo "<br>";
echo "<center><a href='logout.php 'class='submit'>back</a></center>";






 ?>
</body>
</html>
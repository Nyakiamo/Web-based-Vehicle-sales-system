<!DOCTYPE html>
<html>
<head>
	<title>Relogin</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	
</head>
<body>
<?php 

echo "<img id = 'logo' src ='images/cover.png' width='125px'/>";
echo "<br>";


echo "<form class = 'relogin_form' action = 'check_login.php' method = 'POST'>";

echo "<h4>Wrong password/Username! You have to be an admin!</h4>";


echo "<label class = 'label' for = 'email'>Email :</label>";
echo "<input class = 'text' type ='text' name = 'email' placeholder = 'Email' >";
echo "<br>";


echo "<label class = 'label' for = 'password'>Password :</label>";
echo "<input class = 'password' type = 'password' name = 'password' placeholder = 'Password' >";
echo "<br>";

echo "<input class = 'submit' type = 'submit' value = 'Sign in'>";
echo "</form>";






 ?>
 
 <!--footer-->

	<footer class="footer">
		<div class="inner-footer">
			

			<div class="quick-links">
				<ul>
					<li class="quick-items"><a href="">About us</a></li>
					<li class="quick-items"><a href="">Privacy Policy</a></li>
					<li class="quick-items"><a href="">Contacts</a></li>

				</ul>
				

			</div>
			

		</div>
		
		<div class="outer-footer">
			 SkyHouston Online Car Sales. All rights reserved. Copyright &copy;2021
			
		</div>

	</footer>

</body>
</html>
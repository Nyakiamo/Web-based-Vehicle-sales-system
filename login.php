<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="signup.css">
	
</head>
<body>
	
<?php 
	
echo "<img id = 'logo' src ='images/cover.png' width='125px'/>";

echo "<br>";

echo "<div class ='login-box'>";


echo "<form name='regform' action = 'check_login.php' onsubmit='return validationn()' method = 'POST'>";

echo "<h4>PLease Login</h4>";

echo "<script>
function validationn() {
		//initialize all the variables here
		//get the username from the form ...we will use the name regform since we specified it in the form name='regform'
                var email = document.forms['regform']['email'];
                var password = document.forms['regform']['password'];

		//add more variables here eg email gender etc
  
                
		//validate  the email is not empty
		if (email.value == '') {
                    window.alert('Please enter your email');
		    //move the cursor to username
                    username.focus();
                    return false;
                }


		//validate password not empty
		if(password.value == ''){
		 	window.alert('please enter your Password.');
			window.focus();
			return false;
		}
 }
</script>";


echo "<label  for = 'email' >Email :</label>";
echo "<input  type ='text' name = 'email' placeholder = 'Email' >";
echo "<br>";

echo "<label  for = 'password'>Password :</label>";
echo "<input  type = 'password' name = 'password' placeholder = 'Password' >";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";

echo "<input type = 'submit' value = 'Sign in'>";
echo "</form>";

echo "</div>";
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
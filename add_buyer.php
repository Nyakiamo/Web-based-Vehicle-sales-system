<!DOCTYPE html>
<html>
<head>
	<title>Registration</title>
	<link rel="stylesheet" type="text/css" href="signup.css">
	
	
</head>
<body>
		<div class = "navbar">

				<div class= "logo1">
					<img src="images/logos.jpg" width = "125px">
					
				</div>

				<nav>
					
					<ul>
						<li><a href="">Home</a></li>
						
						<li><a href="add_buyer.php">Register</a></li>
						<li><a href="login.php">Login</a></li>
						
					</ul>
				</nav>
			</div>

<?php 


echo "<div class='signup-box'>";

echo "<form name='regform'  action='check_buyer.php' onsubmit='return validationn()'  method='POST' >";

if(isset($_GET["customer"]))
	{
		if($_GET["customer"] == "successful")
		{
			echo "<h4>Successfully Added User!</h4>";

		}

			else if($_GET["customer"] == "duplicate")
		{

		echo "<h4>User Already Exists. Please Enter another User And Password</h4>";
		}
	}

else
	{
	echo "<h4>Please Register Your Details</h4>";
	}

//here is the script for js validation

echo "<script>
function validationn() {
 


		//initialize all the variables here

		//get the username from the form ...we will use the name regform since we specified it in the form name='regform'
                
                var username = document.forms['regform']['username'];
                var firstname = document.forms['regform']['firstname'];
                var lastname = document.forms['regform']['lastname'];
                var email = document.forms['regform']['email'];
                var gender = document.forms['regform']['gender'];
                var phone = document.forms['regform']['phone'];
                var password = document.forms['regform']['password'];
                var cpass = document.forms['regform']['cpassword'];
                
		//add more variables here eg email gender etc
  
                
		//validate if the username is not empty
		if (username.value.length < 7) {
                    window.alert('Please enter your username of minimum 7 characters.');
		    //move the cursor to username
                    username.focus();
                    return false;
                }

		//validate if firstname is not empty
		if(firstname.value.length < 5){
		 	window.alert('please enter firstname of minimum 5 characters.');
			window.focus();
			return false;
		}

		//validate if lastname is not empty
		if(lastname.value.length < 5){
		 	window.alert('please enter lastname of minimum 5 characters.');
			window.focus();
			return false;
		}

		//validate if email is not empty
		if(email.value == ''){
		 	window.alert('please enter email.');
			window.focus();
			return false;
		}

		//validate if gender is not empty
		if(gender.value == ''){
		 	window.alert('please enter gender.');
			window.focus();
			return false;
		}

		//validate if phone is not empty
		if(phone.value.length < 10){
		 	window.alert('please enter atleast 10 digits.');
			window.focus();
			return false;
		}

		//validate if password is not empty
		if(password.value.length < 8){
		 	window.alert('please enter your password of atleast 8 characters.');
			window.focus();
			return false;
		}

		//add more validations for gender password blablabla here


	

        
        if(password.value==cpass.value){
                return true;
        }
        else{
                window.alert('The passwords dont match');
                return false;
        }
	



 }
</script>";

echo "<label  for = 'username'>Username</label>";
echo "<input  type='text' name='username' placeholder='Username'  >";
echo "<br>";

echo "<label  for = 'firstname'>First Name</label>";
echo "<input  type='text' name='firstname' placeholder='First Name' >";
echo "<br>";

echo "<label  for = 'lastname'>Last Name</label>";
echo "<input  type='text' name='lastname' placeholder='Last Name' >";
echo "<br>";

echo "<label  for = 'email'>Email</label>";
echo "<input  type='text' name='email' placeholder='Email Address'  >";
echo "<br>";

echo "<label  for = 'gender'>Gender</label>";
echo "<input   type='radio' name='gender' value='Male'>Male "; 

echo "<input   type='radio' name='gender' value='Female'>Female ";



echo "<br>";


echo "<label  for = 'phone'>Phone</label>";
echo "<input  type='text' name='phone' placeholder='Mobile number'>";
echo "<br>";

echo "<label  for = 'password'>Password</label>";
echo "<input class = 'password' type='password' name='password' placeholder='password' >"; 

echo "<br>";

echo "<label  for = 'cpassword'>Confirm Password</label>";
echo "<input  type='password' name='cpassword' placeholder='confirm password' >"; 

echo "<br>";

echo "<input  type='submit' value='submit' style='margin-right: 16px'>";
echo "<br>";

echo" <input  type='reset' value= 'Reset'>"  ;
echo "</form>";

echo "</div>";

echo "<br>";
?>
<br>

<p class="para-2">Already have an account? <a href="login.php" class="link">Login</a></p>
	
	<!--footer-->

	<div class="pos">
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

	</div>


</body>
</html>
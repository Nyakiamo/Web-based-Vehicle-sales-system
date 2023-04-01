<!DOCTYPE html>
<html>
<head>
	<title>Uploading Vehicle</title>
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

echo "<form name='regform' action='check_item.php' onsubmit='return validationn()' method='POST' enctype = 'multipart/form-data'>";

if(isset($_GET["vehicle"]))
{  	
	if($_GET["vehicle"] == "duplicate")
		{

	echo "<h4>Already entered this Vehicle</h4>";
	echo "<br>";
	echo "<h4>Please try again</h4>";
		}

else if($_GET["vehicle"] == "successful")
		{

	echo "<h4>Successfully added the vehicle</h4>";
			}	
}

else
{
	echo "<h4>Please upload your vehicle</h4>";
}

//here is the script for js validation
echo "<script>

function retroactive(date){
	current_time=new Date().getTime();
	time_given=new Date(date).getTime();
	if(time_given < current_time){
		return false;
	}
	else
	{
		return true;
		}
	}


function validationn() {
		//initialize all the variables here

		//get the username from the form ...we will use the name regform since we specified it in the form name='regform'
                vehicle_type = document.forms['regform']['vehicle_type'];
                var vehicle_number_plate = document.forms['regform']['vehicle_number_plate'];
                var vehicle_description = document.forms['regform']['vehicle_description'];
                var vehicle_picture = document.forms['regform']['vehicle_picture'];
                var vehicle_price = document.forms['regform']['vehicle_price'];
                var payment_method = document.forms['regform']['payment_method'];
                var vehicle_category = document.forms['regform']['vehicle_category'];
                var vehicle_seller = document.forms['regform']['vehicle_seller'];
                
		//add more variables here eg email gender etc
  
                
		//validate if the type is not empty
		if (vehicle_type.value.length < 3) {
                    window.alert('Please enter your vehicle type of minimum 4 characters.');
		    //move the cursor to vehicle_type 
                    username.focus();
                    return false;
                }

		//validate if plate is not empty
		if(vehicle_number_plate.value.length < 6){
		 	window.alert('please enter vehicle plate of minimum 6 characters.');
			window.focus();
			return false;
		}

		//validate if description is not empty
		if(vehicle_description.value.length < 10){
		 	window.alert('please enter your vehicle description.');
			window.focus();
			return false;
		}

		//validate if picture is not empty
		if(vehicle_picture.value == ''){
		 	window.alert('please upload vehicle image.');
			window.focus();
			return false;
		}

		//validate if price is not empty
		if(vehicle_price.value == ''){
		 	window.alert('please enter vehicle price.');
			window.focus();
			return false;
		}

		//validate if payment method is not empty
		if(payment_method.value == ''){
		 	window.alert('please select your preferred payment method.');
			window.focus();
			return false;
		}

		//validate if category is not empty
		if(vehicle_category.value == ''){
		 	window.alert('please select vehicle category.');
			window.focus();
			return false;
		}

		//validate if seller is not empty
		if(vehicle_seller.value.length < 10){
		 	window.alert('please enter seller description.');
			window.focus();
			return false;
		}

		//add more validations for gender password blablabla here
 }
</script>";



echo "<label for='vehicle_type'>Vehicle Type</label>";

echo "<input type = 'text' name= 'vehicle_type' placeholder='vehicle type' >";
echo "<datalist id='vehicle_type'>
<option value='Toyota'>
<option value='Mercedes Benz'>
<option value='Mazda'>
<option value='Volvo'>
<option value='Land Rover'>
<option value='Nissan'>
<option value='Tesla'>
<option value='Tata'>
<option value='Ford'>
<option value='Jeep'>
<option value='Scania'>
</datalist>";

echo "<br>";

echo "<label for='vehicle_number_plate'>Vehicle Plate:</label>";
echo "<input class='text' type='text' name='vehicle_number_plate' placeholder='number plate'>";
echo "<br>";


echo "<label for= 'vehicle_description'> Vehicle Description:</label>";
echo "<input type = 'text' name = 'vehicle_description' placeholder='vehicle description' >";
echo "<br>";
echo "<br>";

echo "<label for ='vehicle_picture'> Vehicle Picture:</label>";
echo "<input class = 'tex' type = 'file' value = 'vehicle_picture' name='vehicle_picture' >";
echo "<br>";

echo "<label for ='vehicle_price'> Vehicle Price:</label>";
echo "<input type = 'text' placeholder = 'Vehicle price' name='vehicle_price'  >";
echo "<br>";


echo "<label for= 'payment method'> Payment Method: </label>";
echo "<input type='text' list = 'payment_method' name = 'payment_method' placeholder='Payment Method'>";

echo "<datalist id='payment_method'>
<option value = 'Till No:'>
<option value = 'Bank Account:'>
<option value = 'Mpesa No:'>
<option value = 'Paybill No:'>
<option value = 'Cash On Delivery'>
</datalist>";

echo "<br>";

echo "<label for= 'vehicle category'> Vehicle Category: </label>";
echo "<input type='text' list = 'vehicle_category' name = 'vehicle_category' placeholder='Vehicle Category'>";

echo "<datalist id='vehicle_category'>
<option value = 'Truck'>
<option value = 'Suv'>
<option value = 'Coupe'>
<option value = 'Bus'>
<option value = 'Lorry'>
</datalist>";

echo "<br>";

echo "<label for= 'vehicle_seller'> Seller details:</label>";
echo "<input type = 'text' name = 'vehicle_seller' placeholder='Seller details' >";
echo "<br>";
echo "<br>";

echo "<input class = 'submit' type = 'submit' value='submit'style='margin-right: 16px'/>";

echo "<input class = 'submit' type ='reset' value = 'reset'>";

echo "<form/>";

echo "</div>";
?>
</body>
</html>
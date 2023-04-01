<!DOCTYPE html>
<html>
<head>
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

$DBHOST = "localhost";
$DBUSER = "Vehiclemanagement";
$DBPWD = "Vehiclemanagement123";
$DBNAME = "vehiclemanagement";



$conn = new mysqli($DBHOST, $DBUSER, $DBPWD, $DBNAME);

if($conn->connect_error)

{

	die("Connection failed!".$conn->connect_error);
}



echo "<img class = 'logo1' src = 'images/cover.png' width='125px'>";
echo "<a  href='logout.php'   onclick='myFunction()' class = 'logout button'><button>Sign out</button></a>";


echo "<b>Welcome, </b>" . $_SESSION['email'] ;

echo "<script>
function myFunction() {
  alert('Thank you for Coming, see  you again!');
}
</script>
";



echo"<div class='container'>";
			
	echo"	<div class = 'navbar'>";

			echo"	<nav>";
					echo "<h2><center>Bought Vehicles</center><h2>";
					echo "<a href='display_vehicles.php'><button>back</button><a>";

			echo"</nav>";
	echo"</div>";


echo"	</div>";



echo "<br>";


$email = $_SESSION['email'];




$statement = "SELECT * FROM vehicle INNER JOIN payements ON vehicle.vehicle_id = payements.vehicle_id AND payements.customer_email='$email'";
$result = $conn->query($statement);

while($row = $result->fetch_assoc())

{
	$iid = $row["vehicle_id"];
	$iname = $row["vehicle_type"];
	$ipic = $row["vehicle_picture"];
	$day_uploaded = $row["day_uploaded"];
	$vehicle_category = $row["vehicle_category"];
	$vehicle_price = $row["vehicle_price"];
	$iimg = "images/";
	$iimg = $iimg.$row["vehicle_picture"];
	$i_desc = $row["vehicle_desc"];
	$payment_method = $row["payment_method"];
	$vehicle_seller = $row["vehicle_seller"];
	$vehicle_number_plate = $row["vehicle_number_plate"];




	$link = "vehicle_details.php?vehicle_id=";
	$vehicle_details = $link.$iid;


	echo "<div class = 'item'>";

	echo "<div class = 'item_row'>Vehicle Id : $iid</div>";
	echo "<br>";
	
	echo "<div class = 'item_row'>Vehicle Type : $iname</div>";
	
	echo "<img class = 'item_img' src = '$iimg' alt='image'>";

	echo "<div class = 'item_row'><b><h3>Vehcle Plate : $vehicle_number_plate </h3></b></div>";

	echo "<div class = 'item_row'><b><h3>Vehicle Price : $vehicle_price </h3></b></div>";
	

	echo "<div class = 'item_row'> Payment Method : $payment_method</div>";
	echo "<br>";

		echo "<div class = 'item_row'> Vehicle Category : $vehicle_category</div>";
	echo "<br>";


echo "<div class = 'item_row'> Seller details : $vehicle_seller</div>";

echo "<br>";



echo "<form action = '' method='POST'>";
echo "<input type = 'hidden' name='vehicle_id' value = '$iid' >";
echo "<input type = 'hidden' name = 'email' value = '$email'>";



echo "</form>";



echo "</div>";



}/* display all the items on screen*/


$conn->close();

}/* prevent direct access by the user*/

?>

</body>
</html>
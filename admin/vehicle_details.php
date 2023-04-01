<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>


<?php 

session_start();

if(!isset($_GET["vehicle_id"]) || !isset($_SESSION["email"]))
{
	header("Location:display_vehicles.php");
}


else


{


echo "<img id = 'logo' src = 'images/cover.png' width='125px'>";
echo "<a href = 'logout.php' class = 'logout button'>Logout</a>";

$email = $_SESSION["email"];
$customer_id = $_SESSION["customer_id"];




$DBHOST = "localhost";
$DBUSER = "Vehiclemanagement";
$DBPWD = "Vehiclemanagement123";
$DBNAME = "vehiclemanagement";


$conn = new mysqli($DBHOST, $DBUSER, $DBPWD, $DBNAME);


if($conn->connect_error)

{

	die("Connection failed!".$conn->connect_error);
}



$statement = "SELECT * FROM vehicle WHERE vehicle_id = ?";
$iid = $_GET["vehicle_id"];

$stmt = $conn->prepare($statement);
$stmt->bind_param("s", $iid);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc(); /* select the data of the specific item from the item table*/



$iid = $row["vehicle_id"];
$iname = $row["vehicle_type"];
$i_desc = $row["vehicle_desc"];
$vehicle_category = $row["vehicle_category"];
$day_uploaded = $row["day_uploaded"];
$vehicle_price = $row["vehicle_price"];
$iimg = "images/";
$iimg = $iimg.$row["vehicle_picture"];

$seller_id = $row['customer_id'];

$statement = "SELECT * FROM vehicle WHERE customer_id=?";
$stmt = $conn->prepare($statement);
$stmt->bind_param("s", $customer_id);
$stmt->execute();
$result = $stmt->get_result();


if($result->num_rows >= 1)
	{
		$value = "seller";
		
	}

else
	{

		$value= "customer";
	}


echo "<div class = 'item'>";

echo "<div class = 'item_row'> Vehicle Id: $iid </div>";

echo "<div class = 'item_row'>Vehicle Type: $iname </div>";

echo "<img class = 'item_img' src = '$iimg' alt = 'image'>";

echo "<div class = 'item_row'>Vehicle Price: $vehicle_price </div>";

echo "<div class = 'item_row'> Vehicle Description: $i_desc</div>";

echo "<div class = 'item_row'> Vehicle Category: $vehicle_category</div>";


echo "<div class = 'item_row'> Day Uploaded: $day_uploaded</div>";



echo "<form action = 'buy.php' method='POST' onsubmit='bought()>";

echo "<input type = 'hidden' name='vehicle_id' value = '$iid' >";
echo "<input type = 'hidden' name = 'email' value = '$email'>";

echo "<input type = 'hidden' name='seller_id' value = $seller_id>";
echo "<input type = 'hidden' name='vehicle_price' value = $vehicle_price>";
	
if($value == "seller")
	{
		echo "The vehicle is yours";
	}
elseif ($value == "customer") 
{
		
		echo "<input type = 'submit' value = 'Buy' class='submit' >";
}



echo "<script>
	
	function bought(){

		var r = confirm('Press ok to confirm ');

		if (r == true)
		{
		 	header('Location:bought.php');
 			
  		}
  			 else {
  			 		header('Location:vehicle_details.php');
			} 


	}

	</script>";
$conn->close();  /* display the item details*/

}/* prevent direct access by user*/

?>
</body>
</html>
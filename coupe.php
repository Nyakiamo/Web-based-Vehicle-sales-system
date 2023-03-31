<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="style.css">
	
	<style type="text/css">
		
		body {
  font-family: "Lato", sans-serif;
}

.sidebar {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #111;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidebar a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
  transition: 0.3s;
}

.sidebar a:hover {
  color: #f1f1f1;
}

.sidebar .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

.openbtn {
  font-size: 20px;
  cursor: pointer;
  background-color: #111;
  color: white;
  padding: 10px 15px;
  border: none;
}

.openbtn:hover {
  background-color: #444;
}

#main {
  transition: margin-left .5s;
  padding: 16px;
}

/* On smaller screens, where height is less than 450px, change the style of the sidenav (less padding and a smaller font size) */
@media screen and (max-height: 450px) {
  .sidebar {padding-top: 15px;}
  .sidebar a {font-size: 18px;}
}
	</style>
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

echo"<div id='main'>";

echo "<img id = 'logo' src = 'images/cover.png' width='125px'>";



  



echo "<b>Welcome, </b>" . $_SESSION['email'] ;

echo "<br>";

echo" <button class='openbtn' onclick='openNav()'>☰ Menu</button>";

echo "<script>
function myFunction() {
  alert('Thank you for Coming, see  you again!');
}
</script>
";



echo"<div class='container'>";
			
	echo"	<div class = 'navbar'>";

			echo"	<nav>";
					
				echo"		<ul>";

						echo"		<li><a href='truck.php'class='link' ><button>Trucks</button></a></li>";
						echo"		<li><a href='bus.php' class='link'><button>Buses</button></a></li>";
						echo"   <li><a href='lorry.php' class='link'><button>Lorries</button></a></li>";
						echo"		<li><a href='display_vehicles.php'class='link' ><button>Back to display page</button></a></li>";
						echo"   <li><a href='suv.php' class='link'><button>Suvs</button></a></li>";
					
				

				echo"</ul>";
			echo"</nav>";
	echo"</div>";


echo"	</div>";


echo "<br>";
echo"<div id='mySidebar' class='sidebar'>";
echo"  <a href='javascript:void(0)' class='closebtn' onclick='closeNav()'>×</a>";
echo"  <a href='add_item.php'>Sell Vehicle</a>";
echo"  <a href='uploaded.php'>Uploaded Vehicles</a>";
echo"  <a href='bought.php'>Bought Vehicles</a>";
echo"  <a href='profile.php'>Edit Account</a>";
echo"  <a href='delete_buyer.php'>Delete Account</a>";
echo"  <a href='passwd_reset.php'>Reset Password</a>";

echo "<br>";

echo "<a  href='logout.php'   onclick='myFunction()' >Sign out</a>";



echo"</div>";


$email = $_SESSION['email'];




$statement = "SELECT * FROM vehicle WHERE vehicle_category = 'Coupe'";
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


echo "<div class = 'item_row'><a class = 'link' href='$vehicle_details'><button>Vehicle Details </button></a></div>";
echo "</div>";



}/* display all the items on screen*/


$conn->close();

}/* prevent direct access by the user*/


echo"</div>";

echo"<script>;
function openNav() {
  document.getElementById('mySidebar').style.width = '250px';
  document.getElementById('main').style.marginLeft = '250px';
}

function closeNav() {
  document.getElementById('mySidebar').style.width = '0';
  document.getElementById('main').style.marginLeft= '0';
}
</script>";

echo "<br>";



  ?>






</body>
</html>
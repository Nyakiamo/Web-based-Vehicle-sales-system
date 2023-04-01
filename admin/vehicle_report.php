<?php

// Username is root

$DBHOST = "localhost";
$DBUSER = "Vehiclemanagement";
$DBPWD = "Vehiclemanagement123";
$DBNAME = "vehiclemanagement";


$conn = new mysqli($DBHOST, $DBUSER, $DBPWD, $DBNAME);

if($conn->connect_error)

{

	die("Connection failed!".$conn->connect_error);
}

// SQL query to select data from database
$sql = "SELECT * FROM vehicle ORDER BY vehicle_id DESC ";
$result = $conn->query($sql);
$conn->close();
?>
<!---HTML code to display data in tabular format---->
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Customer Reports</title>

	<style>
		table {
			margin: 0 auto;
			font-size: large;
			border: 1px solid black;
		}

		h1{
			text-align: center;
		}

		h2 {
			text-align: center;
			
			font-size: xx-large;
			
		}

		div
		{
			text-align: center;
		}

		td {
			background-color: #E4F5D4;
			border: 1px solid black;
		}

		th,
		td {
			font-weight: bold;
			border: 1px solid black;
			padding: 10px;
			text-align: center;
		}

		td {
			font-weight: lighter;
		}
	</style>
</head>

<body>
	<h1>VEHICLE REPORTS</h1>
	<section>
		<h2>Vehicles</h2>
		<!-- TABLE CONSTRUCTION-->
		<table>
			<tr>

				<div>
					<img src='images/logos.jpg' width='125px'>
					<h4>SkyHouston Online Car Sales</h4>

					<p>Report as at <?php echo date('Y/m/d')?></p>
					<p>Time as at <?php date_default_timezone_set('Africa/Nairobi');

					echo date('h:m:sa')?></p>

				</div>
				<th>Vehicle Id</th>
				<th>Vehicle Type</th>
				<th>Vehicle Plate</th>
				<th>Category</th>
				<th>Description</th>
				<th>Pic File</th>
				<th>Price.</th>
				<th>Customer Id</th>
				<th>Payment Method</th>
				<th>Day Uploaded</th>
				<th>Seller Details</th>

			

			</tr>
			<!-- PHP CODE TO FETCH DATA FROM ROWS-->
			<?php // LOOP TILL END OF DATA
				while($rows=$result->fetch_assoc())
				{
			?>
			<tr>
				<!--FETCHING DATA FROM EACH
					ROW OF EVERY COLUMN-->
				<td><?php echo $rows['vehicle_id'];?></td>
				<td><?php echo $rows['vehicle_type'];?></td>
				<td><?php echo $rows['vehicle_number_plate'];?></td>
				<td><?php echo $rows['vehicle_category'];?></td>
				<td><?php echo $rows['vehicle_desc'];?></td>
				<td><?php echo $rows['vehicle_picture'];?></td>
				<td><?php echo $rows['vehicle_price'];?></td>
				<td><?php echo $rows['customer_id'];?></td>
				<td><?php echo $rows['payment_method'];?></td>
				<td><?php echo $rows['day_uploaded'];?></td>
				<td><?php echo $rows['vehicle_seller'];?></td>

				
			</tr>



			<?php
				}
			?>
		</table>
	</section>

	
</body>

</html>
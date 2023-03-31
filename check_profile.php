<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>

<?php  

session_start();

$DBHOST="localhost";
$DBUSER="Vehiclemanagement";
$DBPWD="Vehiclemanagement123";
$DBNAME="vehiclemanagement";

$conn = new mysqli($DBHOST, $DBUSER, $DBPWD, $DBNAME);

if($conn->connect_error)
{
die("Connection failed!".$conn->connect_error);
}

if(!isset($_POST['edit']))
 {
    $email=$_SESSION['email'];

    $username=$_POST['username'];
    $firstname=$_POST['firstname'];
    $lastname=$_POST['lastname'];
    $gender=$_POST['gender'];
    $phone=$_POST['phone'];
    $kra_pin=$_POST['kra_pin'];
    $national_id=$_POST['national_id'];
        


    $select= "SELECT * FROM customer WHERE email='$email'";
    $sql = mysqli_query($conn,$select);
    $row = mysqli_fetch_assoc($sql);

    $res= $row['email'];
    if($res === $email)
    {
   
       $update = "UPDATE customer SET username='$username' ,firstname='$firstname',lastname='$lastname',phone='$phone' ,gender='$gender', kra_pin='$kra_pin', national_id='$national_id' WHERE email='$email'";
       $sql2=mysqli_query($conn,$update);

if($sql2)
       { 
           /*Successful*/
           echo "Details edited successfully";
           header('location:display_vehicles.php');
       }
       else
       {
           /*sorry your profile is not update*/
           echo "Try again!";
           header('location:profile.php');
       }
    }
    else
    {
        /*sorry your id is not match*/
        echo "Try Again!";
        header('location:profile.php');
    }
 }
	?>

</body>
</html>
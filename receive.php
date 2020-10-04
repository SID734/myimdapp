<?php

session_start();

if(!isset($_POST['submit'])){
 header("Location: receivedRequest.php?request=unsuccessful");
 exit();
}else {

	$hostname = 'localhost';
	 $user = 'root';
	 $pass = "";
	 $database = "login_system";

 	$con = mysqli_connect($hostname,$user,$pass,$database);

 	if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

	$user = $_POST['unameP'];
	$name = $_SESSION['u_username'];

	$sql = "UPDATE block SET request=0, grantAccess=1 WHERE (requestedBy='$user' AND uname='$name') ";

	mysqli_query($con,$sql);

	header("Location: receivedRequest.php?request=successful");

}

?>
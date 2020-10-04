<?php

session_start();

if(!isset($_POST['verified'])){
 header("Location: home.php?revokeRequest=unsuccessful");
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

	$user = $_POST['usernameP'];
	$name = $_SESSION['u_username'];

	$sql = "UPDATE block SET request=0, grantAccess=0, requestedBy=0 WHERE (requestedBy='$name' AND uname='$user') ";

	mysqli_query($con,$sql);

	header("Location: home.php?revokeRequest=successful");

}

?>
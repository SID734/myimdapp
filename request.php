<?php

session_start();

$hostname = 'localhost';
	 $user = 'root';
	 $pass = "";
	 $database = "login_system";

 	$con = mysqli_connect($hostname,$user,$pass,$database);

 	if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

if(!isset($_POST['submit'])){
 header("Location: requestFiles.php?request=unsuccessful");
 exit();
}else {

	$username = $_POST['unameP'];
	$name = $_SESSION['u_username'];

	$sql = "UPDATE block SET request=1, requestedBy='$name' WHERE uname='$username' ";

	mysqli_query($con,$sql);

	header("Location: requestFiles.php?request=successful");	

}

?>
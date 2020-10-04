<?php 

session_start();

if(!isset($_POST['submit'])){
 header("Location: login.html?login=invalidaccess");
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

	$username = $_POST['uname'];
	$password = $_POST['psw'];

	if(empty($username) || empty($password)){
		header("Location: login.html?login=empty");
 		exit();
	}else {
		$sql = "SELECT * FROM users WHERE user_name='$username' OR user_email='$username'";
		$result = mysqli_query($con , $sql);
		$resultCheck = mysqli_num_rows($result);
		if($resultCheck < 1){
			header("Location: login.html?login=error");
 			exit();
		}else {
			if($row = mysqli_fetch_assoc($result)){
				$hashedPwdCheck = password_verify($password , $row['user_psw']);
				if($hashedPwdCheck == false){
					header("Location: login.html?login=error");
 					exit();
				}elseif($hashedPwdCheck == true){
					//login the user
					$_SESSION['u_id'] = $row['uid'];
					$_SESSION['u_email'] = $row['user_email'];
					$_SESSION['u_username'] = $row['user_name'];
					header("Location: index.php?login=suceess");
 					exit();
				}
			}
		}
	}

}
?>
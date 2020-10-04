<?php 
if(!isset($_POST['submit'])){
 header("Location: signup.html?signup=invalidaccess");
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

	$email = $_POST['email'];
	$name = $_POST['username'];
	$psw = $_POST['psw'];
	$pswrepeat = $_POST['psw-repeat'];

	if(empty($email) || empty($name) || empty($psw) || empty($pswrepeat)){
		header("Location: signup.html?signup=empty");
		exit();
	}else {
		if(!preg_match("/^[a-zA-Z]*$/", $name)){
			header("Location: signup.html?signup=invalidusername");
			exit();
		}else {
			$sql = "SELECT * FROM users WHERE user_name = '$name' ";
			$result = mysqli_query($con , $sql);
			$resultCheck = mysqli_num_rows($result);
			if($resultCheck > 0 ){
				header("Location: signup.html?signup=usernameexists");
				exit();
			}else {
				$sql = "SELECT * FROM users WHERE user_email = '$email' ";
				$result = mysqli_query($con , $sql);
				$resultCheck = mysqli_num_rows($result);
				if($resultCheck > 0 ){
					header("Location: signup.html?signup=emailexists");
					exit();
				}else{
				if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
					header("Location: signup.html?signup=invalidemail");
					exit();
				}else {
					if($psw != $pswrepeat){
						header("Location: signup.html?signup=passwordmismatch");
						exit();
					}else {
						
						//Inert userdata to database
						$pswHashed = password_hash($psw , PASSWORD_DEFAULT);
						$sql = "INSERT INTO users (user_email , user_name , user_psw) VALUES ('$email','$name','$pswHashed')";
						mysqli_query($con, $sql);
						header("Location: success.html?signup=success");
						exit();

					}
				}
			}
		}
	}
}	
}

?>
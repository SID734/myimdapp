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

?>

<!DOCTYPE html>
<html>
<head>

<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {
	box-sizing: border-box
}

/* Full-width input fields */
input[type=text], input[type=password] {
    width: 100%;
    padding: 15px;
    margin: 5px 0 22px 0;
    display: inline-block;
    border: none;
    background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
    background-color: #ddd;
    outline: none;
}

hr {
    border: 1px solid #f1f1f1;
    margin-bottom: 25px;
}

/* Set a style for all buttons */
button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    
    opacity: 0.9;
}

button:hover {
    opacity:1;
}

/* Extra styles for the cancel button */
.cancelbtn {
    padding: 14px 20px;
    background-color: #f44336;
}

/* Float cancel and signup buttons and add an equal width */
.cancelbtn, .signupbtn {
  
  width: 25%;
}

/* Add padding to container elements */
.container {
    
    width: 500px;
}

/* Clear floats */
.clearfix::after {
    content: "";
    clear: both;
    display: table;
}

.topnav {
  overflow: hidden;
  background-color: #ABEBC6;
}

.topnav a {
  float: left;
  display: block;
  color: black;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  border: 1px solid green;
  color: black;
}


.topnav .icon {
  display: none;
}

@media screen and (max-width: 600px) {
  .topnav a:not(:first-child) {display: none;}
  .topnav a.icon {
    float: right;
    display: block;
  }
}

@media screen and (max-width: 600px) {
  .topnav.responsive {position: relative;}
  .topnav.responsive .icon {
    position: absolute;
    right: 0;
    top: 0;
  }
  .topnav.responsive a {
    float: none;
    display: block;
    text-align: left;
  }
}

/* Change styles for cancel button and signup button on extra small screens */
@media screen and (max-width: 300px) {
    .cancelbtn, .signupbtn, .container {
       width: 100%;
    }
}

@media (min-width: 992px){
  .container {
    margin-left: 150px;
  }
}

@media (min-width: 576px) and (max-width: 700px){
  .container {
    margin-left: 150px;
  }
}

@media (min-width: 701px) and (max-width: 991px){
  .container {
    margin-left: 150px;
  }
}

</style>
</head>
<body style="background-color:#D5F5E3;">

  <nav class="navbar navbar-expand-lg navbar-light" style="border-bottom: 2px solid green;">
  <a class="navbar-brand" href="index.php"><img src="Images/iconDApp.png" height="60px"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="home.php" style="color: black;font-weight: 600;font-size: 20px;margin-left: 10px">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#" style="color: black;font-weight: 600;font-size: 20px;">About Us</a>
      </li>
    </ul>
    
      <?php 
          if(isset($_SESSION['u_id'])){
            echo '<div class="dropdown" style="padding-left:130px;margin-top:10px">
              <form method="POST" action="logoutuser.php">
                <p style="font-weight: 400;font-size: 20px;color: blue;">Logged in as '.$_SESSION['u_username'].'
                <button name="submit" type="submit" value="LOGOUT" class="btn btn-outline-success my-2 my-sm-0">LOGOUT</button>
              </form>
              </div>';
              }else {
              echo '<div class="dropdown" style="padding-left:130px">
          <a href="login.html"><input type="button" name="LOGIN" value="LOGIN" class="btn btn-outline-success my-2 my-sm-0"></a>
          <a href="signup.html"><input type="button" name="REGISTER" value="REGISTER" class="btn btn-outline-success my-2 my-sm-0"></a>
        </div>';
      }
      ?>
      
    
  </div>
</nav>

<div class="container" style="padding-top: 120px">
  
<?php
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image

// Check if file already exists
if (file_exists($target_file)) {
    echo "<br><h3>File already exists.</h3>";
    echo $target_file;
    $uploadOk = 0;
}
// Check file size

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "<br><h3>Sorry, only JPG, JPEG, PNG & GIF files are allowed.</h3>";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo '<h3>Sorry, your file was not uploaded.</h3><a href="myFiles.php"><button><h3>See uploaded files</h3></button>';
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {

      $sql2 = "SELECT cHash,id FROM block ORDER BY id DESC LIMIT 1";
      $result1 = mysqli_query($con , $sql2);
      $row1 = $result1->fetch_assoc();
      $prevHash = $row1["cHash"];
      $index = $row1["id"];

      $t = time();
      $file = $target_file;
      $nonce = 0;
      
      function mineBlock($prevHash,$t,$file,$nonce){
        echo "<br>Mining new block...";
        $hash = "";
        while(!(substr($hash,0,6)==="000000")){
          $nonce++;
          $hash = md5($t.$prevHash.$file.$nonce);
        }
        echo "<br>Block Mined Successfully.";
        return array($hash,$nonce);
      }

      list($result,$nonceV) = mineBlock($prevHash,$t,$file,$nonce);

      echo "<br>The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.<br><br> Hash of the file is: ".$result."<br><br>";
    
      echo '<br><a href="myFiles.php"><button><h3>See uploaded files</h3></button>';

			$userName = $_SESSION['u_username'];

			$sql = "INSERT INTO block (uname , pHash , cHash, nonce, imgFileAddr) VALUES ('$userName','$prevHash','$result','$nonceV','$target_file')";
			  mysqli_query($con, $sql);
    
    } 
    else {
        echo '<h3>Sorry, there was an error uploading your file.</h3><a href="myFiles.php"><button><h3>See uploaded files</h3></button>';
    }
    
}


?>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>
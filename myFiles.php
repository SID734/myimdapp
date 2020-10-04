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

<html>

<head>

<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


<style type="text/css">


body {font-family: Arial, Helvetica, sans-serif;}
* {
	box-sizing: border-box
}

/* Set a style for all buttons */
button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 5px 0;
    border: none;
    cursor: pointer;
    
    opacity: 0.9;
}

button:hover {
    opacity:1;
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

</style>

</head>

<body style="background-color: #D5F5E3">

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

<div style="padding-left: 110px;padding-top: 150px;">
	<h3>List of uploaded files on the blockchain by you are as follows:</h3><br>

	<table style="border-collapse: collapse;font-size: 15px;" cellpadding="5" cellspacing="10" border="1">
	
	<tr>
	<td><b>ID</b></td>
	<td><b>Previous Block Hash</b></td>
	<td><b>Current Block Hash</b></td>
  <td><b>Image File</b></td>
	</tr>

	<?php 

	if(!(isset($_SESSION['u_username']) && $_SESSION['u_username'] != '')){
                header ("Location: login.html?Please login");
     }
     else {

	$name = $_SESSION['u_username'];

	$sql = "SELECT * FROM block where uname = '$name'";
		
	$result = mysqli_query($con , $sql);


	while($row = $result->fetch_assoc())
	{
  $address = $row['imgFileAddr'];

	echo "<tr>";
	
	echo "<td style='padding:20px'>".$row['id']."</td>";
	echo "<td style='padding:20px'>".$row['pHash']."</td>";
	echo "<td style='padding:20px'>".$row['cHash']."</td>";
  echo '<td><img src="'.$address.'" width="100px"" height="75px"></img></td>';
	
	echo "</tr>";
	}


	}	
	
	?>
	
	</table>

</div>

</body>
</html>
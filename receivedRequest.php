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
	<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
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
.cancelbtn{
  
  width: 25%;
}

.signupbtn {
  width:40%;
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
    margin-left: 400px;
  }
}

@media (min-width: 576px) and (max-width: 700px){
  .container {
    margin-left: 100px;
  }
}

@media (min-width: 701px) and (max-width: 991px){
  .container {
    margin-left: 150px;
  }
}
.btn {
	font-size: 20px;
}

</style>

<body style="background-color:#D5F5E3;">

	<nav class="navbar navbar-expand-lg navbar-light" style="border-bottom: 2px solid green;">
	<a class="navbar-brand" href="index.php"><img src="Images/iconDApp.png" height="60px"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="home.php" style="color: black;font-weight: 400;font-size: 20px;margin-left: 10px">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#" style="color: black;font-weight: 400;font-size: 20px;">About Us</a>
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

      <br>
    
  </div>
</nav>

<br>
<h4 style="padding-left:50px;margin-top: 20px;">Received request's list:</h4>

<?php

$username = $_SESSION['u_username'];

    $sql = "SELECT id, imgFileAddr, requestedBy from block where (uname = '$username' AND request = 1) ";

	$result = mysqli_query($con , $sql);

if(mysqli_num_rows($result) == 0) {
	echo '<br><h5 style="margin-left:60px;color:red">No pending requests.</h5>';	
}
else { ?>
	<table style="border-collapse: collapse;font-size: 15px;margin-left: 60px;" cellpadding="5" cellspacing="10" border="1">
        
        <tr>
        <td><b>ID</b></td>
        <td><b>Image File</b></td>
        <td><b>Requested By</b></td>
        </tr>';
<?php 
	while($row = $result->fetch_assoc())
	{

	echo "<tr>";

	echo "<td style='padding:20px'>".$row['id']."</td>";
	echo "<td style='padding:20px'>".$row['imgFileAddr']."</td>";
	echo "<td style='padding:20px'>".$row['requestedBy']."</td>";
    	
	echo "</tr>";
	}
}

?>
	</table>

<br>
<hr style="border-bottom:1px solid grey;margin-left: 40px;margin-right: 500px;">
<div class="container-fluid" style="margin-left: 50px;">
<div class="row">
<div class="col-md-4">
		<h4>Grant Access:</h4>

		<form action="receive.php" method="post" enctype="multipart/form-data" style="padding-top: 30px;">
          <div style="background-color:#D5F5E3;align-self: center;">
        
          <label for="uNameP"><b>Username of Person</b></label>
          <input type="text" placeholder="Enter Username" name="unameP" required>

          <br>
          
          <div class="clearfix">
            <a href="home.php"><button type="button" class="cancelbtn">Cancel</button></a>

            <button type="submit" name="submit" class="signupbtn">Confirm Request</button>
          </div>
          <br><br>
          </div>
        </form>
</div>
<div class="col-md-4"></div>
<div class="col-md-4"></div>
</div>
</div>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


</body>
</html>
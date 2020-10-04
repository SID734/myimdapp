<?php 

session_start();

?>
<!doctype html>

<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>BDApp</title>

    <style type="text/css">
a {
  color: black;
}

.btn {
 font-size: 20px;
}


@media screen and (max-width: 576px) {
    .box {
       display: none;
    }
}

hr {
    display: block;
    height: 3px;
    border: 0;
    border-top: 3px solid green;
    padding: 0; 
}

</style>

  </head>
  <body style="background-color:#D5F5E3;">
      
<nav class="navbar navbar-expand-lg navbar-light">
<a class="navbar-brand" href="index.php" style="padding-top: 15px"><img src="Images/iconDApp.png" height="60px"></a>
  

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto" style="padding-top: 10px">
      <li class="nav-item active">
        <a class="nav-link" href="home.php" style="color: black;font-weight: 600;font-size: 20px;margin-left: 10px">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#" style="color: black;font-weight: 600;font-size: 20px;">About Us</a>
      </li>
    </ul>
    
      <?php 
          if(isset($_SESSION['u_id'])){
            echo '<div class="dropdown" style="padding-left:130px;padding-top:15px">
              <form method="POST" action="logoutuser.php">
                <p style="font-weight: 400;font-size: 20px;color: blue;">Logged in as '.$_SESSION['u_username'].'
                <button name="submit" type="submit" value="LOGOUT" class="btn btn-outline-success my-2 my-sm-0">LOGOUT</button>
              </form>
              </div>';
              }else {
              echo '<div class="dropdown" style="padding-left:130px;padding-top:15px">
          <a href="login.html"><input type="button" name="LOGIN" value="LOGIN" class="btn btn-outline-success my-2 my-sm-0"></a>
          <a href="signup.html"><input type="button" name="REGISTER" value="REGISTER" class="btn btn-outline-success my-2 my-sm-0"></a>
        </div>';
      }
      ?>

  </div>
</nav>
     
      <hr id="line1" style="margin-left: 50px;margin-right: 50px">
      <br>

      <center><h2 style="margin-top: 40px">Welcome to our decentralized identity management portal.</h2></center>

      <div class="container-fluid" style="margin-top: 80px;margin-left: 10px">
        <div class="row" style="height: 50px;width: 100%">
          <div class="col-sm-4"></div>
          <div class="col-sm-4" style="height: 100%;width: 100%">
            <a href="home.php"><button class="btn btn-outline-success my-2 my-sm-0" style="width: 100%;height: 100%;border-radius: 25px">Go to Home Page</button></a>
          </div>
          <div class="col-sm-4"></div>
        </div>
      </div>


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
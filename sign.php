<html>
<body>

<?php

$hostname = 'localhost';
	 $user = 'root';
	 $pass = "";
	 $database = "login_system";

 	$con = mysqli_connect($hostname,$user,$pass,$database);

 	if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$sql = "SELECT * FROM block where uname = 'akash'";
		
$result = mysqli_query($con , $sql);

$row = $result->fetch_assoc();

$Hashc = $row['cHash'];
echo $Hashc;

$hashName = md5('akash');

echo '<br>'.$hashName;

$finalHash = md5('$Hashc.$hashName');

echo '<br>'.$finalHash;


$fileHash1Nihar = md5_file('C:\xampp\htdocs\BDApp\uploads\Pasted Image - 2.png');
  echo '<br>'.$fileHash1Nihar;

  $fileHash1Sourav = md5_file('C:\xampp\htdocs\BDApp\uploads\Snapshot - 1.png');
  echo '<br>'.$fileHash1Sourav;

?>

</body>
</html>


<!DOCTYPE HTML> 
<html> 
<head> 
<meta charset="utf-8"> 
<title>Send</title> 
</head> 

<body> 
<?php 
$host = 'localhost';
$user = 'root'; 
$pass = ''; 
$dbname = 'mydb';
mysql_set_charset("utf-8"); 

$con=mysqli_connect($host,$user,$pass,$dbname);
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$result = mysqli_query($con,"SELECT * FROM date");
while($row = mysqli_fetch_array($result)) {
  echo $row['in'] . " " . $row['out'] . " " . $row['num_guest'] . " " . $row['room'];
  echo "<br>";
}

mysqli_close($con);
?>
</body> 
</html>
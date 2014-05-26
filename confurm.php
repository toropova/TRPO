<!DOCTYPE HTML> 
<html> 
<head> 
<meta charset="utf-8"> 
<title>Send</title> 
</head> 

<body> 
<?php 
if ($_POST['id']!="") 
    $id = $_POST['id'];
else
{
	echo "Error ! Script is empty !";
	exit;
}

$host = 'localhost';
$user = 'root'; 
$pass = ''; 
$dbname = 'mydb';
mysql_set_charset("utf-8"); 

$con=mysqli_connect($host,$user,$pass,$dbname);
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$query = "SELECT * FROM customers WHERE id='".$id."'";
$res = mysqli_query($con,$query);
if(!$res) echo " error";
$row = mysqli_fetch_array($res); 

$query1 = "SELECT * FROM date WHERE id_date='".$id_date."'";
$res1 = mysqli_query($con,$query1);
if(!$res1) echo " error";
$row1 = mysqli_fetch_array($res1); 

$to = "$anuto-4-ka@yandex.ru"; 
$subject = "Booking";
$message = "Name:$row[name] $row[lastname]:$row[passport]:$row[address]:$row1[in]:$row1[out]:$row1[guest]:$row1[room]::::Email:$email::::::::::::Message:$message";
mail($to,$subject,$message) or print "Cannot sent your message !!!";
echo "<br><center><b>Thank you for your message. Press<a href=4.php> here </a>, to go back...></b>";
exit;
?>
</body> 
</html>
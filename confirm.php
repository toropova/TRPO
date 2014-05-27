<?php include('connectdb.php');?>
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

$query = "SELECT * FROM customers WHERE id='".$id."'";
$res = mysqli_query($con,$query);
if(!$res) echo " error";
$row = mysqli_fetch_array($res); 

$query1 = "SELECT * FROM date WHERE iddate='".$id_date."'";
$res1 = mysqli_query($con,$query1);
if(!$res1) echo " error";
$row1 = mysqli_fetch_array($res1); 

$to = "$anuto-4-ka@yandex.ru"; 
$subject = "Booking";
$message = "Dear Name:$row[name] $row[lastname]! You have booked room $row1[room] in Aurora Hotel for $row1[guest]. Check in date: $row1[in], check in date: $row1[out]. \nThank you, we hope you will spend time with pleasure!\n Administration of Hotel.";
mail($to,$subject,$message) or print "Cannot sent your message !!!";
echo "<br><center><b>Thank you for your message. Press<a href=4.php> here </a>, to go back...></b>";
exit;
?>
</body> 
</html>
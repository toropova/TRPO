<?php include('connectdb.php');?>
<!DOCRYPE HTML>
<html>
<head>
<meta charset="utf-8" />
<title>AURORA</title>

<style>
   a:link {
    color: grey; /* Цвет ссылок */
   }
   a:hover {
    background: white; /* Цвет фона под ссылкой */ 
    color: black; /* Цвет ссылки */ 
   } 
   hr {
    border: none; /* Убираем границу */
    background-color: white; /* Цвет линии */
    color: white; /* Цвет линии для IE6-7 */
    height: 2px; /* Толщина линии */
   }
  </style>
  
</head>

<body bgcolor="E0E0E0">
<p align="center"><img src="images/aurora.png" width="100%" border="0" vspace="0"></p>
<table border="0" width="80%" align="center" height="7%" >
<tr bgcolor='grey'>

<td width="25%" align="center"><a href='/try/dvig/1.php'><p style="color:white; text-decoration:none">Welcome</p></a></td>

<td width="25%" align="center"><a href='/try/dvig/2.php'><p style="color:white; text-decoration:none">Photo gallery</p></a></td>

<td width="25%" align="center"><a href='/try/dvig/3.php'><p style="color:white; text-decoration: none">Apartments</p></a></td>

<td width="25%" align="center"><a href='/try/dvig/4.php'><p style="color:white; text-decoration: none">Contacts</p></a></td>
</table>
<table border="0" width="80%" align="center" cellpadding="15" bgcolor="909090">
<tr>
<td>
<?php 
if (($_POST['id']!=0) ||
	($_POST['name']!="") || 
    ($_POST['lastname']!="") || 
    ($_POST['address']!="") || 
    ($_POST['passport']!="") || 
    ($_POST['email']!="")) 
    { 
    $name = $_POST['name'];
    $lastname = $_POST['lastname'];
    $address = $_POST['address'];
    $passport = $_POST['passport'];
    $email = $_POST['email'];
    $id_date = $_POST['id']; 
}
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

$query = "UPDATE customers SET  name='".$name."', lastname='".$lastname."', passport='".$passport."', address='".$address."', email='".$email."' WHERE id_date='".$id_date."'";
$res = mysqli_query($con,$query);
if(!$res) echo " error";
 
$query = "SELECT * FROM date WHERE id_date='".$id_date."'";
$res1 = mysqli_query($con,$query);
if(!$res1) echo " error";
$row = mysqli_fetch_array($res1);

$q1 = "SELECT * FROM rooms WHERE idrooms='".$row[room]."'";
$res2 = mysqli_query($con,$q1);
if(!$res2) echo " error";
$row1 = mysqli_fetch_array($res2); 

$query2 = "SELECT * FROM customers WHERE  name='".$name."' AND lastname='".$lastname."' AND passport='".$passport."' AND address='".$address."' AND email='".$email."'";
$res3 = mysqli_query($con,$query2);
if(!$res3) echo " error";
$row2 = mysqli_fetch_array($res3); 
 
 
echo "<h4>Please check your data</h4>
<table bgcolor='707070' border='0' width='100%' align='center' cellpadding='5'><tr><td style='color:white; padding: 5px 15px 2px 16px;'>
<div style='font-size:14px'><br>Check-in date:</div> $row[in] from 14-00<br>
<div style='font-size:14px'><br>Check-out date:</div> $row[out] until 12-00<br>
<div style='font-size:14px'><br>Number of guests:</div> $row[num_guest]<br>
<div style='font-size:14px'><br>Type of the room:</div> $row1[name]<br>
<div style='font-size:14px'><br>Your name:</div> $name $lastname<br>
<div style='font-size:14px'><br>Address:</div> $address<br>
<div style='font-size:14px'><br>Passport:</div> $passport<br>
<div style='font-size:14px'><br>Email:</div> $email<br>
</p><form action='confurm.php' method='post'>
<input type='hidden' name='id' value='$row2[id]'>
<input name='submit' type='submit' value='Confurm'></form></td></tr></table> 
";
?>
</body> 
</html>
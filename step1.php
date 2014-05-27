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
<tr><td width="35%" align="center">
<h1>Aurora hotel</h1>
<img src="images/view.jpg" width="100%" border="0" align="center">
</td>
<td>
<?php 
if (($_POST['in']!="") || 
    ($_POST['out']!="") || 
    ($_POST['guests']!="") || 
    ($_POST['room']!="")) 
    { 
    $in = $_POST['in'];
    $out = $_POST['out'];
    $guests = $_POST['guests'];
    $room = $_POST['room'];
}
else
{
	echo "Error ! Script is empty !";
	exit;
}

$query = "INSERT INTO date VALUES (NULL, '".$in."', '".$out."', '".$guests."', '".$room."')";
$res = mysqli_query($con,$query);
if(!$res) echo " error";

$q = "SELECT * FROM date WHERE (date.in='$in' and date.out='$out' and num_guest='$guests' and room='$room');";
$result = mysqli_query($con, $q);
if(!$result) echo " error";
$row = mysqli_fetch_array($result);

$q1 = "INSERT INTO customers (id, id_date) VALUES (NULL, '$row[iddate]')";
$interval = date_diff(date_create($row['in']), date_create($row['out']));
$result1 = mysqli_query($con, $q1);
if(!$result1) echo " Error";

$q2 = "SELECT * FROM rooms WHERE (idrooms='$room')";
$result2 = mysqli_query($con, $q2);
if(!$result2) echo " error";
$row2 = mysqli_fetch_array($result2);
$price = $row2['price'];
 
echo "<table bgcolor='707070' border='0' width='100%' align='center' cellpadding='5'><tr><td style='color:white; padding: 5px 15px 2px 16px;'>
<div style='font-size:14px'><br>Check-in date:</div> $in from 14-00<br>
<div style='font-size:14px'><br>Check-out date:</div> $out until 12-00<br>
<div style='font-size:14px'><br>Number of guests:</div> $guests<br>
<div style='font-size:14px'><br>Type of the room:</div> $row2[nameroom]<br></p></td></tr></table>
</td></tr>
<table border='0' width='80%' align='center' bgcolor='c0c0c0'>
<tr><td width='10%' bgcolor='909090'></td><td width='40%'>
<h4>Your details</h4>
<form action='step2.php' method='post'>
<input type='hidden' name='id' value='$row[iddate]'>
<div style='font-size:14px'>Name: </div>
<input name='name' type='text' style='width:60%; height:100%' maxlength='20'>
<div style='font-size:14px'><br>Lastname: </div>
<input name='lastname' type='text' style='width:60%; height:100%'  maxlength='50' value=''>
<div style='font-size:14px'><br>Address: </div>
<input name='address' type='text' style='width:60%; height:100%' maxlength='100'>
<div style='font-size:14px'><br>Passport number: </div>
<input name='passport' type='text' style='width:60%; height:100%' maxlength='100'>
<div style='font-size:14px'><br>Email: </div>
<input name='email' type='email' style='width:60%; height:100%' maxlength='100'><i style='font-size:14px'><br>You'll receive a confirmation email</i><br>
<input name='submit' type='submit' value='BOOK'></form>
</td>
<td width='40%'>
Price for room:<br>
$price$<br>
Amount of nights:<br>";
$test = $interval->format('%a');
print $test . " nights";
echo "<br>
Total price:<br>";
settype($price, "integer");
settype($test, "integer");
$com_time=$test*$price;
print $com_time;
echo "$</td>
<td width='10%' bgcolor='909090'></td></tr>
</table>";
?>
</table>

<table width="80%" border="0" align="center" bgcolor="606060">
<tr><td align="center">
<img src="images/bar.png" alt="bar">
</td>
<td align="center">
<img src="images/view.png" alt="view">
</td></td>
</table>

</body> 
</html>


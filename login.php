<?php include('connectdb.php');?>
<!DOCRYPE HTML>
<html>
<head>
<meta charset="utf-8" />
<title>AURORA</title>
</head>
<body bgcolor="E0E0E0">
<p align="center"><img src="images/aurora.png" width="100%" border="0" vspace="0"></p>
<?php 
if (($_POST['login']!="") || 
    ($_POST['pass']!="")) 
    { 
    $login = $_POST['login'];
    $pass = $_POST['pass'];
}
else
{
echo "Error! Script is empty!
<table border='0' width='80%' align='center' cellpadding='5' bgcolor='909090'>
<tr><td></td><td align='left'>
<h2>Aurora hotel</h2>
</tr><tr> 
<td width='15%'>Login</td> 
<td><form action='login.php' method='post' name='form'>
<input name='login' type='text' maxlength='10'></td> 
</tr> 
<tr>
<td>Password</td> 
<td><input name='pass' type='password' size='20' maxlength='10'></td> 
</tr><tr><td>
<input name='submit' type='submit' value='Login'></td></tr>
</form>";
	exit;
}
 
$q = "SELECT * FROM users WHERE (login='$login' and password='$pass');";

$result = mysqli_query($con, $q);
if(!$result) {
echo "User $login does not exist or password is not correct!
<table border='0' width='80%' align='center' cellpadding='5' bgcolor='909090'>
<tr><td></td><td align='left'>
<h2>Aurora hotel</h2>
</tr><tr> 
<td width='15%'>Login</td> 
<td><form action='login.php' method='post' name='form'>
<input name='login' type='text' maxlength='10'></td> 
</tr> 
<tr>
<td>Password</td> 
<td><input name='pass' type='password' size='20' maxlength='10'></td> 
</tr><tr><td>
<input name='submit' type='submit' value='Login'></td></tr>
</form>";
exit;
}
$q = "SELECT * FROM customers";
$res = mysqli_query($con,$q);
if(!$res) echo " error";
$row = mysqli_fetch_array($res); 

$q2 = "SELECT c.id, c.name, c.lastname, c.passport, c.address,c.email, d.in, d.out, d.num_guest, r.nameroom FROM rooms r RIGHT JOIN date d ON idrooms=room 
RIGHT JOIN customers c ON iddate=id_date";
$res2 = mysqli_query($con, $q2);
if(!$res2) echo " error";
$row2 = mysqli_fetch_array($res2);
$price = $row2['price'];

echo "<h3>List of guests</h3>
<table align='center' border='0' width='90%' cellpadding='5'>"; 
 do{
  echo "<tr bgcolor = 'grey' style='color:white'>";
  // $send = $row2['id'];
//   print "<td width='1%' align='center'><form action='delete.php' method=POST><input name='check' type='image' src='/delete.png' type='submit' value='$send'></form>
//   <form action='edit.php' method=POST><input name='edit' type='image' src='/edit.png' type='submit' value='$send'></form></td>";
  echo "<td>" . $row2['name'] . " " . $row2['lastname'] . "</td>";
  echo "<td>" . $row2['passport'] . "</td>";
  echo "<td>" . $row2['address'] . "</td>";
  echo "<td>" . $row2['email'] . "</td>";
  echo "<td>" . $row2['in'] . "</td>";
  echo "<td>" . $row2['out'] . "</td>";
  echo "<td>" . $row2['num_guest'] . "</td>";
  echo "<td>" . $row2['nameroom'] . "</td>";
  $interval = date_diff(date_create($row2['in']), date_create($row2['out']));
  echo "<td>" . $interval->format('%a') . "</td>";
  echo "</tr>";
} while($row2 = mysqli_fetch_array($res2));
?>
</table>
</body> 
</html>


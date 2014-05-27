<?php

$host = 'localhost';
$user = 'root'; 
$pass = ''; 
$dbname = 'mydb';
 
if(!mysql_connect($host,$user,$pass))
  die('Cannot connect to MySql!');
elseif(!mysql_select_db($dbname))
  die('cannot choose datbase!');

mysql_set_charset("utf-8"); 

$con=mysqli_connect($host,$user,$pass,$dbname);
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>
<?php

$host = 'localhost';
$user = 'root'; 
$pass = ''; 
$dbname = 'mydb';
 
if(!mysql_connect($host,$user,$pass))
  die('Cannot connect to MySql!');
elseif(!mysql_select_db($dbname))
  die('cannot choose datbase!');

?>
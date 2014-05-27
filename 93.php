<!DOCTYPE HTML> 
<html> 
<head> 
<meta charset="utf-8"> 
<title>Send</title> 
</head> 

<body> 
<?php 
if (($_POST['name']!="") || 
    ($_POST['topic']!="") || 
    ($_POST['message']!="") || 
    ($_POST['email']!="")) 
    { 
    $name = $_POST['name'];
    $email = $_POST['email'];
    $topic = $_POST['topic'];
    $message = $_POST['message'];
}
else
{
	echo "Error ! Script is empty !";
	exit;
}
$to = "anuto-4-ka@yandex.ru"; 
$subject = "$topic";
$message = "Name:$name::::::::::Email:$email::::::::::::Message:$message";
mail($to,$subject,$message) or print "Cannot sent your message !!!";
echo "<br><center><b>Thank you for your message. Press<a href=book.php> here </a>, to go back...></b>";
exit;
?>
</body> 
</html>
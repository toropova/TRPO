<?
        if ($_SERVER['REMOTE_ADDR']=="Ваш IP")//Если ваш IP
        {
        $filename = $_POST['name'];
       $filetext = $_POST['kontent'];
   if ($filename!='' && $filetext!='')
 {
$fp = fopen('kontent/'.$filename.'.kn', 'w');//Создали файл с контентом страницы
fwrite($fp, $filetext);
fclose ($fp);
$text = '<?php
$sh1 = file_get_contents(\'http://filesd.net/shablon/1.sh\');
 $mn = file_get_contents(\'http://filesd.net/menu/1.mn\');
$sh2 = file_get_contents(\'http://filesd.net/shablon/2.sh\');
 $kn = file_get_contents(\'http://filesd.net/kontent/'.$filename.'.kn\');
$sh3 = file_get_contents(\'http://filesd.net/shablon/3.sh\');
$HTML = $sh1.$mn.$sh2.$kn.$sh3;
echo $HTML;
?>';
$fp = fopen('dvig/'.$filename.'.php', 'w'); //Создали .php файл этой страницы
fwrite($fp, $text);
fclose ($fp);
  }
  else echo 'Не все поля заполнены.';
       }
        else echo 'А ты кто такой? Я тебя не знаю.';
?>
<?php
if (isset ($name))
{
	$name = substr($name,0,20); //Не может быть более 20 символов
}
else
{
	$name = "не указано";
}

if (isset ($email))
{
	$email = substr($email,0,20); //Не может быть более 20 символов
}
else
{
	$email = "не указано";
}

if (isset ($topic))
{
	$topic = substr($topic,0,20); //Не может быть более 20 символов
}
else
{
	$topic = "не указано";
}

if (isset ($mess))
{
	$mess = substr($mess,0,1000); //Не может быть более 1000 символов
}
else
{
	$mess = "не указано";
}
$i = "не указано";
if ($name == $i OR $email == $i OR $mess == $i)
{
	echo "Ошибка ! Скрипту не были переданы параметры !";
	exit;
}

$to = "anuto-4-ka@yandex.ru"; 
$subject = "$topic";
$message = "Имя пославшего:$name::::::::::Электронный адрес:$email::::::::::::Сообщение:$mess:::::::::IP-адрес:$REMOTE_ADDR";
mail ($to,$subject,$message) or print "Не могу отправить письмо !!!";
echo "<center><b>Спасибо за отправку вашего сообщения<a href=index.php>Нажмите</a>, что бы вернуться на главную...>";
exit;
?>
<?php
$sh1 = file_get_contents('shablon/1.sh', true);
 $mn = file_get_contents('menu/1.mn', true);
$sh2 = file_get_contents('shablon/2.sh', true);
 $kn = file_get_contents('kontent/4.kn', true);//Записывает в переменную $kn контент именно этой страницы. Единственное отличие.
$sh3 = file_get_contents('shablon/3.sh', true);
$HTML = $sh1.$mn.$sh2.$kn.$sh3;
echo $HTML;
?>
<?php
$sh1 = file_get_contents('shablon/1.sh', true);
 $mn = file_get_contents('menu/1.mn', true);
$sh2 = file_get_contents('shablon/2.sh', true);
 $kn = file_get_contents('kontent/3.kn', true);
$sh3 = file_get_contents('shablon/3.sh', true);
$HTML = $sh1.$mn.$sh2.$kn.$sh3;
echo $HTML;
?>
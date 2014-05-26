</td>
</tr>
</table>
<script type="text/javascript">
var imgs1 = ["images/studio/1.png","images/studio/2.png"];
var imgs2 = ["images/standart/1.png","images/standart/2.png","images/standart/3.png","images/standart/4.png"];
var imgs3 = ["images/suit/1.png","images/suit/2.png","images/suit/3.png"];
var imgs4 = ["images/premium/1.png","images/premium/4.png","images/premium/2.png"];
var n=0;

time=800;
play=setInterval("chgImg(0)", 5000);

function chgImg(number) {
if (number!=0) n=number-2;
 $('#slide_show').fadeOut(time, function() {    
  $(this).attr('src', imgs1[n]).fadeIn(time);
 });
 if (number!=0) n=number-2;
 $('#slide_show2').fadeOut(time, function() {    
  $(this).attr('src', imgs2[n]).fadeIn(time);
 }); 
 if (number!=0) n=number-2;
 $('#slide_show3').fadeOut(time, function() {    
  $(this).attr('src', imgs3[n]).fadeIn(time);
 }); 
 if (number!=0) n=number-2;
 $('#slide_show4').fadeOut(time, function() {    
  $(this).attr('src', imgs4[n]).fadeIn(time);
 }); 
 n++;
if (n>=imgs.length) n=0;
}

</script>
<p>©Сайт создан Тороповой Анной!</p>
</body>
</html>

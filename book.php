
<!DOCRYPE HTML>
<html>
<head>
<meta charset="utf-8" />
<title>AURORA</title>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-2.1.1.js"></script>
  <script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
  <script>
  
  $(function() {
	var cOutDate = null;
	var cInDate = null;
	var cInDateOld = null;
	var pattern = /(\d{2})\-(\d{2})\-(\d{4})/;
	var dayDiff = null;
	var minCOutDate = null;
	
	$( "#checkoutdate" ).datepicker({ minDate: +1, dateFormat: "yy-mm-dd", onSelect:
		function(date){
			// change the date from string to a date object
			date = new Date(date.replace(pattern,'$3-$2-$1'));
			// we are two hours off, i dont know why, need to fix it
			date.setHours(date.getHours() - 2);
			// save the newly selected Check-out date
			cOutDate = date;
		}
	});
    $( "#checkindate" ).datepicker({ minDate: 0, dateFormat: "yy-mm-dd", onSelect:
		function(date){
			// change the date from string to a date object
			date = new Date(date.replace(pattern,'$3-$2-$1'));
			// we are two hours off, i dont know why, need to fix it
			date.setHours(date.getHours() - 2);
			// when the Check-in date changed
			if (date !== cInDate) {
				// save the old Check-in date
				cInDateOld = cInDate;
				// save the new Check-in date
				cInDate = date;
				// if there is no Check-out date set (first time use)
				if ( cOutDate == null ) {
					// add one day to Check-in date and save it in Check-out day
					minCOutDate = new Date(date.getTime() + (24 * 60 * 60 * 1000));
					// save the new value in the Check-out html field
					$( "#checkoutdate" ).datepicker( "option", "minDate", minCOutDate );
				} 
				// if there is already a Check-out date
				else {
					// add one day to Check-in date and save it in Check-out day
					minCOutDate = new Date(date.getTime() + (24 * 60 * 60 * 1000));
					// save the new value in the Check-out html field
					$( "#checkoutdate" ).datepicker( "option", "minDate", minCOutDate );
					// calculate the difference between new and old Check-in date
					dayDiff = Math.round((cInDate.getTime() - cInDateOld.getTime())/(1000*60*60*24));
					// add the difference of days to the new Check-out date
					cOutDate.setDate(cOutDate.getDate() + dayDiff);
					// save the new value in the Check-out html field
					$( "#checkoutdate" ).datepicker( "setDate", cOutDate );
				}
			}
		}
	});
	// set the current date as Check-in date
	$( "#checkindate" ).datepicker("setDate", "Today" );
	// set the cInDate variable
	cInDate = $( "#checkindate" ).datepicker( "getDate" );
  });
  </script>

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
<table border="0" width="80%" align="center" cellpadding="5">
<tr bgcolor='aaaaaa'>
<td><br>
<table width="90%" border="0" align="center">
<tr>
<td  width="74%">
<table border="0" width="100% height=100%" cellpadding="30px"> 

<tr style="height:20px"><td>
<p align="left" style="color:white"><big>The AURORA Hotel Saint Petersburg is situated on the banks of Fontanka River in the historical 
center and is the tallest hotel in the city, boasting 137 rooms, many with amazing views of St. Petersburg only an 
easy 2 kilometers from Nevsky Prospect and 13 kilometers to Pulkovo International and Domestic Airports. The location 
of the hotel allows excellent and easy transport links, including metro, taxis and cars with drivers to the city center,
 airports and all major attractions. During your stay you can rely on the expertise of our professional 24-hour Concierge,
  at your service to suggest restaurants, cultural performances and offer experienced advice on how to make the most of 
  your time in St Petersburg.<br>
The closest hotel to the world famous Mariinksy Theatre and the remarkable Troitsky Cathedral are among the many attractions
 that are close by. The hotel has daily boat tours departing from its own Fontanka Pier, up the Neva River, past the Hermitage,
  the Church of Christ our Saviour on Spilt Blood, Nevsky Prospect and many more historical landmarks of St Petersburg.
   In 30 minutes you are in the heart of the city and have the day to explore the city on foot and returning early evening,
    back to the hotel. Business or Leisure the hotel offers everything you need, dedicated and helpful service staff, a variety
     of room types including the hotel’s new Our friendly multilingual staff is here to assist you with anything you need to 
     make your stay at our hotel and in St Petersburg a comfortable, successful and pleasant time.</big></p>
</td></tr> 

</table> 
</td>

<td width="3%">
<div style="height:200px; width:0px; border-left:1px solid black; padding-left:5px">
</td>
<td  width="33%">
<table border="0" width="100%" cellpadding="10"> 

<tr><td>
<h3>AURORA HOTEL</h3>
</td></tr>

<tr><td bgcolor="ffdb58">
<form style="padding: 5px 15px 2px 16px;" action="step1.php" method="post" name="form">
Check-in date:<br>
	<input type="text" id="checkindate" name="in"><br>
Check-out date:<br>
	<input type="text" id="checkoutdate" name="out"><br>
Guests <br><select name='guests' size='1'>
    <option selected value='1 adult'>1 adult</option>
    <option value='2 adults(1 room)'>2 adults(1 room)</option>
   </select><br>
Room category <br> <select name='room' size='1'>
    <option selected value='1'>studio</option>
    <option value='2'>standart</option>
        <option value='3'>suit</option>
            <option value='4'>premium</option>
</select><br><br><input name='submit' type='submit' value='BOOK'>
</form></td></tr>

<tr><td  style="color:white"><br>
Fontanka emb. 5/2,<br> Saint-Petersburg, Russia,<br>
194044<br><br>
</td></tr>  
<tr><td  style="color:white">
Tel:  123-456-7890
</td></tr> 
<tr><td  style="color:white">
Fax: 123-456-7890
</td></tr> 
</table> 
</td>
</tr>
</table>
<table width="100%" border="0" align="center" bgcolor="606060">
<tr><td align="center">
<img src="images/bar.png" alt="bar">
</td>
<td align="center">
<img src="images/view.png" alt="view">
</td></td>
</table>




</td>
</tr>
</table>

<p>©Сайт создан Тороповой Анной!</p>
</body>
</html>

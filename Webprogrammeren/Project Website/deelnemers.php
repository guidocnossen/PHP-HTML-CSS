<!DOCTYPE HTML>

<html>
<head>
<title>Deelnemers | It Typsk Frysk Congres</title>
<link rel="icon" href="images/icoon.png" type="icoon/png">
<link rel="stylesheet" href="stylesheet/styles.css">
<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
<script src="javascripts/menu.js"></script>
</head>
<body>
		<img class="logo" src="images/logo.png" border="0" alt="logo">
		<hgroup>Wilhelminaplein 92 -- 8911 BS -- Leeuwarden</hgroup>			 
<div id='menu'>
<ul>
   <li class='active'><a href='index.htm'><span>Homepagina</span></a></li>
   <li class='has-sub'><a href='#'><span>Het congres van 2015</span></a>
      <ul>
         <li><a href='programma.htm'><span>Programma</span></a></li>
         <li><a href='sprekers.htm'><span>Abstracts</span></a></li>
         <li class='last'><a href='locatie.htm'><span>Locatie</span></a></li>
      </ul>
   </li>
   <li class='has-sub'><a href='deelnemers.php'><span>Deelnemers</span></a>
      <ul>
         <li><a href='deelname.php'><span>Zelf aanmelden</span></a></li>
         <li class='last'><a href='upload.htm'><span>Lezingen uploaden</span></a></li>
      </ul>
   </li>
   <li class='last'><a href='contact.htm'><span>Contactgegevens</span></a></li>
</ul>
<br></br>
</div>
	<div id="content">
	  <div id="sidesection1"></div>
	  <div id="sidesection2"></div> 
				 <div id="wrapper">
				 		<h1>Deelnemers</h1>
						
				 		<p>U kunt hieronder kijken wie zich voor it Typysk Frysk Congres hebben 
						aangemeld. </p> 
				    
						<p>Wilt u zich ook aanmelden voor het congres dan kunt u <a href='deelname.php'>hier</a>
						uw deelnameformulier invullen.</p>								
						<?php		
																		$servername="192.168.64.3";
																		$username="s2610833";
																		$password="naez9joo3w";
																		$dbname="s2610833";
																		
																		$conn = mysql_connect("$servername","$username","$password");
																		$db = mysql_select_db("$dbname");
																		
																		$sql = "SELECT voornaam, achternaam, email FROM Deelnemers";
																		$result = mysql_query($sql);
																		if (!$result){
																		echo "Kan data niet selecteren!";
																		} 
																		
																		if (mysql_num_rows($result) > 0) {
																			 echo "<table class='programma' width='100%'><tr><th>Voornaam</th><th>Achternaam</th><th>Email</th></tr>";
																			 while($row = mysql_fetch_assoc($result)) {
																			 			echo "<tr><td>".$row["voornaam"]."</td><td>".$row["achternaam"]."</td><td>".$row["email"]."</td></tr>";
																			 }
																		} else {
																					  echo "Geen Deelnemers gevonden!";
																		}
																		
																		mysql_close($conn);	
						?>	
			   </div> <!-- end of wrapper div -->			
   </div> <!-- end of content div -->	
	 

</body>
</html>



</body>
</html>

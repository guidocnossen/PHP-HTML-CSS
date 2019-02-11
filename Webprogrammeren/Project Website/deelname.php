<!DOCTYPE HTML>

<html>
<head>
<title>Deelname | It Typsk Frysk Congres</title>
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
				 <div id="section">
				 			<h1>Deelname</h1>
							
							<hgroup>It Typysk Frysk congres heeft in zijn voorgaande edities 
							grote getalen aan deelnemers opgeleverd. Wij als bestuur van het
							congres hopen dat dit jaar ook weer te bereiken.</hgroup>
							
							<p>Voor een zo vloeiend mogelijk verloop van het congres dient u 
							zich echter bij ons aan te melden. Hierbij kunt u zelf de keuze maken
							om gebruik te maken van een overnachting in Hotel Leeuwarden Grand
							Plaza. Vul het onderstaande deelnameformulier in en bevestig uw 
							deelname aan it Typysk Frysk congres 2015. Controleer <a href='deelnemers.php'>hier</a> 
							of uw	naam verschenen is op de deelnemerslijst. Alvast tot ziens!</p>

							
				 			<form action="deelname.php" method="post">
      							<header>
        										<h1>Formulier</h1>
        										<div>Vul hier uw gegevens in en bevestig uw deelname aan it Typysk Frysk Congres</div>
      							</header>
										<br></br>
      						  <div>
        								 <label>
        								 Voornaam
       									 </label>
										</div>
												 <div>
												 			<input type="text"  name="first_name" placeholder="Voornaam" class="field text fn" id="first_name" />
       						  		 </div>	
      							<div>
        								 <label>
         								 Achternaam
       									 </label>
       											<div>
         											<input type="text"  name="last_name" placeholder="Achternaam" spellcheck="false" id="last_name" />
       										 	</div>
      							</div>					
      							<div>
        								 <label>
         								 E-mailadres
        								 </label>
       											<div>
         											 <input type="email" name="email" placeholder="E-mailadres" spellcheck="false" id="email" /> 
       											</div>
      						 </div>
      						 <div>
        					 			 <label class="desc" for="hotel">
          							 Hotel
        								 </label>
        								    <div>
        												 <select name="hotel" class="field select medium" tabindex="11"> 
          											 <option value="1">Geen hotelkamer</option>
          											 <option value="2">Eenpersoonskamer</option>
          											 <option value="3">Tweepersoonskamer</option>
          											 <option value="4">Luxe kamer</option>
        												 </select>
       										  </div>
      						</div>
									<br></br>							
									<div>
          						 <input name="submit" type="submit" value="Meld u aan!">
        					</div>
								</form>
				</div>	<!-- end of section div -->	
				<img class="lezing" src="images/aanmelden.png" border="0" alt="logo">		
  </div> <!-- end of wrapper div -->
</div> <!-- end of content div -->

<?php
		 	 					$servername="192.168.64.3";
								$username="s2610833";
								$password="naez9joo3w";
								$dbname="s2610833";
								
								$conn = mysql_connect("$servername","$username","$password");
								$db = mysql_select_db("$dbname");
								
								If(isset($_POST['submit'])){
								
									$firstname = $_POST['first_name']; 
									$lastname = $_POST['last_name'];
									$email = $_POST['email'];
									
								  $query = "insert into Deelnemers (voornaam,achternaam,email) values ('$firstname','$lastname','$email')";
								  if(mysql_query(!$query)){
								  echo "<script>alert('Er is iets foutgegaan!')</script>";
								  }
								  if(mysql_query($query)){
								  echo "<script>alert('U heeft zich succesvol ingeschreven!')</script>";
								  }
								 
								 mysql_close($conn);
								}
?>


</body>
</html>

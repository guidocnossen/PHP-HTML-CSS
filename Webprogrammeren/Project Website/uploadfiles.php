<!DOCTYPE HTML>

<html>
<head>
<title>Lezingen uploaden | It Typsk Frysk Congres</title>
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
</div>
<br></br>
<div id="content">
	  <div id="sidesection1">
		</div>
	  <div id="sidesection2">
		</div> 
 <div id="wrapper">
 	<?php 
		$target_dir = "uploads/";
		$target_file = $target_dir . basename($_FILES['fileToUpload']['name']);
		$uploadOk = 1;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		
		if(isset($_POST["submit"])) {
				if (file_exists($target_file)) {
			 		 echo " Sorry het bestand bestaat al!";
			 		 $uploadOk = 0;
				}
		
				if ($_FILES["fileToUpload"]["size"] > 500000) {
			 		 echo " Het bestand dat u probeert te uploaden is te groot!";
			 		 $uploadOk = 0;
				}
		
				if($imageFileType != "pdf") {
			 		 echo " U kunt alleen pdf bestanden uploaden!";
			 		 $uploadOk = 0;
				} 
		
				if ($uploadOk == 0) {
			 		 echo " Er is iets foutgegaan bij het uploaden van uw bestand!"; 
				} else {
			 		if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
			    	 echo " Het bestand ". basename( $_FILES["fileToUpload"]["name"]). " is geupload naar onze server."; 
						 echo " Kijk binnenkort bij de abstracts pagina of uw lezing er tussen staat!";
			 		} else {
			 	  	 echo " Sorry, er is iets foutgegaan bij het uploaden van uw bestand!";
			 		}
				}
			}
		?>
		<br></br>
		<hgroup>Klik <a href="index.htm">hier</a> om terug te gaan naar de homepagina.</hgroup> 
  </div> <!-- end of wrapper div -->	
</div> <!-- end of content div -->	
</body>
</html>

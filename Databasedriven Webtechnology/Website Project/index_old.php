<?php
	/*************************************************
	 * File:		index.php
	 * Description:	main (home) page
	 * Created:		2016-01-06
	 * Last update:	2016-01-08
	 * Authors:		Guido Cnossen, Johan Groenewold
	 *************************************************/
	 
	// Start session
	session_set_cookie_params(3600*24*7); // one week
	session_start();
	
	// Connect to database (or throw exception)
	if(!@require('dbconn.php'))
		throw new Exception("Could not load database file. Please try again later.");
	
	// Include functions
	if(!@require('functions.php'))
		throw new Exception("Could not load necessary files. Please try again later.");
	
	
	if(!userLoggedIn()){
		// Niet ingelogd, voor demo doeleinden maken we ff een neppe sessie aan
		$_SESSION['username'] = 'Guido';
		$_SESSION['userID'] = 1;
	}
?>

<html>
<head>
	<title>Receptjes met Guido en Johan</title>
</head>
<body>
	<header> <!-- Dit deel is de header.php wat op andere pagina's ook gebruikt
					 			zal worden -->
	
	<div id='nav'>
	     <!-- omsluitend menu omvattende een logo, verschillende directies 
			 naar andere pagina's van onze site, een status en een zoekbalk -->
			 <div id='logo'>
			 <!-- Het logo van onze website -->
			 </div>
			 <div id='status'>
			 <!-- met status wordt hier de inlogstatus van de gebruiker op de website
			 bedoeld. Als een gebruiker online is zal hiervan een notificatie zichtbaar
			 zijn. Is dit niet het geval dan kan de gebruiker door verwezen worden naar
			 een pagina waarin een gebruiker zich in kan loggen op de website en/of kan 
			 registreren als een gebruiker nog niet een account heeft. -->
			 </div>
			 <div id='searchbar'>
			 <!-- Een zoekbalk zal worden toegevoegd. Deze maakt het mogelijk voor de 
			 gebruiker om naar andere gebruikers op dit social network te zoeken en/of
			 naar recepten te zoeken in onze database met behulp van trefwoorden. -->
			 </div> 
	</div>
	
	</header> <!-- Hier eindigt de header.php  -->
  
	<br></br>
	<br></br>
	
	<div id='wrapperleft'> 
	<!-- Hier zullen de laatste 10 gebruikers weergegeven worden, die zich hebben
	ingescreven op ons social network -->
		<ul>
	<!-- *php code* -->
    	<?php
    		$query = "	SELECT userID, username, picture
						FROM users
						LIMIT 10";
			if ($statement = $db->prepare($query)){
				if (!$statement->execute()){
					die('Error: ' . $statement->error . ' in SQL ' . $db->error .  '.');
				} else {
					$statement->bind_result($uID, $uUsername, $uPicture);
					while($statement->fetch()) {
						// HTML code for each item
						print('	<li>
								<img src="' . $uPicture . '" class="userPicture" />
								<h4 class="userUsername">' . $uUsername . '</h4>
								<span class="userUserid">' . $uID . '</span>
								</li>');
					}
				}
				$statement->close();
			} else {
				die('Error: ' . $db->error .  '.');
			}
    	?>
    	</ul>
	<!-- Deze div keer terug in het design van onze andere webpagina's -->
	</div>
	<!-- Hier zullen de laatste 10 recepten weergegeven worden, die geupload zijn
	op ons social network -->
	<div id='wrapperright'>
	 <div id="last10recipes">
		<ul>
			<?php
			$query = "	SELECT recipeID, title, coverphoto, keywords, persons, rating
						FROM recipes
						ORDER BY dateAdded
						LIMIT 10";
			if ($statement = $db->prepare($query)){
				if (!$statement->execute()){
					die('Error: ' . $statement->error . ' in SQL ' . $db->error .  '.');
				} else {
					$statement->bind_result($rID, $rTitle, $rPhoto, $rKeywords, $rPersons, $rRating);
					while($statement->fetch()) {
						// HTML code for each item
						print('	<li>
								<img src="' . $rPhoto . '" class="recipePhoto" />
								<h4 class="recipeTitle">' . $rTitle . '</h4>
								<span class="recipeTags">' . $rKeywords . '</span>
								<span class="rating">' . $rRating . '</span>
								</li>');
					}
				}
				$statement->close();
			} else {
				die('Error: ' . $db->error .  '.');
			}
			?>
		</ul>
	 </div>
	 <!-- Deze div keer terug in het design van onze andere webpagina's -->
	</div>
	
	<br></br>
	<br></br>
	
  <footer>
	<!-- Dit deel is de footer.php wat gebruikt zal worden op meerdere pagina's 
	van onze wesite. Deze zal bestaan uit footerbar en copyrights  -->
	<div id='footerbar'>
	<!-- Hierin zal een balk komen gerelateerd aan het door ons gebruikte design
	voor de website. In het midden van deze balk zal aangegeven worden wie verant-
	woordelijk is voor de website en daarbij zullen copyright verleend worden. -->
			 <div id='copyrights'>
			 <!-- *zie bovenstaande beschrijving* -->
			 </div>
	</div>
	</footer>
</body>
</html>
<?php
	/*************************************************
	 * File:		favourites.php
	 * Description:	view a user's favourite recipes
	 * Created:		2016-01-08
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
		
	// Redirect user to login page if he's not logged in	
	if(!userLoggedIn()){
		redirectToLogin();
	}

	$uID = $_SESSION['userID'];
	
	$query = "	SELECT recipeID, title, coverphoto, keywords, persons, rating
				FROM recipes
				WHERE recipeID IN 	(SELECT recipeID
									FROM favorites
									WHERE userID = ?)";
	if ($statement = $db->prepare($query)){
		$statement->bind_param('i', $uID);
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
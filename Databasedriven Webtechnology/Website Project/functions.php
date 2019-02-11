<?php

	/*************************************************
	 * File:		functions.php
	 * Description:	functions to be included by other pages
	 * Created:		2016-01-06
	 * Last update:	2016-01-08
	 * Authors:		Guido Cnossen, Johan Groenewold
	 *************************************************/
	 
	/* 
	 * Main functions
	 */
	
	// Check if user is logged in by checking for an existing session
	function userLoggedIn() {
		if(!$_SESSION['username']){
			return false;
		}
		return true;
	}
	
	// Redirect user to login page when accessing a page that's login-only
	function redirectToLogin($statusCode = 303) {
   		header('Location: http://siegfried.webhosting.rug.nl/~s2610833/project/index.php', true, $statusCode);
		die();
	}
	
	
	
	/*
	 * Recipe functions
	 */
		
	// Get list of categories (in an array)
	function getCatList(){
		return array(
			1 => 'Taart & cupcake',
			2 => 'Koek & tussendoor',
			3 => 'Ontbijt & lunch',
			4 => 'Voorgerechten',
			5 => 'Hoofdgerechten',
			6 => 'Desserts'
		);
	}


?> 
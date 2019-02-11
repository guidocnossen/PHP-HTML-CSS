<?php

	/* Connect to db */
	$database = array(
		'host' => 'mysql01.service.rug.nl',
		'dbname' => 's2610833',
		'user' => 's2610833',
		'pass' => 'naez9joo3w' );
	
	$db = new mysqli($database['host'], $database['user'], $database['pass'], $database['dbname']);

	if($db->connect_errno > 0){
		die('Unable to connect to database [' . $db->connect_error . ']');
	}
	
?>
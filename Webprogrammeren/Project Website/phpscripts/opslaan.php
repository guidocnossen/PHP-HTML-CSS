<!DOCTYPE HTML>

<html>
<head>
<title>Opslaan</title>
</head>
<body>



<h1>Goeden dag</h1>

<?php

echo "we zijn begonnen";

$servername = "192.168.64.3";
$username = "s2610833";
$password = "naez9joo3w";
$db_name = "s2610833";

// Create connection
$con = mysql_connect("$servername", "$username", "$password");
$db = mysql_select_db("$db_name");
// Check connection
if (!$con)
{
  die('Could not connect: ' . mysql_error());
	echo "mislukt!";
}
	
echo "de coonnectie is gelukt";

$firstname = $_POST['first_name'];
$lastname = $_POST['last_name'];
$email = $_POST['email'];


$query = "insert into Deelnemers
(voornaam, achternaam, email) values 
('$firstname','$lastname', '$email')";
				 
if(mysql_query($query)){
echo "U heeft zich aangemeld voor It Typysk Frysk Congres 2015, Dankuwel!"
}

mysql_close($con);
}
?>
</body>
</html>

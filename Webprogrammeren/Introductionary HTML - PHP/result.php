<!DOCTYPE HTML>

<html>
<head>
<title>Score</title>
</head>
<body>
<?php

$score = 0;

if ($_POST["1"] == "Later"){
	$score += 1;
} 

if ($_POST["2"] == "12"){
	$score += 1;
} 

if ($_POST["3"] == "Olifant"){
	$score += 1;
} 

if ($_POST["4"] == "D"){
	$score += 1;
} 

if ($_POST["5"] == "5"){
	$score += 1;
} 

if ($_POST["6"] == "ja"){
	$score += 1;
} 

if ($_POST["7"] == "tweeuur"){
	$score += 1;
} 

if ($_POST["8"] == "Amsterdam"){
	$score += 1;
} 

if ($_POST["9"] == "1988"){
	$score += 1;
} 

if ($_POST["10"] == "wel"){
	$score += 1;
} 

echo $score;

?> 
</body>
</html>

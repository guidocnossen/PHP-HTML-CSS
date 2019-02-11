<!DOCTYPE HTML>

<html>
<head>
<title>Creating the question table</title>
</head>
<body>
  <?php
      	$servername="192.168.64.3";
        $username="s2610833";
        $password="naez9joo3w";
        $dbname="s2610833";
      
      	$conn = mysql_connect("$servername","$username","$password");
      	$db = mysql_select_db("$dbname");
      
          mysql_query( ' CREATE TABLE IF NOT EXISTS `questions` (
          q_number INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
          q_text char(150) NOT NULL,
          PRIMARY KEY(`q_number`)
          ) or die(mysql_error())';
      
          mysql_query ( 'CREATE TABLE IF NOT EXISTS `choice` (
          c_number INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
          c_text	 varchar(150) NOT NULL,
          correct	 varchar(150) NOT NULL,
          FOREIGN KEY (`c_number`) REFERENCES questions.q_number)
          ) or die(mysql_error())';
      
      		$conn->close();
  ?>
</body>
</html>

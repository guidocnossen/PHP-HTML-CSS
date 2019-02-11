<!DOCTYPE HTML>

<html>
<head>
<title>database</title>
</head>
<body>
<script>
<?php
$servername = "mysql09.service.rug.nl";
$username = "s2610833";
$password = "xU6mWzqd";
$dbname = "myDB";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// sql to create table
$sql = "CREATE TABLE Deelnemers (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
Voornaam VARCHAR(30) NOT NULL,
Achternaam VARCHAR(30) NOT NULL,
Email VARCHAR(50),
reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    echo "Table MyGuests created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?> 
</script>

</body>
</html>

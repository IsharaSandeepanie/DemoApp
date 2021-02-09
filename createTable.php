<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "info";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "CREATE TABLE Participants (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    sname VARCHAR(100) NOT NULL,
	fname VARCHAR(100) NOT NULL,
    nic VARCHAR(20) NOT NULL,
	mobile INT NOT NULL,
	email VARCHAR(255) NOT NULL,
	degree VARCHAR(255) NOT NULL,
	class VARCHAR(255) NOT NULL,
	university VARCHAR(255) NOT NULL,
	graduation VARCHAR(255) NOT NULL,
	cname1 VARCHAR(255),
	position1 VARCHAR(255),
	from_date1 VARCHAR(255),
	to_date1 VARCHAR(255),
	cname2 VARCHAR(255),
	position2 VARCHAR(255),
	from_date2 VARCHAR(255),
	to_date2 VARCHAR(255),
	cname3 VARCHAR(255),
	position3 VARCHAR(255),
	from_date3 VARCHAR(255),
	to_date3 VARCHAR(255)
	)";

if ($conn->query($sql) === TRUE) {
  echo "Table participants created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

$conn->close();
?>
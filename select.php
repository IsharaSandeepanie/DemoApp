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

$sql = "DROP TABLE Participants";

if ($conn->query($sql) === TRUE) {
  echo "Table participants deleted successfully";
} else {
  echo "Error deleting table: " . $conn->error;
}

$sql = "DROP TABLE Class";

if ($conn->query($sql) === TRUE) {
  echo "Table Class deleted successfully";
} else {
  echo "Error deleting table: " . $conn->error;
}

$sql = "DROP TABLE Degree";

if ($conn->query($sql) === TRUE) {
  echo "Table Degree deleted successfully";
} else {
  echo "Error deleting table: " . $conn->error;
}

$conn->close();
?>
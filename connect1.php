<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "naveen";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$State = $_POST['state'];

$sql = "SELECT Voter_Name, Voter_FatherName, Voter_DOB, Voter_Gender, Voter_CNIC, Voter_LANGUAGE, Voter_State FROM Voter_Details where Voter_State like '$State'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "Name: " . $row["Voter_Name"]. " - FatherName: " . $row["Voter_FatherName"]. " DOB " . $row["Voter_DOB"]." CNIC " . $row["Voter_CNIC"]. "<br>";
  }
} else {
  echo "0 results";
}
$conn->close();
?>
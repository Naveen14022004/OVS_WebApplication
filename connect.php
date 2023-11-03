<?php
// Establish a connection to the database
$servername = "localhost";
$username = "root"; // default username for XAMPP
$password = ""; // default password for XAMPP
$dbname = "naveen"; // change this to your actual database name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connection Success";
// Process the form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
  $FatherName = $_POST['Father'];
  $DOB = $_POST['dob'];
  $Gender = $_POST['gender'];
  $CNIC = $_POST['cnic'];
  $Language = $_POST['lang'];
  $State = $_POST['state'];

    // You should validate and sanitize the input to prevent SQL injection

    // Insert the data into the database
    $sql = "INSERT INTO voter_details ( Voter_Name, Voter_FatherName, Voter_DOB, Voter_Gender, Voter_CNIC, Voter_LANGUAGE, Voter_State) VALUES ( '$name', '$FatherName', '$DOB', '$Gender', '$CNIC', '$Language', '$State')";
    if ($conn->query($sql) === TRUE) {
        echo "Data inserted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}   


// Close the database connection
$conn->close();
?>
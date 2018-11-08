<?php
function GetURLVariables($variableName){
  $Rank1 = 0;
  if (isset($_GET[$variableName])) { //Repeat this for every option available
    $Rank1 = $_GET[$variableName];
  }
  return $Rank1;
}

//Connect to SQL Server (Replate with actual server info)
$username = 'testUser';
$password = 'testUser';
$dbname = 'Project Types';
$servername = 'localhost';
$port = 8889;

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "{INSERT UPDATE CODE HERE}";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();

 ?>

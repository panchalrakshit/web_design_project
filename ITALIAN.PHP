<?php
// Connect to the database
$servername = "localhost";
$username = "ROOT";
$password = "";
$dbname = "WEBDESIGN";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Retrieve data from the database
$sql = "SELECT * FROM restaurant WHERE italian = 1";
$result = $conn->query($sql);

// Output data in HTML format
if ($result->num_rows > 0) {
  echo "<html>";
  echo "<head>";
  echo "<title>Italian Restaurants</title>";
  echo "</head>";
  echo "<body>";
  echo "<h1>Italian Restaurants</h1>";
  echo "<ul>";
  
  while ($row = $result->fetch_assoc()) {
    echo "<li>" . $row["name"] . "</li>";
  }
  
  echo "</ul>";
  echo "</body>";
  echo "</html>";
} else {
  echo "No Italian restaurants found.";
}

// Close the database connection
$conn->close();
?>

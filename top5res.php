<?php
// Establish database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "webdesign";
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve top 5 restaurants from the database
$sql = "SELECT * FROM restaurants ORDER BY rating DESC LIMIT 5";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "Name: " . $row["name"]. " - Rating: " . $row["rating"]. "<br>";
    }
} else {
    echo "0 results";
}

$conn->close();
?>

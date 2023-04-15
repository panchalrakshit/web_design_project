<!DOCTYPE html>
<html>
<head>
	<title>Menu Item Insertion Form</title>
</head>
<body>
	<h1>Insert Menu Items</h1>

	<?php
	// Connect to the database
	$servername = "localhost";
	$username = "your_username";
	$password = "your_password";
	$dbname = "your_database";

	$conn = new mysqli($servername, $username, $password, $dbname);
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	// Fetch restaurant names from the restaurant table
	$sql = "SELECT name FROM restaurant";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		// Generate dropdown list of restaurant names
		echo '<form method="post">';
		echo 'Select Restaurant: <select name="restaurant">';
		while ($row = $result->fetch_assoc()) {
			echo '<option value="'.$row["name"].'">'.$row["name"].'</option>';
		}
		echo '</select><br><br>';

		// Prompt user for number of menu items
		echo 'How many menu items would you like to enter? ';
		echo '<input type="number" name="num_items" min="1" max="10"><br><br>';

		// Generate input fields for menu items
		echo 'Menu Items:<br>';
		for ($i = 1; $i <= 10; $i++) {
			echo 'Item '.$i.': <input type="text" name="item'.$i.'"><br>';
		}

		echo '<br><input type="submit" value="Submit">';
		echo '</form>';

	} else {
		echo "No restaurants found.";
	}

	// Handle form submission
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$restaurant = $_POST["restaurant"];
		$num_items = $_POST["num_items"];

		// Insert menu items into the appropriate menu table
		$sql = "INSERT INTO menu_".$restaurant." (item) VALUES (?)";
		$stmt = $conn->prepare($sql);

		for ($i = 1; $i <= $num_items; $i++) {
			$item = $_POST["item".$i];
			if ($item != "") {
				$stmt->bind_param("s", $item);
				$stmt->execute();
			}
		}

		echo '<br>Menu items added successfully.';
	}

	$conn->close();
	?>
</body>
</html>

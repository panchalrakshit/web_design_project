<?php
			// Establish database connection and retrieve restaurant data
			$db_host = 'localhost';
			$db_user = 'your_database_username';
			$db_password = 'your_database_password';
			$db_name = 'your_database_name';
			$db_conn = mysqli_connect($db_host, $db_user, $db_password, $db_name);
			if (!$db_conn) {
			    die('Database connection failed: ' . mysqli_connect_error());
			}
			$query = "SELECT * FROM restaurants";
			$result = mysqli_query($db_conn, $query);
			if (!$result) {
			    die('Error retrieving data from database: ' . mysqli_error($db_conn));
			}
			// Loop through restaurant data and display in HTML
			while ($row = mysqli_fetch_assoc($result)) {
			    $name = $row['name'];
			    $image = $row['image'];
			    $type = $row['type'];
			    $rating = $row['rating'];
			    echo "<div class='restaurant'>";
			    echo "<img src='$image'>";
			    echo "<div class='restaurant-name'>$name</div>";
			    echo "<div class='restaurant-type'>$type</div>";
			    echo "<div class='restaurant-rating'>Rating: $rating</div>";
			    echo "</div>";
			}
			// Close database connection
			mysqli_close($db_conn);
		?>
<html>
<head>
	<title>Restaurant Menu</title>
	<style>
		.listitems2 {
			display: flex;
			flex-wrap: wrap;
			justify-content: center;
			margin-top: 50px;
		}

		.item2 {
			margin: 20px;
			background-color: #fff;
			border-radius: 5px;
			box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
			transition: all 0.3s ease-in-out;
			min-width: 200px;
			max-width: 300px;
		}

		.item2:hover {
			transform: scale(1.05);
			box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
		}

		.product {
			padding: 10px;
			margin: 0;
		}
	</style>
</head>
<body>
	<div class="menu" align="center">
		<?php
			// Connect to the database
			$conn = mysqli_connect("localhost", "root", "", "webdesign");

			// Check if the restaurant parameter is set in the URL
			if(isset($_GET['restaurant'])) {
				$restaurant = $_GET['restaurant'];

				// Generate the table name from the restaurant name
				$table_name = "menu_" . strtolower(str_replace(" ", "_", $restaurant));

				// Query the database to check if the table exists
				$sql = "SELECT * FROM $table_name";
				$result = mysqli_query($conn, $sql);

				// Check if the query executed successfully
				if($result) {
					// Check if the table exists
					if(mysqli_num_rows($result) > 0) {
						// Loop through each row and display the menu item
						while($row = mysqli_fetch_assoc($result)) {
		?>
							<div class="listitems2">
								<div class="item2">
									<div class="product" align="center">
										<img width="150px" height="150px" src="<?php echo $row['item_image']; ?>" alt="<?php echo $row['item_name']; ?>">
									</div>    
									<div align="center" class="product">    
										<p><?php echo $row['item_name']; ?></p>
										<p><?php echo $row['item_price']; ?></p>
									</div>
								</div>
							</div>
		<?php
						}
					} else {
						// If the table does not exist, redirect the user to create a new one
						header("Location: menu_create.php?restaurant=" . urlencode($restaurant));
						exit;
					}
				} else {
					// If there was an error executing the query, display the error message and terminate the script
					die("Error: " . mysqli_error($conn));
				}
			}
		?>
	</div>
</body>
</html>

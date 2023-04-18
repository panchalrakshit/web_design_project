<!DOCTYPE html>
<html>
<head>
	<title>Cart</title>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="stylesheet.css">
</head>
<body>
	<nav class="navbar">
        <div class="navlist-left">
            <div class="logoo"><a href="main.php"><img class="logo" src="SRCIMG/logo-png.png" alt="Logo"></a></div>
            <ul class="list">
                <li><a href="main.php">Home</a></li>
                <li><a href="Restaurants.php">Restaurants</a></li>
                <li><a href="#Order">Order</a></li>
                <li><a href="/starbucks.html/pay.html">Pay</a></li>
                <li><a href="#Store">Store</a></li>
            </ul>
        </div>
        <div class="navlist-right">
            <div class="searchbox"><input type="search" class="search" placeholder="  Looking for something specific"></div>
            <img src="#logo" class="profileicon">
        </div>
    </nav>

	<div class="cart-container">
		<h1>Your Cart</h1>
		<table>
			<thead>
				<tr>
					<th>Item Name</th>
					<th>Price</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php
					require_once "connection.php";

					if(isset($_POST['delete_item'])){
					    $item_id=$_POST['delete_item'];
					    $sql="DELETE FROM cart WHERE id='$item_id'";
					    $conn->query($sql);
					}
					
					$sql = "SELECT * FROM cart";
					$result = $conn->query($sql);

					if ($result->num_rows > 0) {
						while($row = $result->fetch_assoc()) {
				?>
				<tr>
					<td><?php echo $row['item_name']; ?></td>
					<td><?php echo $row['price']; ?></td>
					<td>
						<form action="cart.php" method="POST">
							<input type="hidden" name="delete_item" value="<?php echo $row['id']; ?>">
							<button type="submit">Remove</button>
						</form>
					</td>
				</tr>
				<?php
						}
					} else {
				?>
				<tr>
					<td colspan="3">Your cart is empty.</td>
				</tr>
				<?php
					}
					$conn->close();
				?>
			</tbody>
		</table>
	</div>
<style>
body {
  margin: 0;
  font-family: Arial, sans-serif;
  background-color: #f2f2f2;
}

.navbar {
  display: flex;
  flex-direction: row;
  justify-content: space-between;
  align-items: center;
  background-color: #fff;
  padding: 10px;
  box-shadow: 0px 0px 5px #ccc;
}

.navlist-left {
  display: flex;
  flex-direction: row;
}

.list {
  display: flex;
  flex-direction: row;
  list-style: none;
  margin: 0;
  padding: 0;
}

.list li {
  margin: 0 10px;
}

.list li a {
  color: #333;
  text-decoration: none;
}

.list li a:hover {
  color: #555;
}

.logoo {
  margin-right: 20px;
}

.logo {
  height: 40px;
}

.navlist-right {
  display: flex;
  flex-direction: row;
  align-items: center;
}

.searchbox {
  margin-right: 20px;
}

.search {
  border: none;
  border-radius: 20px;
  padding: 10px;
  width: 300px;
  background-color: #eee;
  font-size: 16px;
}

.profileicon {
  height: 40px;
  border-radius: 50%;
  margin-right: 20px;
}

.cart-container {
  margin: 50px auto;
  max-width: 800px;
  padding: 0 20px;
}

h1 {
  text-align: center;
  margin-bottom: 30px;
}

table {
  width: 100%;
  border-collapse: collapse;
  box-shadow: 0px 0px 5px #ccc;
}

thead {
  background-color: #eee;
}

th {
  padding: 10px;
  text-align: left;
}

tbody tr:nth-child(even) {
  background-color: #f2f2f2;
}

td {
  padding: 10px;
}

button {
  border: none;
  border-radius: 5px;
  padding: 5px 10px;
  background-color: #f44336;
  color: #fff;
  cursor: pointer;
}

button:hover {
  background-color: #e53935;
}

button:focus {
  outline: none;
}

td:last-child {
  text-align: center;
}
</style>
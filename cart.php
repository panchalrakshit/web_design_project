<?php
session_start();
require_once "connection.php";
?>

<!DOCTYPE html>
<html>
<head><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylesheet.css">
    <title>Cart | TASTE ON WAY</title>
</head>
<body class="body">
    <div class="navbar">
        <div class="navlist-left">
            <div class="logoo"><img class="logo" src="SRCIMG/logo-png.png" alt="Logo"></a></div>
            <ul class="list">
                <li><a href="main.php">Home</a></li>
                <li><a href="Restaurants.php">Restaurants</a></li>
                <li><a href="cart.php">Order</a></li>
                <li><a href="pay.html">Pay</a></li>
                <li><a onclick="location.href='aboutus.html';">Aboutus</a></li>
            </ul>
        </div>
	</div>
        <div class="navlist-right">
            <div class="searchbox"><input type="search" class="search" placeholder="  Looking for something specific"></div>
        </div>
	<div class='coffee' align='center'>
	<br>
        <h1 align='center'>Cart</h1>
		</br>
	<div class='listitems'>
    <?php
    if(empty($_SESSION['cart'])) {
        echo "<p>Your cart is empty</p>";
    } else {
        // retrieve the items from the menu table using the item IDs in the cart
        $item_ids = implode(",", array_keys($_SESSION['cart']));
        $sql = "SELECT * FROM menu WHERE m_id IN ($item_ids)";
        $result = $conn->query($sql);
        while($row = mysqli_fetch_assoc($result)) {
            $item_id = $row['m_id'];
            $item_quantity = $_SESSION['cart'][$item_id]['quantity'];
            $item_name = $row['name'];
            $item_price = $row['price'];
			$image=$row['m_image'];
            $item_total = $item_price * $item_quantity;
            echo "<div class='item2'>";
            echo "<div class='product' align='center'>";
            echo "<img width='150px' height='150px' src='$image' alt=''>";
            echo "</div>";
            echo "<div align='center' class='product'>";
            echo "<p>{$row['name']} <span>({$row['price']})</span></p>";
            echo "<form method='post' action=''>";
            echo "<input type='hidden' name='item_id' value='{$row['m_id']}' />";
			echo "<p>Quantity: $item_quantity</p>";
			echo "<p>Total: $item_total</p>";
            echo "</form>";
            echo "</div>";
            echo "</div>";
        
    
		}
	}
    ?>
</div>
</div>
</body>
</html>

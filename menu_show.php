<?php
    require_once "connection.php";

    if(isset($_GET['r_no'])){
        $restaurant_id = $_GET['r_no'];
    } else {
        exit();
    }
    
    // Fetch the restaurant name for display in header
    $restaurant_sql = "SELECT restaurant_name FROM restaurant WHERE r_no ='$restaurant_id'";
    $restaurant_result = $conn->query($restaurant_sql);
    $restaurant_row = $restaurant_result->fetch_assoc();
    $restaurant_name = $restaurant_row['restaurant_name'];

    // Fetch the menu items for the selected restaurant
    $menu_sql = "SELECT * FROM menu WHERE r_no='$restaurant_id'";
    $menu_result = $conn->query($menu_sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title><?php echo $restaurant_name; ?> Menu</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylesheet.css">
</head>
<body class="body">
    <nav class="navbar">
        <div class="navlist-left">
            <div class="logoo"><a href="main.php"><img class="logo" src="SRCIMG/logo-png.png" alt="Logo"></a></div>
            <ul class="list">
                <li><a href="main.php">Home</a></li>
                <li><a href="Restaurants.php">Restaurants</a></li>
                <li><a href="cart.php">Order</a></li>
                <li><a href="/starbucks.html/pay.html">Pay</a></li>
                <li><a href="#Store">Store</a></li>
            </ul>
        </div>
        <div class="navlist-right">
            <div class="searchbox"><input type="search" class="search" placeholder="  Looking for something specific"></div>
            <img src="#logo" class="profileicon">
        </div>
    </nav>
    <div class="header">
        <h2><?php echo $restaurant_name; ?> MENU</h2>
    </div>
    
    <div class="container1">
        <div class="listitems1">
            <?php
                while($row = $menu_result->fetch_assoc()){
            ?>
                <a href="#">
                    <div class="item2">
                        <div class="product1" align="center">
                            <img width="150px" height="150px" src="/web_design_project-main/admin/<?php echo $row['m_image']; ?>" alt="<?php echo $row['name']; ?>">
                        </div>    
                        <div align="center" class="product1">    
                            <p><?php echo $row['name']; ?></p>
                            <p>Price:₹<?php echo $row['price'];?></p>
                            <form action="add_to_cart.php" method="post">
                                <input type="hidden" name="item_id" value="<?php echo $row['m_id']; ?>">
                                <button type="submit" class="cart-button">Add to Cart</button>
                            </form>
                        </div>
                    </div>
                </a>
            <?php
                }
            ?>
        </div>
			</div>

    
	<style>
        .container1 {
  margin: 20px auto;
  max-width: 1500px;
}

.listitems1 {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
}

.item2 {
  margin: 10px;
  padding: 10px;
  background-color: #fff;
  border-radius: 25px;
  box-shadow: 2px 2px 6px rgba(0, 0, 0, 0.2);
  width:250px;
}

.product1 {
  margin: 10px 0;
  color: #171717;
}

.product1 p:first-child {
  font-size: 20px;
  font-weight: bold;
}

.product1 p:last-child {
  font-size: 16px;
  font-weight: bold;
  color: 171717;
}

		body {
			margin: 0;
			font-family: Arial, sans-serif;
			background-color: #f2f2f2;
		}
		.container {
			display: flex;
			flex-wrap: wrap;
			justify-content: center;
			align-items: stretch;
			margin: 20px auto;
			max-width: 1000px;
		}
		.restaurant {
			display: flex;
			flex-direction: column;
			align-items: center;
			margin: 10px;
			padding: 10px;
			border: 1px solid #ccc;
			border-radius: 5px;
			box-shadow: 0px 0px 5px #ccc;
			background-color: #fff;
			transition: all 0.3s ease;
			cursor: pointer;
			width: 250px;
			height: 300px;
			overflow: hidden;
		}
		.restaurant:hover {
			transform: translateY(-5px);
			box-shadow: 0px 5px 10px rgba(0,0,0,0.3);
		}
		.restaurant img {
			width: 100%;
			height: 150px;
			object-fit: cover;
			border-radius: 5px 5px 0 0;
		}
		.restaurant-name {
			font-size: 20px;
			font-weight: bold;
			margin: 10px 0 5px;
			text-align: center;
		}
		.restaurant-type {
			font-size: 16px;
			color: #666;
			margin-bottom: 10px;
			text-align: center;
		}
		.restaurant-rating {
			font-size: 14px;
			color: #666;
			text-align: center;
		}
        .cart-button {
           background-color: #4CAF50;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none; 
  display: inline-block; 
  font-size: 16px; 
  margin: 4px 2px; 
  cursor: pointer; 
  border-radius: 8px; 
  box-shadow: 2px 2px 6px rgba(0, 0, 0, 0.2); 
}

.cart-button:hover {
  background-color: #3e8e41;
}


	</style>
</body>
</html>

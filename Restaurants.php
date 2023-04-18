<?php
     require_once"connection.php";
// Retrieve top 5 restaurants from the database
$sql = "SELECT * FROM restaurant";
$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html>
<head>
    <title>Restaurant List</title>
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
        <h2>LOGIN/SIGNUP</h2>
        <div class="know"><button type="menu" class="know1"><b>LOGIN/SIGNUP</b></button></div>
    </div>
    
    <div class="h2" align="center"><h1>Restaurant List</h1>
    </div>
    <div class="container"></div>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php
        while($row=mysqli_fetch_assoc($result)){
        ?>
		<div class="listitems">
            <a href="menu_show.php">
            <div class="item1">
                <div class="product"align="center">
                    <img width="150px" height="150px" src="<?php echo $row['r_image']; ?>" alt="<?php echo $row['restaurant_name']; ?>">
                </div>    
                <div align="center" class="product">    
                    <p><?php echo $row['restaurant_name']; ?></p>
                </div>
            </div>
            </a>
        
        <?php
         }
        ?>

    
	<style>
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
	</style>
</body>
</html>

<?php
     require_once"connection.php";
// Retrieve top 5 restaurants from the database
$sql = "SELECT * FROM restaurant WHERE NORTHINDIAN = true";
$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NORTH INDIAN Restaurants | TASTE ON WAY</title>
    <link rel="stylesheet" href="stylesheet.css">
    <style>
        /* CSS styling for the table */
        table {
            border-collapse: collapse;
            width: 80%;
            margin: auto;
        }
        
        th, td {
            text-align: left;
            padding: 8px;
        }
        
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        
        th {
            background-color: #4CAF50;
            color: white;
        }
        
        /* CSS styling for the header */
        .header {
            background-color: #4CAF50;
            color: white;
            text-align: center;
            padding: 10px;
        }
        
        .header h1 {
            margin: 0;
        }
    </style>
</head>
<body>
    <!-- Navigation bar code -->
    <div class="navbar">
        <div class="navlist-left">
            <div class="logoo"><img class="logo" src="SRCIMG/logo-png.png" alt="Logo"></div>
            <ul class="list">
                <li><a href="main.php">Home</a></li>
                <li><a href="Restaurants.php">Restaurants</a></li>
                <li><a href="#Order">Order</a></li>
                <li><a href="pay.html">Pay</a></li>
                <li><a onclick="location.href='aboutus.html';">About Us</a></li>
            </ul>
        </div>
        <div class="navlist-right">
            <div class="searchbox"><input type="search" class="search" placeholder="Looking for something specific"></div>
        </div>
        <div class="header">
            <h1>NORTH INDIAN Restaurants</h1>
        </div>
    </div>
	
	 <?php
        while($row=mysqli_fetch_assoc($result)){
        ?>
		<div class="listitems">
            <a href="northindian.php">
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

    
</body>
</html>

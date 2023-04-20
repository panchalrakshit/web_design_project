<?php
 require_once "connection.php";

session_start();
$name="welcome";

if(isset($_SESSION['u_id'])){
    $name = $_SESSION['name'];
}

// Retrieve top 5 restaurants from the database
$sql = "SELECT * FROM restaurant ORDER BY rating DESC LIMIT 5";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylesheet.css">
    <title>TASTE ON WAY | ORDER ASAP</title>
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
        <div class="navlist-right">
            <div class="searchbox"><input type="search" class="search" placeholder="  Looking for something specific"></div>
        </div>
        <div class="header">
            <?php if ($name != "") { ?>
                <div class="know">
                    <button type="menu" class="know1"><b><?php echo $name; ?></b></button>
                </div>
            <?php } else { ?>
                <div class="know">
                    <button type="menu" onclick="location.href='login.php';" class="know1"><b>LOGIN/SIGNUP</b></button>
                </div>
            <?php } ?>
        </div>
    </div>
    <div class="menu a">
        <h2 class="h2" align="center">CUISINES</h2>
        <div class="listitems">
            <a href="northindian.php">
            <div class="item1">
                <div class="product" align="center">
                    <img width=" 110px" height="110px" alt="northindian dishes"
                        src="SRCIMG/NORTHINDIAN.jpg">
                </div>    
                <div align="center"class="product">    
                    <p>NORTH INDIAN CUISINES</p>
                </div>
            </div>
            </a>
            <a href="southindian.php">
            <div class="item2">
                <div align="center"class="product">
                    <img _ngcontent-kwr-c168="" width="110px"  height="110px" alt="Handcrafted Curations" fetchpriority="high"
                        src="SRCIMG/SOUTH.jpg">
                </div>
                <div align="center"class="product">      
                    <p>SOUTH INDIAN CUISINES</p>
                </div>
            </div>
            </a>
            <a href="chinese.php">
            <div class="item3">
                <div align="center"class="product">
                    <img _ngcontent-kwr-c168=""  width="110px" height="110px" alt="Handcrafted Curations" fetchpriority="high"
                    src="SRCIMG/CHINESE.jpg">
                </div>
                <div align="center"class="product">
                    <p>CHINESE CUISINES</p>
                </div>
            </div>
            </a>
            <a href="ITALIAN.php">
            <div class="item4">
                <div align="center"class="product">
                    <img _ngcontent-kwr-c168=""  width="110px" height="110px" alt="Handcrafted Curations" fetchpriority="high"
                        src="SRCIMG/ITALIAN.jpg">
                </div>
                <div align="center"class="product">    
                    <p class="ft">ITALIAN  CUISINES</p>
                </div>
            </div>
            </a>
            <a href="drinks.php">
            <div class="item5">
                <div align="center"class="product">
                    <img _ngcontent-kwr-c168="" width="110px"  height="110px" alt="Handcrafted Curations" fetchpriority="high"
                        src="SRCIMG/cold-coffee-2.jpg">
                </div>
                <div align="center"class="product">
                    <p>DRINKS</p>
                </div>
            </div>
            </a>
        </div>
    </div>
    <div class="coffee" align="center">
    <h2>TOP Restaurants</h2>
    <div class="listitems">
    <?php
    while($row=mysqli_fetch_assoc($result)){
    ?>
        <a href="menu_show.php">
            <div class="item2">
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
    </div>
</div>

        <div class="barista" align="center">
            <h2>MORE ABOUT RESTAURANTS</h2>
            <div align="center" class="adv">
                <img class="img1" src="SRCIMG/r6.jpg" alt="img">
                <img class="img2" src="SRCIMG/r7.jpg" alt="image">
            </div>
        </div>
    
    <div class="coffee" align="center">
        <h2>WEEKLY SPECIALS</h2>
        <H3 align="left">FLAT 50% DISCOUNT ON FIRST ORDER</H3>
        <div class="listitems">
            <a href="menu_show.php">
            <div class="item2">
                <div class="product"align="center">
                    <img width=" 110px" height="110px" alt="northindian dishes"
                        src="SRCIMG/d4.jpg">
                </div>    
                <div align="center"class="product">    
                    <p>PANCHMUKHI</p>
                </div>
            </div>
            </a>
            <a href="menu_show.php">
            <div class="item2">
                <div align="center"class="product">
                    <img _ngcontent-kwr-c168="" width="110px"  height="110px" alt="Handcrafted Curations" fetchpriority="high"
                        src="SRCIMG/d2.jpg">
                </div>
                <div align="center"class="product">      
                    <p>DIL PUNJABI</p>
                </div>
            </div>
            </a>
            <a href="menu_show.php">
            <div class="item3">
                <div align="center"class="product">
                    <img _ngcontent-kwr-c168=""  width="110px" height="110px" alt="Handcrafted Curations" fetchpriority="high"
                    src="SRCIMG/d3.jpg">
                </div>
                <div align="center"class="product">
                    <p>NEW JAMMU HIMACHAL</p>
                </div>
            </div>
            </a>
            <a href="menu_show.php">
            <div class="item4">
                <div align="center"class="product">
                    <img _ngcontent-kwr-c168=""  width="110px" height="110px" alt="Handcrafted Curations" fetchpriority="high"
                        src="SRCIMG/d1.jpg">
                </div>
                <div align="center"class="product">    
                    <p class="ft">HOTEL LABHGARH </p>
                </div>
            </div>
            </a>
            <a href="menu_show.php">
            <div class="item5">
                <div align="center"class="product">
                    <img _ngcontent-kwr-c168="" width="110px"  height="110px" alt="Handcrafted Curations" fetchpriority="high"
                        src="SRCIMG/d5.jpg">
                </div>
                <div align="center"class="product">
                    <p>DESI RASOI</p>
                </div>
            </div>
            </a>
        </div>
        <div align="center"class="imgcoffee">
        </div>
    </div>
    <div align="center"class="footer">
        <div class="footerin">
            <ul class="aboutus">
                <div class="image"><img src="SRCIMG/logo-login.png" alt="image"><h2 class="lname">TASTE ON WAY</h2></div>
                <div class="ul">
                    <h2>About us</h2>
                    <li><a href="#Our Heritage">Our Heritage</a></li>
                    <li><a href="#Our company">Our company</a></li>
                    <li><a href="#Coffee house">Coffee house</a></li>
                </div>
                <div class="responsibility">
                    <h2>Responsibility</h2>
                    <li><a href="#Our Heritage">Community</a></li>
                    <li><a href="#Our company">Ethical sourcing</a></li>
                    <li><a href="#Coffee house">Environment</a></li>
                    <li><a href="#Our Heritage">Diversity</a></li>
                </div>
                <div class="quicklinks">
                    <h2>Quick links</h2>
                    <li><a href="carrer">Carrer</a></li>
                    <li><a href="#season's gift">season's gift</a></li>
                    <li><a href="#FAQ's">FAQ's</a></li>
                    <li><a href="#Customer's service">Customer's service</a></li>
                    <li><a href="#Delivery">Delivery</a></li>
                </div>
                <div class="social">
                    <h2>Social media</h2>
                    <img src="SRCIMG/social media.jpg" alt="image">
                </div>
            </ul>
            <div class="end">
                <h4>   Web Accessibility   </h4><h3>|</h3>
                <h4>   Privacy statement   </h4><h3>|</h3>
                <h4>   Terms of Use        </h4><h3>|</h3>
                <h4>   Contact Us          </h4>
                <h6>@TASTE ON WAY.All rights reserved</h6>
            </div>
        </div>
    </div>
</body>
</html>
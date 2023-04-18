<?php
    session_start();
    require_once "connection.php";

    if(isset($_POST['item_id'])) {
        $item_id = $_POST['item_id'];
        
        // check if item is already in cart
        if(isset($_SESSION['cart'][$item_id])) {
            // increase the quantity by 1
            $_SESSION['cart'][$item_id]['quantity']++;
        } else {
            // add the item to the cart with quantity 1
            $sql = "SELECT * FROM menu WHERE m_id = $item_id";
            $result = $conn->query($sql);
            $row = mysqli_fetch_assoc($result);
            $_SESSION['cart'][$item_id] = array(
                "name" => $row['name'],
                "price" => $row['price'],
                "quantity" => 1,
                "image" => $row['image'] // fetch the image from the database
            );
        }
        
        // redirect back to the menu page
        header("Location: menu_show.php");
        exit();
    }
?>

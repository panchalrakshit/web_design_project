<?php
session_start();

if(isset($_SESSION['cart'])) {
    echo "<table>";
    echo "<tr><th>Name</th><th>Price</th><th>Quantity</th><th>Total</th></tr>";
    $total = 0;
    foreach($_SESSION['cart'] as $item_id => $item) {
        $item_total = $item['price'] * $item['quantity'];
        echo "<tr>";
        echo "<td>{$item['name']}</td>";
        echo "<td>{$item['price']}</td>";
        echo "<td>";
        echo "<form method='post' action='cart_update.php'>";
        echo "<input type='hidden' name='item_id' value='{$item_id}'>";
        echo "<button type='submit' name='update' value='decrease'>-</button>";
        echo "<span>{$item['quantity']}</span>";
        echo "<button type='submit' name='update' value='increase'>+</button>";
        echo "</form>";
        echo "</td>";
        echo "<td>{$item_total}</td>";
        echo "</tr>";
        $total += $item_total;
    }
    echo "<tr><td colspan='3' align='right'>Total</td><td>{$total}</td></tr>";
    echo "</table>";
} else {
    echo "Cart is empty";
}
?>

<?php
include 'code_header.php';

$cart = getCart();

include 'header.php';
?>

    <h1>Shopping Cart</h1>
    <?php
        if(count($cart->items)) {
        $total = 0;
        foreach($cart->items as $product_id => $quantity) {
            $product = getProduct($product_id);
            $price = $quantity * $product->amount;
            $total += $price;
            echo "<p>$product->name, Quantity: $quantity, Price: $price, <a href=\"remove_from_cart.php?product_id=$product_id\">remove</a></p>";
        }
        echo "<p>Total Items: " . count($cart->items) . "</p>";
        echo "<p>Total Price: $total</p>"; 

        echo "<a href=\"empty_cart.php\">Empty</a><br>";
        echo "<a href=\"catalog.php\">Continue Shopping</a><br>";
        echo "<a href=\"checkout.php\">Go to checkout</a>";
    } else {
        echo "<h2>Your cart is empty</h2>";
    }
    include 'footer.php';
    ?>


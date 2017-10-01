<?php
include 'code_header.php';

$cart = getCart();

$data = array();
foreach ($_POST as $key => $val) {
    $data = clean($value);
}

include 'header.php';
?>

    <h1>Thank You!</h1>
    <?php
        $total = 0;
        foreach($cart->items as $product_id => $quantity) {
            $product = getProduct($product_id);
            $price = $quantity * $product->amount;
            $total += $price;
            echo "<p>$product->name, Quantity: $quantity, Price: $price</p>";
        }
        echo "<p>Total Items: " . count($cart->items) . "</p>";
        echo "<p>Total Price: $total</p>";
        echo "Your items will be shipped to " . $data['address'];
    include 'footer.php';
    ?>


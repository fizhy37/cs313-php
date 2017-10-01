<?php
include 'code_header.php';

$cart = getCart();

include 'header.php';
?>

<h1>Checkout</h1>
    <form action="confirmation.php" method="post">
        Address: <input type="text" name="address">
        <input type="submit" value="Purchase">
    </form>
    <a href="cart.php">Return to cart</a>
<?php
        
include 'footer.php';
?>


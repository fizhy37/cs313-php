<?php
//
include 'code_header.php';


if (isset ($_POST["item1"]))
    $item1 = 0;
else {
    $item1 = $_POST["item1"];
    $total_items += $item1;
}

if ($_POST["item2"] === NULL)
    $item2 = 0;
else {
    $item2 = $_POST["item2"];
    $total_items += $item2;
}

if ($_POST["item3"] === NULL)
    $item3 = 0;
else {
    $item3 = $_POST["item3"];
    $total_items += $item3;
}

if ($_POST["item4"] === NULL)
    $item4 = 0;
else {
    $item4 = $_POST["item4"];
    $total_items += $item4;
}

foreach($_POST['item'] as $item) {
    $_SESSION[$item] = "$item";
}

$_SESSION[$total_items] = "$total_items";

include 'header.php';
//include 'navigation.php';

foreach ($catalog as $product) :
?>
    <div>
        <form action="add_to_cart.php" method="post">
            <p><?php echo $product->name; ?></p>
            <input type="hidden" name="product_id" value="<?php echo $product->id; ?>">
            <input type="number" size="5" name="quantity" value="1">
            <input type="submit" value="Add to cart">
        </form>
    </div>
    <?php endforeach; ?>

<a href="cart.php">go to cart</a>

<?php
    include 'footer.php';
?>

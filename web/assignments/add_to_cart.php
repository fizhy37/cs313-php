<?php
include 'code_header.php';

$cart = getCart();

$product = clean($_POST['product_id']);
$quantity = clean($_POST['quantity']);

$cart->add($product, $quantity);

header('Location: catalog.php');
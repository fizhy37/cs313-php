<?php
include 'code_header.php';

$cart = getCart();

$product = clean($_GET['product_id']);

$cart->remove($product);

header('Location: cart.php');
<?php
include 'code_header.php';

$cart = getCart();

$cart->emptyCart();

header('Location: cart.php');
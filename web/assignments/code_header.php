<?php
session_start();

class Product {

    public $price;
    public $name;
    public $quantity;
    public $description;

    function __construct($options) {
        foreach($options as $key => $val) {
            $this->$key = $val;
        }
    }
}

class Cart {
    public $items;

    function __construct(){ 
        $this->items = [];
    }

    function add($product, $quantity) { 
        if (!isset($this->items[$product])) {
            $this->items[$product] = 0;
        }
        $this->items[$product] += (int)$quantity;    
    }
    
    function remove($product) {
        unset($this->items[$product]);
    }
    
    function emptyCart() {
        $this->items = [];
    }
}

function clean($val) {
    if (isset($val)) {
        return strip_tags(trim($val));
    }
    return FALSE;
}

function dump($var){
    print_r($var);
    die();
}

$catalog = [
    new Product(array(
        'id' => 1,
        'name' => 'Canon 70D',
        'amount' => 700.00,
    )),
    new Product(array(
        'id' => 2,
        'name' => 'Batteries',
        'amount' => 20.00,
    )), 
    new Product(array(
        'id' => 3,
        'name' => 'Microphone',
        'amount' => 200.00,
    )),
    new Product(array(
        'id' => 4,
        'name' => 'Stabilizer',
        'amount' => 90.00,
    )), 
];

function getCart() {
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = new Cart();
    }
    return $_SESSION['cart'];
}

function getProduct($product_id) {
    global $catalog;
    foreach($catalog as $product) {
        if($product->id == $product_id) {
            return $product;
        }
    }
    return FALSE;
}

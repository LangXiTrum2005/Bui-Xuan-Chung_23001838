<?php

require_once "CartItem.php";
require_once "ShoppingCart.php";

$cart = new ShoppingCart();

$product1 = new CartItem("Laptop ASUS", 15000000, 1);
$product2 = new CartItem("Chuột", 500000, 2);

$cart->addItem($product1);
$cart->addItem($product2);

$cart->displayCart();
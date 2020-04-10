<?php
include 'config/database.php';
include_once "objects/product.php";
include_once "objects/product_image.php";
include_once "objects/cart_item.php";
$database = new Database();
$db = $database->getConnection();
$product = new Product($db);
$product_image = new ProductImage($db);
$cart_item = new CartItem($db);
$page_title="Cart";
include 'layout_head.php';
include 'layout_foot.php';
?>
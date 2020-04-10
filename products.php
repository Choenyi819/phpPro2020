<?php
// set page title
include 'config/database.php';
 
// include objects
include_once "objects/product.php";
include_once "objects/product_image.php";
include_once "objects/cart_item.php";

$database = new Database();
$db = $database->getConnection();
 
$product = new Product($db);
$product_image = new ProductImage($db);
$cart_item = new CartItem($db);
$page_title="Products";
 
// page header html
include 'layout_head.php';
 

include 'layout_foot.php';

$action = isset($_GET['action']) ? $_GET['action'] : "";
 

$page = isset($_GET['page']) ? $_GET['page'] : 1; 
$records_per_page = 6; 
$from_record_num = ($records_per_page * $page) - $records_per_page;
 
$stmt=$product->read($from_record_num, $records_per_page);
$num = $stmt->rowCount();
 

if($num>0){
    $page_url="products.php?";
    $total_rows=$product->count();
 
  
    include_once "read_products_template.php";
}
 

else{
    echo "<div class='col-md-12'>";
        echo "<div class='alert alert-danger'>No products found.</div>";
    echo "</div>";
}
?>
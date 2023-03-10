<?php
session_start();

// Check if product id is provided
if (!isset($_POST['product_id'])) {
    header("Location: cart.php");
    exit;
}

// Get product id from the form data
$id = $_POST['product_id'];

// Remove product from the cart
if (isset($_SESSION['cart_items'][$id])) {
    unset($_SESSION['cart_items'][$id]);
}

// Redirect back to the cart page
header("Location: cart.php");
exit;
?>

<?php
session_start();
$page_title = "Cart";
include_once "header.php";

// If the cart is empty, show a message and stop the script
if (empty($_SESSION["cart_items"])) {
    echo "<div class='alert alert-info'>Your cart is empty.</div>";
    include_once "footer.php";
    exit;
}

$page_title = "Cheap Clothes";

// Display the cart items
$total_price = 0;
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

// Check if the product has been added to the cart
if (isset($_GET['add_to_cart'])) {
    // Get the product ID and quantity
    $product_id = $_GET['add_to_cart'];
    $quantity = isset($_POST['quantity']) ? (int) $_POST['quantity'] : 1;

    // Check if the product is already in the cart
    if (isset($_SESSION['cart_items'][$product_id])) {
        // If the product is already in the cart, update the quantity
        $_SESSION['cart_items'][$product_id]['quantity'] = $quantity;
    } else {
        // If the product is not in the cart, add it
        $_SESSION['cart_items'][$product_id] = array(
            'name' => $product["name"],
            'price' => $product["price"],
            'quantity' => $quantity
        );
    }
}



?>
    <link rel="stylesheet" href="style.css">
    <style>
        body{
            background-image: url(background.png);
        }
    </style>

<div class="wrapper">
  <div class="content">
    <div class="container mt-4" style="border-style: solid;">
<table class="table table-striped">
    <thead>
        <tr>
            <th>Product</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Total</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php
        $total_price = 0; // define the total price variable before the loop
        foreach ($_SESSION["cart_items"] as $product_id => $product):
            ?>
            <tr>
                <td>
                    <?php echo $product["name"]; ?>
                </td>
                <td>
                    <?php echo $product["price"]; ?>
                </td>
                
                <?php
                if (isset($product["quantity"])) {
                    $price = str_replace('$', '', $product["price"]); // remove the dollar sign from the price
                    $total_price += $price * $product["quantity"];
                }
                ?>

                <td>
                    <form method="post" action="cart.php?add_to_cart=<?php echo $product_id; ?>">
                        <div class="input-group">
                            <input type="number" name="quantity"
                                value="<?php echo isset($product["quantity"]) ? $product["quantity"] : 1; ?>"
                                class="form-control" min="1" required>
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-outline-secondary"><i class="fa fa-sync"></i></button>
                            </div>
                        </div>
                    </form>
                </td>
                <td>$
                    <?php echo isset($product["price"]) && isset($product["quantity"]) ? (float) $price * (int) $product["quantity"] : 0; ?>
                </td>
                <td>
                    <form method="post" action="remove-from-cart.php">
                        <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
                        <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
    <tfoot>
        <tr>
            <th colspan="3" class="text-right">Total:</th>
            <td colspan="2">
                <?php echo "Total: $" . strval($total_price);
                ?>
            </td>
        </tr>
    </tfoot>
</table>
</div>
</div>

<?php include_once "footer.php"; ?>
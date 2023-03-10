<?php
// Start the session
session_start();

// Array of products
$page_title = "Cheap Clothes";
$products = array(
    array(
        "name" => "Men's T-Shirt",
        "description" => "A comfortable and stylish t-shirt for men.",
        "price" => "$19.99",
        "image" => "./900x700.png",
        "id" => "1"
    ),
    array(
        "name" => "Women's Dress",
        "description" => "A beautiful and elegant dress for women.",
        "price" => "$39.99",
        "image" => "./900x700.png",
        "id" => "2"
    ),
    array(
        "name" => "Men's Jeans",
        "description" => "A classic pair of jeans for men.",
        "price" => "$29.99",
        "image" => "./900x700.png",
        "id" => "3"
    ),
    array(
        "name" => "Women's Skirt",
        "description" => "A trendy and comfortable skirt for women.",
        "price" => "$24.99",
        "image" => "./900x700.png",
        "id" => "4"
    ),
    array(
        "name" => "Supreme Brick",
        "description" => "A brick with engraving of \"Supreme\"",
        "price" => "$299.99",
        "image" => "./900x700.png",
        "id" => "5"
    ),
    array(
        "name" => "Gold plated T-Shirt",
        "description" => "A true piece of art.",
        "price" => "$2400.99",
        "image" => "./900x700.png",
        "id" => "6"
    ),
);

// Check if the "Add to Cart" button was clicked
if (isset($_POST['add_to_cart'])) {
    // Get the product ID
    $product_id = $_POST['product_id'];

    // Check if the product ID is valid
    if (isset($products[$product_id - 1])) {
        // Get the product details
        $product = $products[$product_id - 1];

        // Add the product to the cart
        $_SESSION['cart_items'][] = $product;

        // Redirect to the cart page
        header("Location: cart.php");
        exit;
    }
}

// Include header
include("header.php");
?>
<link rel="stylesheet" href="style.css">
<style type="text/css">
    body {
        background-image: url(background.png);

    }

    .jumbotron {
        position: relative;
        overflow: hidden;
        background-color: #f8f9fa;
    }

    .jumbotron h1 {
        position: absolute;
        top: 50%;
        left: 0%;
        transform: translate(-100%, -50%);
        animation: moveText 20s linear infinite;
    }

    .card.shadow:hover {
        box-shadow: none;
    }


    @keyframes moveText {
        0% {
            transform: translate(-100%, -50%);
        }

        100% {
            transform: translate(400%, -50%);
        }
    }
        .topper {
            background-color: #e6f7ff;
            /* light blue color */
            animation: color-transition 15s ease-in-out infinite alternate;
            /* add a color transition animation */
        }

        @keyframes color-transition {
            0% {
                background-color: #a1c3e5;
                /* start with a light blue color */
            }

            50% {
                background-color: #b3d9ff;
                /* transition to a darker blue color */
            }

            100% {
                background-color: #a1c3e5;
                /* return to the light blue color */
            }
        }
    }
</style>

<div class="jumbotron jumbotron-fluid ">
    <div class="container">
        <h1 class="rounded-4 p-2" style="background-color:#f0ffff;border: 2px solid #a1c3e5;">Everything is meant for you!</h1>
    </div>
</div>

<div class="container mt-4">
    <div id="carouselExampleIndicators" style="margin-bottom: 60px;" class="carousel slide shadow" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="./1200x600.png" class="d-block w-100" alt="Image 1">
            </div>
            <div class="carousel-item">
                <img src="./1200x600.png" class="d-block w-100" alt="Image 2">
            </div>
            <div class="carousel-item">
                <img src="./1200x600.png" class="d-block w-100" alt="Image 3">
            </div>
            <div class="carousel-item">
                <img src="./1200x600.png" class="d-block w-100" alt="Image 4">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <p clasS="text-center" style="font-size:40px;border: 2px solid #a1c3e5; background-color:#f0ffff;">Featured Items</p>
    <div class="row">
        <?php foreach ($products as $key => $product): ?>
            <div class="col-md-4 mb-4">
                <div class="card shadow">
                    <img src="<?php echo $product['image']; ?>" class="card-img-top rounded"
                        alt="<?php echo $product['name']; ?>">
                    <div class="card-body">
                        <h5 class="card-title">
                            <?php echo $product['name']; ?>
                        </h5>
                        <p class="card-text">
                            <?php echo $product['description']; ?>
                        </p>
                        <p class="card-text font-weight-bold">
                            <?php echo $product['price']; ?>
                        </p>
                        <form action="index.php" method="post">
                            <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                            <input type="hidden" name="name" value="<?php echo $product['name']; ?>">
                            <input type="hidden" name="price" value="<?php echo $product['price']; ?>">
                            <input type="hidden" name="image" value="<?php echo $product['image']; ?>">
                            <button type="submit" name="add_to_cart" class="btn btn-primary">Add to Cart</button>
                            <input type="number" name="quantity" value="1" min="1" max="10">

                        </form>

                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?php
// Include footer
include("footer.php");
?>
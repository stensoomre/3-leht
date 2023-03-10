<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php echo $page_title; ?>
    </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="favicon.ico">

</head>

<body>
    <div class="fluid-container p-3 text-center topper" style="width:100%; background-color: #00BFFF;border: 2px solid #a1c3e5;">
        <b style="color: white; font-size: 20px;">Get everything what you ever wanted here!</b>
    </div>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <img src="favicon.ico" style="width:30px;" alt="logo">

            <a class="navbar-brand" href="./index.php">My Clothes Website</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">

                    <form class="d-flex">
                        <input class="form-control me-1" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-success me-4" type="submit"><i class="fas fa-search"></i></button>
                    </form>
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-user"></i> Login
                        </a>
                        <div class="dropdown-menu p-3" aria-labelledby="navbarDropdown" style="min-width: 300px;">
                            <form>
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" class="form-control" id="username" placeholder="Enter username">
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" id="password"
                                        placeholder="Enter password">
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="remember-me">
                                    <label class="form-check-label" for="remember-me">Remember me</label>
                                </div>
                                <button type="button" class="btn btn-info btn-block mt-3">Login</button>
                                <a href="#" class="text-muted mt-2 d-block">Forgot your password?</a>
                            </form>
                        </div>
                    </li>


                    <li class="nav-item">
                        <a class="nav-link" href="cart.php">
                            <i class="fas fa-shopping-cart"></i> Cart
                            <?php
                            if (isset($_SESSION['cart'])) {
                                $count = count($_SESSION['cart_items']);
                                echo "<span class=\"badge badge-pill badge-danger\">$count</span>";
                            } else {
                                echo "<span class=\"badge badge-pill badge-danger\">0</span>";
                            }
                            ?>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>

</body>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
    crossorigin="anonymous"></script>
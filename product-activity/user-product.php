<?php 
session_start();
if(!isset($_SESSION['userId'])) {
    header("location: user-login.php"); 
    exit; 
}
include("config.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- favicon -->
	<link rel="icon" type="image/x-icon" href="assets/favicon.ico">
    <link rel="stylesheet" href="user-product.css">
    <title>Hany Store</title>
</head>
<body>
    <div id = "nav_bar">
        <div id = "logo-bar">
            <img src = "assets/logo.jpg" alt = "logo" id = "logo">
            <h3>Hany Store</h3>
        </div>

        <div id = "btn-container">
            <button id="home" class="btn">
                <a class = "button" href="http://localhost/product-activity/user-product.php">Products</a>
            </button>

            <button id="service" class="btn">
                <a class = "button" href=" ">Categories</a>
            </button>

            <button id="product" class="btn">
                <a class = "button" href=" ">About Us</a>
            </button>

            <button id="logout" class="btn">
                <a class = "button" href="http://localhost/product-activity/logout.php">Logout</a>
            </button>

            <button class="cart">
                <a class = "trolley" href="http://localhost/product-activity/user-cart.php"><img id = "cart" src = "assets/shopping-cart.png" alt = "cart"></a>
            </button>

            <button class="user">
                <a class = "pfp" href=" "><img id = "profile" src = "assets/pfp.png" alt = "user"></a>
            </button>
        </div>
    </div>
    
    <?php
        $dir = "assets";

        $sql = "select * from items";
		$run = mysqli_query($mysqli, $sql);
    ?>

    <div id = "content">
        <div id = "search-bar">
            <input type="text" name="search" placeholder="Search" id="search-field"/>
            <button id="search-btn" class="btn2"><img src = "assets/search.png" alt = "search" id = "search"></button>
        </div>

        <div class = "container">
            <div class="carousel">
                <div class="image-container" id="imgs">
                    <img class="pics" src="assets/display-one-piece.jpg" alt="img">
                    <img class="pics" src="assets/1.jpg" alt="img">
                    <img class="pics" src="assets/2.jpg" alt="img">
                    <img class="pics" src="assets/3.jpg" alt="imgl">
                    <img class="pics" src="assets/4.jpg" alt="img">
                </div>
            </div>
                
            <div id = "pic-box">
                <img class="pic" src="assets/display-fairy-tail.jpg" alt="img">
                <img class="pic" src="assets/display-doraemon.jpg" alt="img">
            </div>
        </div>   
    </div>

    <div class = "product-container">
        <h2>Products</h2>

        <div class = "products">
            <?php
                while($row = mysqli_fetch_assoc($run)) {
                    $itemId = $row['id'];
            ?>
            <div class = "item-container">
                <?php echo "<img class=\"item\" src=\"$dir/{$row['image']}\" alt=\"img\">"; ?>
                <div class = "details">
                    <p class = "info" id = "price"><?php echo $row['price']; ?></p>
                    <div class = "data">
                        <p class = "info" id = "name"><?php echo $row['name']; ?></p>
                        <p class = "info" id = "quanti"><?php echo $row['quantity']; ?></p>
                    </div>
                </div>
                <div class = "action">
                    <button id="add-cart-btn" class="btns"><img src = "assets/add-to-cart.png" alt = "img" class = "icon"><a class = "text" id = "addcart" href="http://localhost/product-activity/product-description.php?itemId=<?php echo $itemId; ?>">Add to Cart</a></button>
                    <button id="buy-btn" class="btns"><img src = "assets/coin.png" alt = "img" class = "icon"><a class = "text" id = "buynow" href="http://localhost/product-activity/product-description.php?itemId=<?php echo $itemId; ?>">Buy Now</a></button>
                </div>
            </div>
            <?php                   
                    }
                ?>
    <!-- javascript -->
    <script src="user-product.js"></script>
</body>
</html>
<?php 
session_start();
if(!isset($_SESSION['userId'])) {
    header("location: user-login.php"); 
    exit; 
}
include("config.php");

$id = $_GET['itemId'];
$sql = "SELECT * FROM items WHERE id = '$id'";
$run = mysqli_query($mysqli, $sql);
$row = mysqli_fetch_assoc($run);

$id = $row['id'];
$name = $row['name'];
$description = $row['description'];
$price = $row['price'];
$stock = $row['quantity'];
$file = $row['image'];

$dir = "assets";

$userId = $_SESSION['userId'];
$sqlQuery = "SELECT * FROM login WHERE id = '$userId'";
$run2 = mysqli_query($mysqli, $sqlQuery);
$row2 = mysqli_fetch_assoc($run2);

$userId = $row['id'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico">
    <link rel="stylesheet" href="product-description.css">
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

    <div class="signup">
        <h2>Product Description</h2>
        
        <form id="form_container" enctype="multipart/form-data" action="addcart-process.php?itemId=<?php echo $id; ?>" method="POST">
            <div class="container">
                
                <div>
                    <div class="image-container">
                        <?php echo "<img class=\"item\" src=\"$dir/{$file}\" alt=\"img\">"; ?>
                        <input type="hidden" name="current_file" value="<?php echo $file; ?>"/>
                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <input type="hidden" name="userId" value="<?php echo $userId; ?>"/>
                    </div>
                </div>

                <div class="form_container">
                    <div class="field-container">
                        <label for="name">Name:</label>
                        <input type="text" name="name" id="name" value="<?php echo $name; ?>" required/>
                    </div>

                    <div class="field-container">
                        <label for="description">Description:</label>
                        <textarea class="area" name="description" id="description" rows="4" required><?php echo htmlspecialchars($description); ?></textarea>
                    </div>                

                    <div class="field-container">
                        <label for="price">Price:</label>
                        <input type="text" name="price" id="price" value="<?php echo $price; ?>" required/>
                    </div>
                    
                    <div class="field-container">
                        <label for="quantity">Quantity:</label>
                        <input type="number" name="quantity" id="quantity" placeholder="0" required/>
                        <input type="hidden" name="stock" value="<?php echo $stock; ?>"/>

                        <?php
                        if (isset($_GET['error'])) {
                            $errorMessage = $_GET['error'];
                            echo "<p style='color: red; font-size: .7vw;'>Error: $errorMessage</p>";
                        }
                        ?>
                    </div>

                    <div class="button-container">
                        <button type="submit" name="submit" id="register" class="add-to-cart">ADD TO CART</button>
                    </div>   
                </div>
            </div>
        </form> 
    </div>     
</body>
</html>

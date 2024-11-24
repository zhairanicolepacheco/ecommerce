<?php 
session_start();
if(!isset($_SESSION["login"])) {
    header("location: admin-login.php"); 
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
    <link rel="stylesheet" href="user-cart.css">
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
                <a class = "button" href="http://localhost/product-activity/admin-product.php">Products</a>
            </button>

            <button id="service" class="btn">
                <a class = "button" href="http://localhost/product-activity/admin-track-orders.php">Orders</a>
            </button>

            <button id="product" class="btn">
                <a class = "button" href="http://localhost/product-activity/admin-history.php">History</a>
            </button>

            <button id="logout" class="btn">
                <a class = "button" href="http://localhost/product-activity/logout.php">Logout</a>
            </button>

            <button class="user">
                <a class = "pfp" href=" "><img id = "profile" src = "assets/pfp.png" alt = "user"></a>
            </button>
        </div>
    </div>
    
    <?php
        $dir = "assets";

        $sql = "select * from cart where status = 'added to cart'";
		$run = mysqli_query($mysqli, $sql);
    ?>

    <div class = "product-container">
        <form id="form-container" enctype="multipart/form-data" action="checkout-process.php" method="POST">
            <div class = "box">
                <h2>Track Orders</h2>
            </div>
            <div class = "products">
                <table>
                    <tr>
                        <th></th>
                        <th>CLIENT</td>
                        <th>PRODUCT NAME</td>
                        <th>PRICE</th>
                        <th>QUANTITY</th>
                        <th>STATUS</th>
                    </tr>

                    <tr>
                        <?php
                            while($row = mysqli_fetch_assoc($run)) {
                                $itemId = $row['id'];
                        ?>
                        <td class="row2"><?php echo "<img class=\"item\" src=\"$dir/{$row['image']}\" alt=\"img\">"; ?></td>
                        <td class="row3"><?php echo $row['login_id']; ?></td>
                        <td class="row4"><?php echo $row['name']; ?></td>
                        <td class="row5"><?php echo $row['price']; ?></td>
                        <td class="row6"><?php echo $row['quantity']; ?></td>
                        <td class="row7"><?php echo $row['status']; ?></td>
                    </tr>

                    <tr>

                    </tr>    
                    <?php                   
                        }
                    ?>
                    
                </table>
            </div>
        </form>        
    </div>   

</body>
</html>
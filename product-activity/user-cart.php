<?php 
session_start();
if (!isset($_SESSION['userId'])) {
    header("location: user-login.php"); 
    exit; 
}

$userId = $_SESSION['userId'];

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
    <div id="nav_bar">
        <div id="logo-bar">
            <img src="assets/logo.jpg" alt="logo" id="logo">
            <h3>Hany Store</h3>
        </div>

        <div id="btn-container">
            <button id="home" class="btn">
                <a class="button" href="http://localhost/product-activity/user-product.php">Products</a>
            </button>

            <button id="service" class="btn">
                <a class="button" href="#">Categories</a>
            </button>

            <button id="product" class="btn">
                <a class="button" href="#">About Us</a>
            </button>

            <button id="logout" class="btn">
                <a class="button" href="http://localhost/product-activity/logout.php">Logout</a>
            </button>

            <button class="cart">
                <a class="trolley" href="#"><img id="cart" src="assets/shopping-cart.png" alt="cart"></a>
            </button>

            <button class="user">
                <a class="pfp" href="#"><img id="profile" src="assets/pfp.png" alt="user"></a>
            </button>
        </div>
    </div>

    <?php
    $dir = "assets";
    $totalPrice = 0;

    // Use prepared statements to prevent SQL injection
    $stmt = $mysqli->prepare("SELECT * FROM `cart` WHERE `status` = ? AND `login_id` = ?");
    $status = 'added to cart';
    $stmt->bind_param('si', $status, $userId);
    $stmt->execute();
    $result = $stmt->get_result();
    ?>

    <div class="product-container">
        <form id="form-container" enctype="multipart/form-data" action="checkout-process.php" method="POST">
            <div class="box">
                <h2>Shopping Cart</h2>
            </div>
            <div class="products">
                <table>
                    <tr>
                        <th></th>
                        <th>NAME</th>
                        <th>PRICE</th>
                        <th>QUANTITY</th>
                        <th>DELETE</th>
                    </tr>

                    <?php
                    while ($row = $result->fetch_assoc()) {
                        $itemId = $row['id'];
                        $itemTotal = $row['price'] * $row['quantity'];
                        $totalPrice += $itemTotal;
                    ?>
                        <tr>
                            <td class="row2"><?php echo "<img class=\"item\" src=\"$dir/{$row['image']}\" alt=\"img\">"; ?></td>
                            <td class="row3"><?php echo $row['name']; ?></td>
                            <td class="row4"><?php echo $row['price']; ?></td>
                            <td class="row5"><?php echo $row['quantity']; ?></td>
                            <td class="row6"><a id="delete" href="http://localhost/product-activity/delete-cart.php?deleteId=<?php echo $itemId; ?>">-</a></td>
                        </tr>
                        <input type="hidden" name="ids[]" value="<?php echo $itemId; ?>">
                        <input type="hidden" name="names[]" value="<?php echo $row['name']; ?>">
                        <input type="hidden" name="quantities[]" value="<?php echo $row['quantity']; ?>">
                    <?php } ?>
                    
                    <tr>
                        <td colspan="3"></td>
                        <td><strong>Total:</strong></td>
                        <td><?php echo $totalPrice; ?></td>
                    </tr>

                </table>
            </div>
            <div class="box">
                <button type="submit" id="add-btn"><img src="assets/add.png" alt="add-item" id="add"><p>Place Order</p></button>
            </div>
        </form>
    </div>

</body>

</html>

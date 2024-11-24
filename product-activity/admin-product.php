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
    <link rel="stylesheet" href="admin-product-style.css">
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
        <div id = "box">
            <h2>Products</h2>
            <button id = "add-btn"><img src = "assets/add.png" alt = "add-item" id = "add"><a href="add-page.php">add item</a></button>
        </div>
        
        <div class = "products">
            <table>
                <tr>
                    <th>IMAGE</th>
                    <th>NAME</td>
                    <th>PRICE</th>
                    <th>QUANTITY</th>
                    <th>ACTIONS</th>
                </tr>

                <tr>
                    <?php
                        while($row = mysqli_fetch_assoc($run)) {
                            $itemId = $row['id'];
                    ?>
                    <td class="row2"><?php echo "<img class=\"item\" src=\"$dir/{$row['image']}\" alt=\"img\">"; ?></td>
                    <td class="row3"><?php echo $row['name']; ?></td>
                    <td class="row4"><?php echo $row['price']; ?></td>
                    <td class="row5"><?php echo $row['quantity']; ?></td>
                    <td class="row6">
                        <button class="btns" id="pencil">
                            <a href="http://localhost/product-activity/update-page.php?itemId=<?php echo $itemId; ?>">
                                <img id = "edit" src="assets/pencil.png" alt="edit-item">
                            </a>
                        </button>
                        <button class="btns" id="trash">
                            <a href="http://localhost/product-activity/delete-process.php?deleteId=<?php echo $itemId; ?>">
                                <img id = "delete" src="assets/trash.png" alt="delete-item">
                            </a>
                        </button>
                    </td>
                </tr>
                <?php                   
                    }
                ?>
                
            </table>
        </div>    
    </div>   

    <div>

    </div>

    <!-- javascript -->
    <script src="user-product.js"></script>
</body>
</html>
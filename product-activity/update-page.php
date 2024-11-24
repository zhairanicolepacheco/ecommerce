<?php 
session_start();

include("config.php");

$id = $_GET['itemId'];
$sql = "SELECT * FROM items WHERE id = '$id'";
$run = mysqli_query($mysqli, $sql);
$row = mysqli_fetch_assoc($run);

$name = $row['name'];
$description = $row['description'];
$price = $row['price'];
$stock = $row['quantity'];
$file = $row['image'];

$dir = "assets";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico">
    <link rel="stylesheet" href="register-style.css">
    <title>Hany Store</title>
</head>
<body>
    <img src="assets/logo.jpg" alt="logo" id="logo">
    <div class="signup">
        <h2>Edit Item</h2>
        
        <form id="form_container" enctype="multipart/form-data" action="update-process.php?itemId=<?php echo $id; ?>" method="POST">
            <div class="container">
                
                <div class="image-container">
                    <?php echo "<img class=\"item\" src=\"$dir/{$file}\" alt=\"img\">"; ?>
                </div>

                <div class="field-container">
                    <label for="name">Update Product Name:</label>
                    <input type="text" name="name" placeholder="Enter Name of Product" id="name" value="<?php echo $name; ?>" required/>
                </div>

                <div class="field-container">
                    <label for="description">Update Product Description:</label>
                    <textarea class="area" name="description" id="description" rows="4" required><?php echo htmlspecialchars($description); ?></textarea>
                </div>                

                <div class="field-container">
                    <label for="price">Update Product Price:</label>
                    <input type="text" name="price" placeholder="Enter Price of Product" id="price" value="<?php echo $price; ?>" required/>
                </div>
                
                <div class="field-container">
                    <label for="stock">Update Number of Stocks:</label>
                    <input type="text" name="stock" placeholder="Enter Number of Stocks" id="stock" value="<?php echo $stock; ?>" required/>
                </div>

                <div class="field-container">
                    <label for="file">Update Product Image File:</label>
                    <input type="file" name="file" id="file"/>
                    <input type="hidden" name="current_file" value="<?php echo $file; ?>"/>
                </div>

                <div class="button-container">
                    <button type="submit" name="submit" id="register" class="btn">UPDATE</button>
                </div>   
            </div>
        </form> 
    </div>     
</body>
</html>

<?php 
session_start();
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
    <img src = "assets/logo.jpg" alt = "logo" id = "logo">
    <div class = "signup">
        <h2>Add Item</h2>
        
        <form id="form_container" enctype="multipart/form-data" action="add-process.php" method="POST">
            <div class="container">
                <div class="field-container">
                    <input type="text" name="name" placeholder="Enter Name of Product" id="name" required/>
                </div>

                <div class="field-container">
                    <textarea class="area" name="description" placeholder="Enter Product Description" id="description" rows="4" required></textarea>
                </div>
        
                <div class="field-container">
                    <input type="text" name="price" placeholder="Enter Price of Product" id="price" required/>
                </div>
                
                <div class="field-container">
                    <input type="text" name="stock" placeholder="Enter Number of Stocks" id="stock" required/>
                </div>
        
                <div class="field-container">
                    <input type="file" name="file" id="file" required/>
                </div>
        
                <div class="button-container">
                    <button type="submit" id="register" class="btn">ADD</button>
                </div>   
            </div>
        </form>
        
    </div>     
</body>
</html>
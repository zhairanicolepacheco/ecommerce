<?php
include("config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{ 
    $name = $_POST["name"];
    $description = $_POST["description"];
    $price = $_POST["price"];
    $stock = $_POST["stock"];
    $file = $_FILES["file"];
    $errors = [];
    
    if (empty($name)) {
        $errors[] = "Name is required.";
    }

    if (empty($description)) {
        $errors[] = "Description is required.";
    }

    if (empty($price)) {
        $errors[] = "Price is required.";
    }
    
    if (empty($stock)) {
        $errors[] = "Number of Stocks is required.";
    }

    if (empty($file['name'])) {
        $errors[] = "File/image is required.";
    }

    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo $error . "<br>";
        }
    } 
    else {
        $target_dir = "assets/";
        $target_file = $target_dir . basename($file["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        $check = getimagesize($file["tmp_name"]);
        if($check === false) {
            echo "File is not an image.";
            $uploadOk = 0;
        }

        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }

        if ($file["size"] > 5000000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }

        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }

        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        } else {
            if (move_uploaded_file($file["tmp_name"], $target_file)) {
                $insert = "INSERT INTO items (name, description, price, quantity, image) VALUES ('$name', '$description', '$price', '$stock', '".basename($file["name"])."')";
                mysqli_query($mysqli, $insert);
                echo "<script>alert('ITEM ADDED SUCCESSFULLY!');
                window.location = 'admin-product.php';</script>";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }
}  
?>

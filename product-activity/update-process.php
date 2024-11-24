<?php 
session_start();
include("config.php");

$id = $_GET['itemId'];
$sql = "SELECT * FROM items WHERE id = '$id'";
$run = mysqli_query($mysqli, $sql);

if ($run && mysqli_num_rows($run) > 0) {
    $row = mysqli_fetch_assoc($run);

    $name = $row['name'];
    $description = $row['description'];
    $price = $row['price'];
    $stock = $row['quantity'];
    $file = $row['image'];
} else {
    echo "<script>alert('Item not found!'); window.location = 'admin-product.php';</script>";
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $description = $_POST["description"];
    $price = $_POST["price"];
    $stock = $_POST["stock"];
    $current_file = $_POST["current_file"];
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

    $uploadOk = 1;
    $file_name = $current_file;

    if (!empty($file['name'])) {
        $target_dir = "assets/";
        $target_file = $target_dir . basename($file["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        $check = getimagesize($file["tmp_name"]);
        if ($check === false) {
            $errors[] = "File is not an image.";
            $uploadOk = 0;
        }

        if (file_exists($target_file)) {
            $errors[] = "Sorry, file already exists.";
            $uploadOk = 0;
        }

        if ($file["size"] > 5000000) {
            $errors[] = "Sorry, your file is too large.";
            $uploadOk = 0;
        }

        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            $errors[] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }

        if ($uploadOk == 1) {
            if (move_uploaded_file($file["tmp_name"], $target_file)) {
                $file_name = basename($file["name"]);
            } else {
                $errors[] = "Sorry, there was an error uploading your file.";
                $uploadOk = 0;
            }
        }
    }

    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo $error . "<br>";
        }
    } else {
        $update = "UPDATE items SET name='$name', description='$description', price='$price', quantity='$stock', image='$file_name' WHERE id='$id'";
        mysqli_query($mysqli, $update);
        echo "<script>alert('ITEM UPDATED SUCCESSFULLY!');
        window.location = 'admin-product.php';</script>";
    }
}
?>

<?php 
session_start();
include("config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ids = $_POST["ids"];
    $names = $_POST["names"];
    $quantities = $_POST["quantities"];

    $status = "checked out";

    foreach ($ids as $key => $id) {
        $updateCartStatus = "UPDATE cart SET status = '$status' WHERE id='$id'";
        mysqli_query($mysqli, $updateCartStatus);
        
        if (!empty($quantities[$key]) && !empty($names[$key])) {
            $quantity = $quantities[$key];
            $name = $names[$key];
            
            $updateItemQuantity = "UPDATE items SET quantity = quantity - '$quantity' WHERE name = '$name'";
            mysqli_query($mysqli, $updateItemQuantity);
        }
    }

    echo "<script>alert('ITEMS CHECKED OUT SUCCESSFULLY!');
    window.location = 'user-product.php';</script>";
}
?>

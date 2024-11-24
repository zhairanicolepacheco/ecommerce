<?php 
session_start();
include("config.php");

if (!isset($_SESSION['userId'])) {
    header("location: user-login.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userId = $_SESSION['userId'];
    $id = $_POST["id"];
    $name = $_POST["name"];
    $description = $_POST["description"];
    $price = $_POST["price"];
    $stock = $_POST["stock"];
    $current_file = $_POST["current_file"];
    $inputQuantity = $_POST['quantity'];
    $errors = [];

    if ($inputQuantity < 0) {
        header("Location: product-description.php?itemId=$id&error=Quantity cannot be negative!");
        exit();
    } elseif ($inputQuantity > $stock) {
        header("Location: product-description.php?itemId=$id&error=Quantity exceeds available stock!");
        exit();
    } else {
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

        $file_name = $current_file;
        $status = "added to cart";

        if (!empty($errors)) {
            $errorString = implode('<br>', $errors);
            header("Location: product-description.php?itemId=$id&error=$errorString");
            exit();
        } else {
            $stmt = $mysqli->prepare("INSERT INTO cart (login_id, name, description, price, quantity, image, status) VALUES (?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param('isssiss', $userId, $name, $description, $price, $inputQuantity, $file_name, $status);

            if ($stmt->execute()) {
                echo "<script>alert('ITEM ADDED TO CART SUCCESSFULLY!');
                window.location = 'user-cart.php';</script>";
            } else {
                echo "Error: " . $stmt->error;
            }

            $stmt->close();
        }
    }
}
?>

<?php
session_start();
include("config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($mysqli, $_POST['un']);
    $password = mysqli_real_escape_string($mysqli, $_POST['psw']);

    $query = "SELECT * FROM login WHERE username='$username' AND password='$password'";
    $result = mysqli_query($mysqli, $query);

    $fetch = mysqli_fetch_array($result);

    if ($result && mysqli_num_rows($result) == 1) {
        $_SESSION['userId'] = $fetch['id'];
        header("location: user-product.php");
        exit;
    } else {
        header("location: user-login.php?err=1");
        exit;
    }
}
?>
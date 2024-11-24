<?php
include("config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{ 
    $email = $_POST["email"];
    $contact = $_POST["num"];
    $un = $_POST["un"];
    $psw = $_POST["psw"];
    $errors = [];
    
    if (empty($email)) {
        $errors[] = "Email is required.";
    }

    $emailDuplicate = "SELECT email FROM login WHERE email = '$email'";
    $emailResult = mysqli_query($mysqli, $emailDuplicate);
    $emailRows = mysqli_num_rows($emailResult);
    
    if ($emailRows > 0) {
        $errors[] = "Email has Duplicate";
    }

    if (empty($contact)) {
        $errors[] = "Contact is required.";
    }
    
    if (empty($un)) {
        $errors[] = "Username is required.";
    }

    $usernameDuplicate = "SELECT username FROM login WHERE username = '$un'";
    $usernameResult = mysqli_query($mysqli, $usernameDuplicate);
    $usernameRows = mysqli_num_rows($usernameResult);
        
    if ($usernameRows > 0) {
        $errors[] = "Username has Duplicate";
    }

    if (empty($psw)) {
        $errors[] = "Password is required.";
    }

    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo $error . "<br>";
        }
    } 
    else {
        $insert = "INSERT INTO login VALUES ('', '$email', '$contact',
        '$un', '$psw')";

        mysqli_query($mysqli, $insert);
        echo "<script>alert('SIGN UP COMPLETE!');
        window.location = 'user-login.php';</script>";
    }
}  
?>
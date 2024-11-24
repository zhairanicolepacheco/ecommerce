<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico">
    <link rel="stylesheet" href="login-style.css">
    <title>Hany Store</title>
</head>

<body>
    <img src = "assets/logo.jpg" alt = "logo" id = "logo">
    <div class = "login">
        <h2>LOGIN</h2>
        <div id = "option">
             <h3 id = "signIn">Sign in or </h3>
             <a href="http://localhost/product-activity/user_register.php"><h3 id = "noAcc"> Create Account</h3></a>
        </div>

       
        <form id = "form_container" action="user-loginprocess.php" method="POST">
            <div class = "container">
                <div class="field-container" id="username">
                    <input type="text" name="un" placeholder="Username" id="un"/>
                </div>

                <div class="field-container" id="password">
                    <input type="password" name="psw" placeholder="Password" id="psw"/>
                </div>

                <?php 
                if(isset($_REQUEST["err"]))
                    $msg="Invalid username or Password";
                ?>

                <p style="color:red;">
                    <?php if(isset($msg))
                    {
                        echo $msg;
                    }
                    ?>
                </p>

                <div class="button-container">
                    <button id="login" class="btn">LOG IN</button>
                    <div id = "option">
                        <h3 id = "logIn">Login as </h3>
                        <a href="http://localhost/product-activity/admin-login.php"><h3 id = "admin"> Admin</h3></a>
                   </div>
                </div> 
            </div>  
        </form> 
    </div>    
</body>
</html>
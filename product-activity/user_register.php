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
        <h2>REGISTRATION FORM</h2>
        <h3 id = "signIn">By signing up, you agree to Hany Store's </h3>
        <div id = "option">
            <a href=" "><h3 id = "noAcc"> Terms of Service</h3></a>
            <h3 id = "and">&</h3>
            <a href=" "><h3 id = "noAcc"> Privacy Policy</h3></a>
       </div>
        
        <form id = "form_container" action="user_process.php" method="POST">
            <div class = "container">
                <div class="field-container">
                    <input type="text" name="email" placeholder="Enter Email Address" id="email"/>
                </div>

                <div class="field-container">
                    <input type="text" name="num" placeholder="Enter Contact Number" id="num"/>
                </div>
                
                <div class="field-container">
                    <input type="text" name="un" placeholder="Create Username" id="un"/>
                </div>

                <div class="field-container">
                    <input type="password" name="psw" placeholder="Create Password" id="psw"/>
                </div>

                <div class="button-container">
                    <button id="register" class="btn">REGISTER NOW</button>
                    <div id = "option">
                        <h3 id = "logIn">Have an Account? </h3>
                        <a href="http://localhost/product-activity/user-login.php"><h3 id = "user"> Login</h3></a>
                   </div>
                </div>   
            </div>
        </form> 
    </div>     
</body>
</html>
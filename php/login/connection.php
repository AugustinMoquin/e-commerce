<html lang="en">
<?php
$bdd = new PDO('mysql:host=127.0.0.1;dbname=e-commerce','root','root');
require ("registertest.php");

?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/e-commerce/php/login/assets/style.css">
    <title>Login and Register</title>
</head>

<body>
    <div class="hero">
        <div class="form-box">
            <div class="button-box">
                <div id="btn"></div>
                <button type="button" class="toggle-btn" onclick="login()">Log In</button>
                <button type="button" class="toggle-btn" onclick="register()">Register</button>
            </div>
            <div class="social-icons">
                <img src="/cli/assets/img/fb.png"  alt="img">
                <img src="/cli/assets/img/gp.png" alt="img">
                <img src="/cli/assets/img/tw.png" alt="img">
            </div>
            <form id="login" class="input-group"  method="POST" >
                <input type="text" class="input-field" placeholder="User Id" name="username" required>
                <input type="password" class="input-field" placeholder="Enter Password" name="passwd" required>
                <input type="submit" class="submit-btn" name="formconnexion" 
                action="/e-commerce/php/login/registertest.php" ></input>
            </form>
            <form id="register" class="input-group"  method="POST" >
                <input type="text" class="input-field" placeholder="User Id" name="username" required>
                <input type="email" class="input-field" placeholder="Email Id" name="email" required>
                <input type="password" class="input-field" placeholder="Enter Password" name="passwd" required>
                <input type="password" class="input-field" placeholder="Confirm Password" name="passwd2" required>
                <input type="submit" class="submit-btn"  name="forminscription" 
                action="/e-commerce/php/login/registertest.php"></input>
            </form>
            <div class="err">
              <?php 
              if (isset($message))
                echo $message;
              ?>
            </div>

        </div>
    </div>
    <script>
        var x = document.getElementById("login");
        var y = document.getElementById("register");
        var z = document.getElementById("btn");

        function register() {
            x.style.left = "-400px";
            y.style.left = "50px";
            z.style.left = "110px";
        }

        function login() {
            x.style.left = "50px";
            y.style.left = "450px";
            z.style.left = "0px";
        }
    </script>
</body>

</html>
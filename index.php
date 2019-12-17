<?php

require "functions.php";

$connection = getConnection();
$database = [];
$result = mysqli_query($connection, "SHOW DATABASES");
if ($result) {
    $database = mysqli_fetch_all($result, MYSQLI_ASSOC);
    if (!in_array("colorambo-evoluzione", $database)) {
        header("Location: installazione.php");
        mysqli_close();
        die();
    }
}
mysqli_close();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700,700i&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Colorambo evoluzione</title>
</head>

<body>

    <!-- Hamburger menu -->
    <input type="checkbox" id="navi-toggle" class="checkbox" />
    <label for="navi-toggle" class="button">
        <span class="icon">&nbsp;</span>
    </label>
    <div class="background">&nbsp;</div>
    <nav class="nav">
        <div class="signIn">
            <div class="left">
                <form action="#">
                    <h1>Sign in</h1>
                    <input type="email" placeholder="Your email"/>
                    <input type="password" placeholder="Your password"/>
                    <a href="#">Forgot your password?</a>
                    <button class="buttonSignIn">Log In</button>
                </form>
            </div>
            <div class="right"></div>
                <div class="immagine">
                    <div class="immagineLog"><button class="buttonSignUp">Sign up</button></div>
                </div>
        </div>
    </nav>
    
    <!-- Footer -->
    <div class="footer">
        <div class="company"></div>
        <div class="copyright">© 2019 Copyright</div>
        <div class="social-icon">
            <ul class="ulFooter">
                <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
            </ul>
        </div>
    </div>

    <script src="main.js"></script>
</body>

</html>

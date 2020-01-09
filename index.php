<?php

// require "functions.php";

// $connection = getConnection();
// $database = [];
// $result = mysqli_query($connection, "SHOW DATABASES");
// if ($result) {
//     $database = mysqli_fetch_all($result, MYSQLI_ASSOC);
//     if (!in_array("colorambo_evoluzione", $database)) {
//         header("Location: installazione.php");
//         mysqli_close();
//         die();
//     }
// }
// mysqli_close();

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
    <!-- Prima parte (parte che si vede subito) -->
    <div class="prima_parte">
        <img src="images/colorambo.png" alt="Logo" class="immagine_logo">
        <a href="signIn.html"><button class="btn">Accedi</button></a>
        <a href="signOut.html"><button class="btn1">Registrati</button></a>
    </div>
    
    <!-- Seconda parte -->
    <div class="seconda_parte">
        <div class="riga_1_esagoni">
            <div class="esagono rosso"></div>
            <div class="esagono verde"></div>
            <div class="esagono giallo"></div>
            <div class="esagono blu"></div>
            <div class="esagono tronco"></div>
        </div>
        <div class="riga_2_esagoni">
            <div class="esagono catrame_scuro"></div>
            <div class="esagono cobalto"></div>
            <div class="esagono crema"></div>
            <div class="esagono cremisi"></div>
        </div>
        <div class="riga_3_esagoni">
            <div class="esagono rosso"></div>
            <div class="esagono verde"></div>
            <div class="esagono giallo"></div>
            <div class="esagono blu"></div>
            <div class="esagono tronco"></div>
        </div>
        <div class="riga_4_esagoni">
            <div class="esagono catrame_scuro"></div>
            <div class="esagono cobalto"></div>
            <div class="esagono crema"></div>
            <div class="esagono cremisi"></div>
        </div>
    </div>

    <!-- Footer-->
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

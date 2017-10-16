
<?php
session_start();
require("dba.php");
//login check

if(!isset($_SESSION['login'])){
    if (isset($_REQUEST['login']) && isset($_REQUEST['password'])) {
        //Benutzer verifikation
        $login = mysqli_real_escape_string($my_db, htmlentities($_REQUEST['login']));
        $pas = mysqli_real_escape_string($my_db, htmlentities($_REQUEST['password']));
        $sql = "SELECT * FROM benutzer WHERE username='" . $login . "'";
        $res = mysqli_query($my_db, $sql);
        $res = mysqli_fetch_assoc($res);

        if (password_verify($pas, $res['password'])) {
            // login erfolgreich
            $sql = "SELECT username FROM benutzer WHERE username='" . $login . "'";
            $res = mysqli_query($my_db, $sql);
            $row = mysqli_fetch_array($res);
            $_SESSION['login'] = $row['username'];

            session_regenerate_id();
        } else {
            echo "Fehler";
            header("Location: index.php?error=login");
            die();
        }
    } else {
        //Weiterleitung auf log-in Seite
        header("Location: index.php");
        die();
    }
}
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Digitales Museum</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!--<link rel="stylesheet" href="./css/custom_styles.css">-->

</head>
<body>
<?php
require("navbar.php");
?>

<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
        <div class="item active">
            <img src="Cohn-2.jpg" width="60%" height="80%" style="margin:0 auto;">
        </div>

        <div class="item">
            <img src="Montessori-2.jpg"  width="60%" height="80%" style="margin:0 auto;">
        </div>

        <div class="item">
            <img src="Pappenheim-2.jpg" width="60%" height="80%" style="margin:0 auto;">
        </div>
        <div class="item">
            <img src="Winkler-2.jpg" width="60%" height="80%" style="margin:0 auto;">
        </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

</body>
</html>

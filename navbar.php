<?php
require("dba.php");
session_start();

//login check
if(!isset($_SESSION['login'])){
    if ($_REQUEST['login']!=NULL && $_REQUEST['password']!=NULL) {
        //Benutzer verifikation
        $login = mysqli_real_escape_string($my_db, htmlentities($_REQUEST['login']));
        $pas = mysqli_real_escape_string($my_db, htmlentities($_REQUEST['password']));
        $sql = "SELECT * FROM benutzer WHERE username='" . $login . "' ";
        $res = mysqli_query($my_db, $sql);
        $res = mysqli_fetch_assoc($res);

        if (strcmp($pas, $res['password'])==0) {
            // login erfolgreich
            $sql = "SELECT username FROM benutzer WHERE username='" . $login . "' ";
            $res = mysqli_query($my_db, $sql);
            $row = mysqli_fetch_array($res);
            $_SESSION['login'] = $row['username'];


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
    <title>Digitales Museum</title>

    <!-- Bootstrap -->
    <link href="./css/bootstrap.min.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">
  </head>

<body>
  <nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
      <div id="navbar" class="navbar-collapse collapse">
        <div class="navbar-header">
          <a class="navbar-brand" href="start.php">Digitales Museum</a>
        </div>
        <ul class="nav navbar-nav">
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> Personen <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="./personen.php">Persönlichkeiten</a></li>
              <li><a href="./newPerson.php">Persönlichkeit hinzufügen</a></li>
            </ul>
          </li>
          <li><a href="./zeitstrahl.php">Zeitstrahl</a></li>
          <li><a href="./kategorie.php">Kategorie</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <a class="navbar-brand" href="#">
                <?php
                if(isset($_SESSION['login'])) {
                    echo "Hallo " . $_SESSION['login'] . "! ";
                }
                ?>
            </a>
          <li><a href="index.php">Abmelden</a></li>
            <?php session_destroy(); ?>
        </ul>
      </div>
    </div>
  </nav>
</body>

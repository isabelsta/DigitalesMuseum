<!DOCTYPE html>
<html lang="de">
<head>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Die 3 Meta-Tags oben *müssen* zuerst im head stehen; jeglicher sonstiger head-Inhalt muss *nach* diesen Tags kommen -->
        <title>Person hinzufügen</title>

        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/custom.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>


    </head>

<?php
require("dba.php");
//Registrierungs logik
if(isset($_REQUEST['vorname'])&& isset($_REQUEST['nachname'])&&isset($_REQUEST['gebDat']) &&
    isset($_REQUEST['todDat']) && isset($_REQUEST['alter']) && isset($_REQUEST["zselbst"]) &&
    isset($_REQUEST['zdatum']) && isset($_REQUEST['zquelle']) && isset($_REQUEST['text']) &&
    isset($_REQUEST['kategorie']) && isset($_REQUEST['ltitel1'])&& isset($_REQUEST['lstadt1'])&&
    isset($_REQUEST['lverlag1']) && isset($_REQUEST['lauflage1']) && isset($_REQUEST['ljahr1']) &&
    isset($_REQUEST["lautor1"]) && isset($_REQUEST['lseiten1']) ){
    $vorname = mysqli_real_escape_string($my_db,htmlentities($_REQUEST['vorname']));
    $nachname = mysqli_real_escape_string($my_db,htmlentities($_REQUEST['nachname']));
    $gebDat = mysqli_real_escape_string($my_db,htmlentities($_REQUEST['gebDat']));
    $todDat = mysqli_real_escape_string($my_db,htmlentities($_REQUEST['todDat']));
    $alter = mysqli_real_escape_string($my_db,htmlentities($_REQUEST['alter']));
    $zselbst = mysqli_real_escape_string($my_db,htmlentities($_REQUEST['zselbst']));
    $zdatum = mysqli_real_escape_string($my_db,htmlentities($_REQUEST['zdatum']));
    $zquelle = mysqli_real_escape_string($my_db,htmlentities($_REQUEST['zquelle']));
    $text = mysqli_real_escape_string($my_db,htmlentities($_REQUEST['text']));
    $kategorie = mysqli_real_escape_string($my_db,htmlentities($_REQUEST['kategorie']));
    $titel = mysqli_real_escape_string($my_db,htmlentities($_REQUEST['ltitel1']));
    $stadt = mysqli_real_escape_string($my_db,htmlentities($_REQUEST['lstadt1']));
    $verlag = mysqli_real_escape_string($my_db,htmlentities($_REQUEST['lverlag1']));
    $auflage = mysqli_real_escape_string($my_db,htmlentities($_REQUEST['lauflage1']));
    $jahr = mysqli_real_escape_string($my_db,htmlentities($_REQUEST['ljahr1']));
    $autor = mysqli_real_escape_string($my_db,htmlentities($_REQUEST['lautor1']));
    $seiten = mysqli_real_escape_string($my_db,htmlentities($_REQUEST['lseiten1']));

        if(isset($_FILES['bild_daten']) && isset($_FILES['poster'])){

            $bild_daten_tmpname = $_FILES['bild_daten']['tmp_name'];
            $bild_daten_name = $_FILES['bild_daten']['name'];
            $bild_daten_type = $_FILES['bild_daten']['type'];
            $bild_daten_size = $_FILES['bild_daten']['size'];

            $poster_tmpname = $_FILES['poster']['tmp_name'];
            $poster_name = $_FILES['poster']['name'];
            $poster_type = $_FILES['poster']['type'];
            $poster_size = $_FILES['poster']['size'];

            //echo "<hr>$bild_daten_tmpname<HR>bild_daten_name: $bild_daten_name<HR>";

            if (!empty($bild_daten_tmpname)) {
                if (( $bild_daten_type == "image/gif" ) || ($bild_daten_type == "image/pjpeg") || ($bild_daten_type == "image/jpeg") || ($bild_daten_type == "image/png")) {
                    //bild einfügen
                    $dateihandle = fopen($bild_daten_tmpname, "r");
                    $bild_daten = mysqli_real_escape_string($my_db, fread($dateihandle, filesize($bild_daten_tmpname)));
                    $bild_name = mysqli_real_escape_string($my_db, $bild_daten_name);
                    $bild_type = mysqli_real_escape_string($my_db, $bild_daten_type);
                    $sql = "INSERT INTO bilder(bild_daten, bild_name, bild_typ, bild_size) VALUES('$bild_daten', '$bild_name', '$bild_type', $bild_daten_size)";
                    $res = mysqli_query($my_db, $sql) or die(mysqli_error($my_db));
                    //echo "<BR>Bild gespeichert<BR>";
                    //bild dem user zuweisen
                    $id = "SELECT ID FROM bilder WHERE bild_daten = '".$bild_daten."' AND bild_name = '".$bild_name."' AND bild_typ = '".$bild_type."' AND bild_size = '".$bild_daten_size."'";
                    $res = mysqli_query($my_db, $id) or die (mysqli_error($my_db));
                    $res = mysqli_fetch_assoc($res);
                    //echo $res['ID'];
                    $sql= "INSERT INTO persoenlichkeit (vorname, name, geb, tod, age) VALUES('".$vorname."','".$nachname."','".$gebDat."','".$todDat."','".$alter."')";
                    //echo $sql;
                    $res = mysqli_query($my_db, $sql) or die (mysqli_error($my_db));
                    echo "<div class=\"page-header\">
                    <h2>Danke für das Hinzufügen einer neuen Person!</h2>
                    </div>";

                } else {
                    echo "<BR>Die übergebenen Daten waren kein Bild-Format.<BR>";
                }
            }else {
                echo "<BR>Keine Daten übergeben.<BR>";
            }
        } else{
            echo "Bild Error!";
        }
}

?>
</html>
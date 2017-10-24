<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <link href="./css/bootstrap.min.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">
    <title>Bearbeiten</title>
</head>
<?php


require("dba.php");
$person = $_GET['PID'];
//alle infos zur person in ein array laden
$sql = "SELECT persoenlichkeit.PID, persoenlichkeit.vorname, persoenlichkeit.name, persoenlichkeit.geb, persoenlichkeit.tod,
                persoenlichkeit.age, film.FID, film.titel, film.jahr, film.dauer, film.url,
                zitat.quelle, zitat.inhalt, zitat.datum, text.TID, text.inhalt, literatur.titel, literatur.LID, literatur.stadt, literatur.verlag, 
                literatur.auflage, literatur.jahr, literatur.autor, literatur.seiten, bild.BID, bild.data, poster.POID, poster.data
                FROM persoenlichkeit, hat_medium, bild, poster, film, zitat, gehoert_zu, kategorie, text, ueber, literatur
                WHERE persoenlichkeit.PID = '".$person."'
                AND hat_medium.PID = persoenlichkeit.PID 
                AND hat_medium.BID = bild.BID
                AND hat_medium.POID = poster.POID
                AND hat_medium.FID = film.FID
                AND hat_medium.TID = text.TID
                AND gehoert_zu.PID = persoenlichkeit.PID
                AND gehoert_zu.KID = kategorie.KID
                AND zitat.PID = persoenlichkeit.PID
                AND ueber.PID = persoenlichkeit.PID
                AND ueber.LID = literatur.LID";
$res = mysqli_query($my_db, $sql);
$row = mysqli_fetch_assoc($res);
$PID = $row['PID'];
$BID = $row['BID'];
$POID = $row['POID'];
$FID = $row['FID'];
$TID = $row['TID'];
$LID = $row['LID'];






//Registrierungs logik
if($_REQUEST['vorname']!=NULL && $_REQUEST['nachname']!= NULL && $_REQUEST['gebDat']!=NULL &&
    $_REQUEST['todDat']!=NULL && $_REQUEST['alter']!=NULL && $_REQUEST['furl']!=NULL &&
    $_REQUEST['ftitel']!=NULL && $_REQUEST['fdauer']!=NULL && $_REQUEST['fjahr']!=NULL &&
    $_REQUEST["zselbst"]!=NULL && $_REQUEST['zdatum']!=NULL && $_REQUEST['zquelle']!=NULL &&
    $_REQUEST['text']!=NULL && $_REQUEST['ltitel']!=NULL&& $_REQUEST['lstadt']!=NULL&&
    $_REQUEST['lverlag']!=NULL && $_REQUEST['lauflage']!=NULL && $_REQUEST['ljahr']!=NULL &&
    $_REQUEST['lautor']!=NULL && $_REQUEST['lseiten']!=NULL ){
    $vorname = mysqli_real_escape_string($my_db,htmlentities($_REQUEST['vorname']));
    $nachname = mysqli_real_escape_string($my_db,htmlentities($_REQUEST['nachname']));
    $gebDat = mysqli_real_escape_string($my_db,htmlentities($_REQUEST['gebDat']));
    $todDat = mysqli_real_escape_string($my_db,htmlentities($_REQUEST['todDat']));
    $alter = mysqli_real_escape_string($my_db,htmlentities($_REQUEST['alter']));
    $furl = mysqli_real_escape_string($my_db, htmlentities($_REQUEST['furl']));
    $ftitel = mysqli_real_escape_string($my_db, htmlentities($_REQUEST['ftitel']));
    $fdauer = mysqli_real_escape_string($my_db, htmlentities($_REQUEST['fdauer']));
    $fjahr = mysqli_real_escape_string($my_db, htmlentities($_REQUEST['fjahr']));
    $zselbst = mysqli_real_escape_string($my_db,htmlentities($_REQUEST['zselbst']));
    $zdatum = mysqli_real_escape_string($my_db,htmlentities($_REQUEST['zdatum']));
    $zquelle = mysqli_real_escape_string($my_db,htmlentities($_REQUEST['zquelle']));
    $text = mysqli_real_escape_string($my_db,htmlentities($_REQUEST['text']));
    $kategorie = mysqli_real_escape_string($my_db,htmlentities($_REQUEST['kategorie']));
    $titel = mysqli_real_escape_string($my_db,htmlentities($_REQUEST['ltitel']));
    $stadt = mysqli_real_escape_string($my_db,htmlentities($_REQUEST['lstadt']));
    $verlag = mysqli_real_escape_string($my_db,htmlentities($_REQUEST['lverlag']));
    $auflage = mysqli_real_escape_string($my_db,htmlentities($_REQUEST['lauflage']));
    $jahr = mysqli_real_escape_string($my_db,htmlentities($_REQUEST['ljahr']));
    $autor = mysqli_real_escape_string($my_db,htmlentities($_REQUEST['lautor']));
    $seiten = mysqli_real_escape_string($my_db,htmlentities($_REQUEST['lseiten']));


    //checken ob bilder hochgeladen wurden
    if($_FILES['bild_daten']!=NULL && $_FILES['poster']!=NULL){

        $bild_daten_tmpname = $_FILES['bild_daten']['tmp_name'];
        $bild_daten_name = $_FILES['bild_daten']['name'];
        $bild_daten_type = $_FILES['bild_daten']['type'];
        $bild_daten_size = $_FILES['bild_daten']['size'];

        $poster_tmpname = $_FILES['poster']['tmp_name'];
        $poster_name = $_FILES['poster']['name'];
        $poster_type = $_FILES['poster']['type'];
        $poster_size = $_FILES['poster']['size'];


        if (!empty($bild_daten_tmpname) && !empty($poster_tmpname)) {
            if (( $bild_daten_type == "image/gif" ) || ($bild_daten_type == "image/pjpeg") || ($bild_daten_type == "image/jpeg") || ($bild_daten_type == "image/png") &&
                ( $poster_type == "image/gif" ) || ($poster_type == "image/pjpeg") || ($poster_type == "image/jpeg") || ($poster_type == "image/png") ) {


                //bild einfügen
                $dateihandle = fopen($bild_daten_tmpname, "r");
                $bild_daten = mysqli_real_escape_string($my_db, fread($dateihandle, filesize($bild_daten_tmpname)));
                $bild_name = mysqli_real_escape_string($my_db, $bild_daten_name);
                $bild_type = mysqli_real_escape_string($my_db, $bild_daten_type);
                $sql = "UPDATE bild SET data = '$bild_daten', name = '$bild_name', typ = '$bild_type', groese = '$bild_daten_size' WHERE BID = '".$BID."'";
                $res = mysqli_query($my_db, $sql) or die(mysqli_error($my_db));

                //poster einfügen
                $dateihandle2 = fopen($poster_tmpname, "r");
                $poster2_daten = mysqli_real_escape_string($my_db, fread($dateihandle2, filesize($poster_tmpname)));
                $poster2_name = mysqli_real_escape_string($my_db, $poster_name);
                $poster2_type = mysqli_real_escape_string($my_db, $poster_type);
                $sql20 = "UPDATE poster SET data = '$poster2_daten', name = '$poster2_name', typ = '$poster2_type', groese = '$poster_size' WHERE POID = '".$POID."'";
                $res20 = mysqli_query($my_db, $sql20) or die(mysqli_error($my_db));

                //person einfügen
                $sql21 = "UPDATE persoenlichkeit SET vorname = '".$vorname."', name = '".$nachname."', geb = '".$gebDat."', tod = '".$todDat."', age = '".$alter."' WHERE PID = '".$PID."'";
                $res21 = mysqli_query($my_db, $sql21) or die (mysqli_error($my_db));

                //film zur person einfügen
                $sql2 = "UPDATE film SET titel = '".$ftitel."', dauer = '".$fdauer."', jahr = '".$fjahr."', url = '".$furl."' WHERE FID = '".$FID."'";
                $res2 = mysqli_query($my_db, $sql2) or die (mysqli_error($my_db));

                //text zur person einfügen
                $sql3 = "UPDATE text SET inhalt = '".$text."' WHERE TID = '".$TID."'";
                $res3 = mysqli_query($my_db, $sql3) or die (mysqli_error($my_db));

                //zitat einfügen, erst id von person ausgeben um sie mit einzufügen
                $sql4 = "SELECT PID FROM persoenlichkeit 
                         WHERE vorname = '".$vorname."'
                         AND name = '".$nachname."'
                         AND geb = '".$gebDat."'
                         AND tod = '".$todDat."'
                         AND age = '".$alter."'";
                $res4 = mysqli_query($my_db, $sql4) or die (mysqli_error($my_db));
                $res4 = mysqli_fetch_assoc($res4);
                $sql5 = "UPDATE zitat SET datum = '".$zdatum."', quelle = '".$zquelle."', inhalt = '".$zselbst."', PID = '".$res4['PID']."' WHERE PID = '".$PID."'";
                $res5 = mysqli_query($my_db, $sql5) or die (mysqli_error($my_db));


                //kategorie der person in die tabelle gehoert_zu eintragen
                if($kategorie=='Pro'){
                    $sql15 = "UPDATE gehoert_zu SET KID = '2' WHERE PID = '".$res4['PID']."' ";
                    $res15 = mysqli_query($my_db, $sql15) or die (mysqli_error($my_db));
                }elseif($kategorie=='Wis'){
                    $sql16 = "UPDATE gehoert_zu SET KID = '3' WHERE PID = '".$res4['PID']."'";
                    $res16 = mysqli_query($my_db, $sql16) or die (mysqli_error($my_db));
                }else{
                    $sql17 = "UPDATE gehoert_zu SET KID = '1' WHERE PID = '".$res4['PID']."'";
                    $res17 = mysqli_query($my_db, $sql17) or die (mysqli_error($my_db));
                }

                //literatur einfügen

                $sql6 = "UPDATE literatur SET titel = '".$titel."', stadt = '".$stadt."', verlag = '".$verlag."', auflage = '".$auflage."', jahr = '".$jahr."', autor= '".$autor."', seiten = '".$seiten."'
                         WHERE LID = '".$LID."' ";
                $res6 = mysqli_query($my_db, $sql6) or die (mysqli_error($my_db));


                echo "<div class=\"alert alert-danger\">
                <strong>Info!</strong> Du hast eine Person bearbeitet! <a href='personSelbst.php?PID=$person'>Zurück zur Person</a>
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

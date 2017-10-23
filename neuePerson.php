<!DOCTYPE html>
<html lang="de">

<?php
require("dba.php");
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
                $sql = "INSERT INTO bild(data, name, typ, groese) VALUES('$bild_daten', '$bild_name', '$bild_type', $bild_daten_size)";
                $res = mysqli_query($my_db, $sql) or die(mysqli_error($my_db));

                //poster einfügen
                $dateihandle2 = fopen($poster_tmpname, "r");
                $poster2_daten = mysqli_real_escape_string($my_db, fread($dateihandle2, filesize($poster_tmpname)));
                $poster2_name = mysqli_real_escape_string($my_db, $poster_name);
                $poster2_type = mysqli_real_escape_string($my_db, $poster_type);
                $sql20 = "INSERT INTO poster(data, name, typ, groese) VALUES('$poster2_daten', '$poster2_name', '$poster2_type', $poster_size)";
                $res20 = mysqli_query($my_db, $sql20) or die(mysqli_error($my_db));

                //person einfügen
                $sql21 = "INSERT INTO persoenlichkeit (vorname, name, geb, tod, age) VALUES('".$vorname."','".$nachname."','".$gebDat."','".$todDat."','".$alter."')";
                $res21 = mysqli_query($my_db, $sql21) or die (mysqli_error($my_db));

                //film zur person einfügen
                $sql2 = "INSERT INTO film (titel, dauer, jahr, url) VALUES('".$ftitel."','".$fdauer."','".$fjahr."','".$furl."')";
                $res2 = mysqli_query($my_db, $sql2) or die (mysqli_error($my_db));

                //text zur person einfügen
                $sql3 = "INSERT INTO text (inhalt) VALUES('".$text."')";
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
                $sql5 = "INSERT INTO zitat (datum, quelle, inhalt, PID) VALUES ('".$zdatum."', '".$zquelle."', '".$zselbst."', '".$res4['PID']."')";
                $res5 = mysqli_query($my_db, $sql5) or die (mysqli_error($my_db));

                //kategorie der person in die tabelle gehoert_zu eintragen
                if(isset($_REQUEST['Pro'])){
                    $sql15 = "INSERT INTO gehoert_zu (PID, KID) VALUES ('".$res4['PID']."', '2')";
                    $res15 = mysqli_query($my_db, $sql15) or die (mysqli_error($my_db));
                }elseif(isset($_REQUEST['Wis'])){
                    $sql16 = "INSERT INTO gehoert_zu (PID, KID) VALUES ('".$res4['PID']."', '3')";
                    $res16 = mysqli_query($my_db, $sql16) or die (mysqli_error($my_db));
                }else{
                    $sql17 = "INSERT INTO gehoert_zu (PID, KID) VALUES ('".$res4['PID']."', '1')";
                    $res17 = mysqli_query($my_db, $sql17) or die (mysqli_error($my_db));
                }

                //literatur einfügen

                $sql6 = "INSERT INTO literatur (titel, stadt, verlag, auflage, jahr, autor, seiten)
                         VALUES ('".$titel."' , '".$stadt."' , '".$verlag."' , '".$auflage."' , '".$jahr."' , '".$autor."' , '".$seiten."') ";
                $res6 = mysqli_query($my_db, $sql6) or die (mysqli_error($my_db));

                //verbindungstabelle über, erst literatur ID auslesen
                $sql7 = "SELECT LID FROM literatur 
                         WHERE titel = '".$titel."'
                         AND stadt = '".$stadt."'
                         AND verlag = '".$verlag."'
                         AND auflage = '".$auflage."'
                         AND jahr = '".$jahr."'
                         AND autor = '".$autor."'
                         AND seiten = '".$seiten."' ";
                $res7 = mysqli_query($my_db, $sql7) or die (mysqli_error($my_db));
                $res7 = mysqli_fetch_assoc($res7);
                $sql8 = "INSERT INTO ueber (PID, LID) VALUES ('".$res4['PID']."', '".$res7['LID']."')";
                $res8 = mysqli_query($my_db, $sql8) or die (mysqli_error($my_db));


                //verbindungstabelle hat_medium, film id, bild id, poster id und text id auslesen

                //film id
                $sql9 = "SELECT FID FROM film WHERE url = '".$furl."'";
                $res9 = mysqli_query($my_db, $sql9) or die (mysqli_error($my_db));
                $res9 = mysqli_fetch_assoc($res9);

                //text id
                $sql12 = "SELECT TID FROM text WHERE inhalt = '".$text."'";
                $res12 = mysqli_query($my_db, $sql12) or die (mysqli_error($my_db));
                $res12 = mysqli_fetch_assoc($res12);

                //bild id
                $id = "SELECT BID FROM bild WHERE data = '".$bild_daten."' AND name = '".$bild_name."' AND typ = '".$bild_type."' AND groese = '".$bild_daten_size."'";
                $res10 = mysqli_query($my_db, $id) or die (mysqli_error($my_db));
                $res10 = mysqli_fetch_assoc($res10);

                //poster id
                $id2 = "SELECT POID FROM poster WHERE data = '".$poster2_daten."' AND name = '".$poster2_name."' AND typ = '".$poster2_type."' AND groese = '".$poster_size."'";
                $res11 = mysqli_query($my_db, $id2) or die (mysqli_error($my_db));
                $res11 = mysqli_fetch_assoc($res11);

                //hat_medium ausfüllen
                $sql13 = "INSERT INTO hat_medium (PID, FID, BID, TID, POID)
                          VALUES ('".$res4['PID']."', '".$res9['FID']."','".$res10['BID']."', '".$res12['TID']."','".$res11['POID']."')";
                $res13 = mysqli_query($my_db, $sql13) or die (mysqli_error($my_db));


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
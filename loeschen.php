<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <link href="./css/bootstrap.min.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">
    <title>Löschen</title>
</head>

<?php

    require("dba.php");

    $person = $_GET['PID'];

    //kategorie verbindung in gehoert_zu löschen
    $sql8 = "DELETE FROM gehoert_zu WHERE PID = '".$person."'";
    $res8 = mysqli_query($my_db, $sql8) or die (mysqli_error($my_db));

    //alle ids aus hat_medium holen
    $sqlz = "SELECT BID, POID, FID, TID FROM hat_medium WHERE PID = '".$person."'";
    $resz = mysqli_query($my_db, $sqlz);
    $row = mysqli_fetch_assoc($resz);

    //verbindungstabelle hat_medium löschen
    $sql7 = "DELETE FROM hat_medium WHERE PID = '".$person."'";
    $res7 = mysqli_query($my_db, $sql7) or die (mysqli_error($my_db));

    //bild löschen
    $sql3 = "DELETE FROM bild WHERE BID = '".$row['BID']."'";
    $res3 = mysqli_query($my_db, $sql3) or die (mysqli_error($my_db));

    //poster löschen
    $sql4 = "DELETE FROM poster WHERE POID = '".$row['POID']."'";
    $res4 = mysqli_query($my_db, $sql4) or die (mysqli_error($my_db));

    //film löschen
    $sql5 = "DELETE FROM film WHERE FID = '".$row['FID']."'";
    $res5 = mysqli_query($my_db, $sql5) or die (mysqli_error($my_db));

    //text löschen
    $sql6 = "DELETE FROM text WHERE TID = '".$row['TID']."'";
    $res6 = mysqli_query($my_db, $sql6) or die (mysqli_error($my_db));

    //zitat löschen
    $sql9 = "DELETE FROM zitat WHERE PID = '".$person."'";
    $res9 = mysqli_query($my_db, $sql9) or die (mysqli_error($my_db));

    //literatur löschen, vorher LID aus ueber abfragen
    $sqla = "SELECT LID FROM ueber WHERE PID = '".$person."'";
    $resa = mysqli_query($my_db, $sqla);
    $row2 = mysqli_fetch_assoc($resa);

    $sql10 = "DELETE FROM ueber WHERE PID = '".$person."'";
    $res10 = mysqli_query($my_db, $sql10) or die (mysqli_error($my_db));
    $sql11 = "DELETE FROM literatur WHERE LID = '".$row2['LID']."'";
    $res11 = mysqli_query($my_db, $sql11) or die (mysqli_error($my_db));



    //person löschen
    $sql2 = "DELETE FROM persoenlichkeit WHERE PID = '".$person."'";
    $res2 = mysqli_query($my_db, $sql2) or die (mysqli_error($my_db));

    echo "<div class=\"alert alert-danger\">
                <strong>Info!</strong> Du hast eine Person gelöscht! <a href='personen.php'>Zurück zur Personenübersicht</a>
              </div>";
?>

</html>
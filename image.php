<?php
require("dba.php");
//bild auslesen/ausgeben
$person = $_GET['PID'];
//sucht das bild, das zur übergebenen persoelichkeits id passt
$sql = "SELECT bild.BID, bild.data, bild.name, bild.typ, bild.groese 
        FROM bild, persoenlichkeit, hat_medium
        WHERE bild.BID = hat_medium.BID
        AND hat_medium.PID = persoenlichkeit.PID
        AND persoenlichkeit.PID = '" . $person . "'";
$query = mysqli_query($my_db, $sql);
if (mysqli_num_rows($query)) {
    $ein = mysqli_fetch_object($query);
    $ctype = NULL;
    switch ($ein->typ) {
        case "gif":
            $ctype = "image/gif";
            break;
        case "png":
            $ctype = "image/png";
            break;
        case "jpeg":
        case "jpg":
            $ctype = "image/jpeg";
            break;
        default:
    }
    header('Content-type: ' . $ctype);
    echo $ein->data;
}

?>
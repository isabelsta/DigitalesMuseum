<?php
require("dba.php");
//kategorie bilder ausgeben
$bild = $_GET['KBID'];
$sql = "SELECT data, name, typ 
        FROM katbild
        WHERE KBID = '".$bild."' ";
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
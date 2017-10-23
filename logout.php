<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <link href="./css/bootstrap.min.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">
    <title>Abmelden</title>
</head>

<?php
//die session wird zerstört, um den benutzer auszuloggen
session_start();
//variablen leeren
$_SESSION = array();
//cookie löschen
if (isset($_COOKIE[session_name()])) {
    setcookie(session_name(), '', time()-42000, '/');
}
session_destroy();

echo "<div class=\"alert alert-danger panel-body col-md-4 col-md-offset-4 panel-logout\">
                <strong>Info!</strong> Du wurdest ausgeloggt! <a href='index.php'>Wieder anmelden</a>
              </div>";
?>

</html>
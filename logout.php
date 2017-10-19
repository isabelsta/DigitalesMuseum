<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <link href="./css/bootstrap.min.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">
    <title>Registrierung</title>
</head>

<?php
session_start();
//variablen leeren
$_SESSION = array();
//cookie löschen
if (isset($_COOKIE[session_name()])) {
    setcookie(session_name(), '', time()-42000, '/');
}
session_destroy();

echo "<div class=\"alert alert-danger\">
                <strong>Info!</strong> Du wurdest ausgeloggt! <a href='index.php'>Wieder anmelden</a>
              </div>";
?>

</html>
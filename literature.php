<!DOCTYPE html>
<html lang="de">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Die 3 Meta-Tags oben *müssen* zuerst im head stehen; jeglicher sonstiger head-Inhalt muss *nach* diesen Tags kommen -->
    <title>Digitales Museum</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

  </head>
  <body>
    <?php
      require("./navbar.php");
      require("dba.php");
      $person = $_GET["PID"];
      $sql = "SELECT literatur.autor, literatur.titel, literatur.stadt, literatur.verlag, literatur.auflage, literatur.seiten
                FROM literatur, ueber
                WHERE ueber.LID = literatur.LID
                AND ueber.PID = '".$person."'";
    $res = mysqli_query($my_db, $sql);
    $row = mysqli_fetch_all($res);


    ?>
    <br/>
    <br/>
    <br/>
    <div class="Container">
        <h3><b>Literatur</b></h3>
        <p class="literatur">
            <?php
            foreach($row as $item) {
                printf("%s: %s, %s, %s (%s. Auflage), %s Seiten", $item['0'], $item['1'], $item['2'], $item['3'], $item['4'], $item['5']);
            echo "<br/>";
            echo "<br/>";
            }
                ?>
            <br/>
        </p>
    </div>
  </body>
</html>

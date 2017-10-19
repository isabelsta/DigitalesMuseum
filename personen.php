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
    ?>
    <br/>
    <br/>
    <br/>

    <?php
    require("dba.php");
    //wenn keine kategorie gesetzt ist, wird sie nicht berücksichtigt
    if(@$_GET['KID']==NULL){
        $sql = "SELECT PID, vorname, name
            FROM persoenlichkeit";
    }
    //falls man über die seite kategorie zu person kommt
    //muss in der abfrage auch die kategorie abgefragt werden
    else {
        $kategorie = $_GET['KID'];
        //infos zur person aus db lesen
        $sql = "SELECT persoenlichkeit.PID, vorname, name
            FROM persoenlichkeit, gehoert_zu
            WHERE gehoert_zu.KID = '" . $kategorie . "'
            AND persoenlichkeit.PID = gehoert_zu.PID";
    }
    $res = mysqli_query($my_db, $sql);
    $row = mysqli_fetch_all($res);
    //personen array mit einer schleife durchlaufen
    foreach ($row as $item) {

    ?>

    <div class="col-md-4" style="text-align: center;">
        <a href="personSelbst.php?PID=<?=$item['0']?>" >
            <img src="image.php?PID=<?=$item['0']?>" alt="<?php printf("%s %s", $item['1'], $item['2']); ?>" class="img-thumbnail" >
        </a>
        <h4 align="center">
            <?php
                //den namen der person ausgeben
                printf("%s %s", $item['1'], $item['2']);
            ?>
        </h4>
    </div>


<?php } ?>
  </body>

  <br />
  <br />
  <br />
  <br />
  <br />

</html>

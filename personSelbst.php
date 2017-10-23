<!DOCTYPE html>
<html lang="de">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Digitales Museum</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!--<link rel="stylesheet" href="./css/custom_styles.css">-->

  </head>
  <body>
    <?php
      require("navbar.php");
      require("dba.php");
    ?>
    <br/>
    <br/>
    <br/>
    <?php
        $person = $_GET["PID"];
       // echo $person;
       //alle infos zur person in ein array laden
        $sql = "SELECT persoenlichkeit.PID, persoenlichkeit.vorname, persoenlichkeit.name, persoenlichkeit.geb, persoenlichkeit.tod,
                zitat.quelle, zitat.inhalt, text.inhalt, film.titel, film.jahr, film.dauer, film.url
                FROM persoenlichkeit, hat_medium, bild, poster, film, zitat, gehoert_zu, kategorie, text
                WHERE persoenlichkeit.PID = '".$person."'
                AND hat_medium.PID = persoenlichkeit.PID 
                AND hat_medium.BID = bild.BID
                AND hat_medium.POID = poster.POID
                AND hat_medium.FID = film.FID
                AND hat_medium.TID = text.TID
                AND gehoert_zu.PID = persoenlichkeit.PID
                AND gehoert_zu.KID = kategorie.KID
                AND zitat.PID = persoenlichkeit.PID";
    $res = mysqli_query($my_db, $sql);
    $row = mysqli_fetch_all($res);
    foreach($row as $item){
    ?>
    <h1><?php printf("%s %s", $item['1'], $item['2']); ?> </h1>
    <br/>
    <div class="Container">
        <img src="poster.php?PID=<?=$item['0']?>" alt="<?php printf("Poster von %s %s", $item['1'], $item['2']);?>" class="img-thumbnail">
    </div>
    <div class="Container">
      <p class="text-center text">
          <?php
                //poster unterschrift
                printf("%s %s, geboren am %s, gestorben am %s", $item['1'], $item['2'], $item['3'], $item['4']);
            ?>
          <br/>
          <br/>
          <strong style="font-size: 28px">
              <?php
              //zitat
                printf(" \"%s\" (%s) ", $item['6'], $item['5']);
            ?>
            </strong>
          <br/>
          <br/>
          <?php
                //langer text
                printf("%s", $item['7']);
            ?>
          <br/>
          <br/>
          <?php
            //video
            printf("%s, %s (%s min): ", $item['8'], $item['9'], $item['10']);
            echo "<a href=".$item['11'].">Zum Video</a>";

          ?>
          <br/>
          <br/>
      </p>
    </div>
    <div class="container">
        <a href="literature.php?PID=<?=$item['0']?>" >
          <h4 align="left" class="text-center text"> Weitere Literatur </h4>
        </a>
    </div>
    <br/>
    <button type="button" id="Pbearbeiten" class="btn-group btn btn-right btn-person">
        Persönlichkeit bearbeiten
    </button>
    <button type="button" id="Ploeschen" class="btn-group btn btn-right btn-person">
        <a href="loeschen.php?PID=<?=$item['0']?>">Persönlichkeit löschen</a>
    </button>
  </body>
</html>
<?php } ?>
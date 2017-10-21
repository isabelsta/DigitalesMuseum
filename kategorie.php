<!DOCTYPE html>
<html lang="de">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Die 3 Meta-Tags oben *müssen* zuerst im head stehen; jeglicher sonstiger head-Inhalt muss *nach* diesen Tags kommen -->
    <title>Digitales Museum</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>


  </head>
  <body>
    <?php
      require("./navbar.php");
    ?>
    <br />
    <br />
    <br />
    <br />
    <br />
    <br />
    <br />
    <br />
    <br />
    <br />

    <?php
        require("dba.php");
    //liest alle kategorien aus, um sie anzeigen zu lassen
    $sql = "SELECT KID, art
            FROM kategorie";
    $res = mysqli_query($my_db, $sql);
    $row = mysqli_fetch_all($res);
    foreach ($row as $item) {

    ?>
    <div class="container">
      <div class="row">
          <div class="col-md-4">
              <a href="personen.php?KID=<?=$item['0']?>">
                  <img src="sdp_klein.jpg" alt="Mein Bild" class="img-thumbnail" >
              </a>
              <h2 align="center"><?php printf("%s", $item['1']); ?> </h2>
          </div>


      </div>
      <br/>
    </div>
  </body>
</html>
<?php } ?>
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
    ?>
    <br/>
    <br/>
    <br/>
    <div class="Container">
      <object data="./Poster_Montessori.pdf" type="application/pdf" style="width:100%;height:300px">
        <a href="./Poster_Montessori.pdf">PDF laden</a>
      </object>
    </div>
    <div class="Container">
      <object data="./Text_Montessori.pdf" type="application/pdf" style="width:100%;height:300px">
        <a href="./Text_Montessori.pdf">PDF laden</a>
      </object>
    </div>
    <div class="container">
        <a href="#" id="literature" onclick="document.location=this.id+'.php';return false;" >
          <h4 align="left"> Literatur </h4>
        </a>
    </div>
  </body>
</html>

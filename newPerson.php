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
      require("./navbar.php");
    ?>
    <br/>
    <br/>
    <br/>
    <div class="container">
        <div class="page-header">
            <h1>Neue Pers&ouml;nlichkeit hinzuf&uuml;gen</h1>
        </div>
        <div class="container">
            <div class="row vertical-offset-100">
                <div class="col-md-4 col-md-offset-4">
                    <div class="panel panel-default">
                        <div class="panel-heading" id="panel-heading">
                            <h3 class="panel-title">Neue Pers&ouml;nlichkeit hinzuf&uuml;gen</h3>
                        </div>
                        <div class="panel-body">
                            <form accept-charset="UTF-8" role="form" action="newPerson.php" method="post" enctype='multipart/form-data'>
                                <fieldset>
                                    <div class="form-group">
                                        <label for="vorname">Vorname: *</label>
                                        <input type="text" placeholder="Vorname"
                                               class="form-control"
                                               name="vorname" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="nachname">Nachname: *</label>
                                        <input type="text" placeholder="Nachname"
                                               class="form-control"
                                               name="nachname" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="gebDat">Geburtsdatum: *</label>
                                        <input type="text" placeholder="Geburtsdatum"
                                               class="form-control"
                                               name="gebDat" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="todDat">Todesdatum: *</label>
                                        <input type="text" placeholder="Todesdatum"
                                               class="form-control"
                                               name="todDat" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="kategorie">Kategorie: *</label><br>
                                          <input type="radio" id="vi" name="Zahlmethode" value="Kat1">
                                          <label for="k1">Kategorie 1</label><br>
                                          <input type="radio" id="vi" name="Zahlmethode" value="Kat2">
                                          <label for="k2">Kategorie 2</label><br>
                                          <input type="radio" id="ae" name="Zahlmethode" value="Kat3">
                                          <label for="k3">Kategorie 3</label>
                                    </div>
                                    <div class="form-group">
                                        <label for="text">Text: *</label>
                                        <textarea name="text" cols="35" rows="4" required></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="literatur">Literatur: *</label>
                                        <input type="file" name="literatur" accept="application/pdf">
                                    </div>
                                    <div class="form-group">
                                        <label for="film">Film:</label>
                                        <input type="file" accept="video/*" name="film">
                                    </div>
                                    <div class="form-group">
                                        <label for="poster">Poster:</label>
                                        <input type="file" accept="image/*" name="poster">
                                    </div>
                                    <div class="form-group">
                                        <label for="bild">Bild:</label>
                                        <input type="file" accept="image/*" name="bild_daten">
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn">Pers&ouml;nlichkeit hinzuf&uuml;gen</button>
                                        <div class="small register">
                                            * = Pflichtfelder
                                        </div>
                                      </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </body>
</html>

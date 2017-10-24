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
</head>
<body>
<?php
require("./navbar.php");
require("neuePerson.php");
?>
<br/>
<br/>
<div class="container">
    <div class="page-header">
        <h1>Neue Pers&ouml;nlichkeit hinzuf&uuml;gen</h1>
    </div>
    <div class="container">
        <div class="row vertical-offset-100">
            <div class="col-md-4 col-md-offset-4 col-custom">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <form accept-charset="UTF-8" role="form" action="newPerson.php" method="post" enctype='multipart/form-data'>
                            <fieldset>
                                <div class="form-group">
                                    <label for="vorname">Vorname: *</label>
                                    <input type="text" placeholder="Vorname" class="form-control form-control-custom" name="vorname" required>
                                </div>
                                <div class="form-group">
                                    <label for="nachname">Nachname: *</label>
                                    <input type="text" placeholder="Nachname" class="form-control form-control-custom" name="nachname" required>
                                </div>
                                <div class="form-group">
                                    <label for="gebDat">Geburtsdatum: *</label>
                                    <input type="text" placeholder="yyyy-mm-dd" class="form-control form-control-custom" name="gebDat" required>
                                </div>
                                <div class="form-group">
                                    <label for="todDat">Todesdatum: </label>
                                    <input type="text" placeholder="yyyy-mm-dd" class="form-control form-control-custom" name="todDat">
                                </div>
                                <div class="form-group">
                                    <label for="alter">Alter: *</label>
                                    <input type="text" placeholder="0-150" class="form-control form-control-custom" name="alter" required>
                                </div>
                                <div class="form-group">
                                    <label for="film">Film: *</label>
                                    <input type="text" placeholder="https://www.abc.com" class="form-control form-control-custom" name="furl">
                                    <input type="text" placeholder="Titel" class="form-control form-control-custom" name="ftitel">
                                    <input type="text" placeholder="Dauer" class="form-control form-control-custom" name="fdauer">
                                    <input type="text" placeholder="Jahr" class="form-control form-control-custom" name="fjahr">
                                </div>
                                <div class="form-group">
                                    <label for="zitat">Zitat: *</label>
                                    <input type="text" placeholder="Zitat" class="form-control form-control-custom" name="zselbst">
                                    <input type="text" placeholder="yyyy-mm-dd" class="form-control form-control-custom" name="zdatum">
                                    <input type="text" placeholder="Quelle" class="form-control form-control-custom" name="zquelle">
                                </div>
                                <div class="form-group">
                                    <label for="text">Text: *</label>
                                    <textarea name="text" cols="35" rows="4" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="poster">Poster: *</label>
                                    <input type="file" accept="image/*" class="form-control-custom" name="poster" required>
                                </div>
                                <div class="form-group">
                                    <label for="bild">Bilder: *</label>
                                    <input type="file" accept="image/*" class="form-control-custom" name="bild_daten" multiple required>
                                </div>
                                <div class="form-group">
                                    <label for="kategorie">Kategorie: *</label><br>
                                    <input type="radio" id="kat1" name="kategorie" value="Kla" checked>
                                    <label for="k1">Klassiker</label><br>
                                    <input type="radio" id="kat2" name="kategorie" value="Pro">
                                    <label for="k2">Professionalisierung</label><br>
                                    <input type="radio" id="kat3" name="kategorie" value="Wis">
                                    <label for="k3">Wissenschaft</label>
                                </div>
                                <div class="form-group">
                                    <div class="control-group" id="fields">
                                        <label class="control-label" for="field1">Literatur: *</label>
                                                <input class="input form-control form-control-custom" id="ltitel1" name="ltitel" type="text" placeholder="Titel" required/>
                                                <input class="input form-control form-control-custom" id="lstadt1" name="lstadt" type="text"  placeholder="Stadt" required />
                                                <input class="input form-control form-control-custom" id="lverlag1" name="lverlag" type="text"  placeholder="Verlag" required />
                                                <input class="input form-control form-control-custom" id="lauflage1" name="lauflage" type="text"  placeholder="Auflage" required />
                                                <input class="input form-control form-control-custom" id="ljahr1" name="ljahr" type="text"  placeholder="Jahr" required />
                                                <input class="input form-control form-control-custom" id="lautor1" name="lautor" type="text"  placeholder="Autor" required />
                                                <input class="input form-control form-control-custom" id="lseiten1" name="lseiten" type="text"  placeholder="Seiten" required />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-group">Pers&ouml;nlichkeit hinzuf&uuml;gen</button>
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

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <link href="./css/bootstrap.min.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">
    <title>Bearbeiten</title>
</head>

<?php

require("dba.php");

$person = $_GET['PID'];

//alle infos zur person in ein array laden
$sql = "SELECT persoenlichkeit.PID, persoenlichkeit.vorname, persoenlichkeit.name, persoenlichkeit.geb, persoenlichkeit.tod,
                persoenlichkeit.age, film.FID, film.titel, film.jahr, film.dauer, film.url,
                zitat.quelle, zitat.inhalt, zitat.datum, text.TID, text.inhalt, literatur.titel, literatur.LID, literatur.stadt, literatur.verlag, 
                literatur.auflage, literatur.jahr, literatur.autor, literatur.seiten, bild.BID, bild.data, poster.POID, poster.data
                FROM persoenlichkeit, hat_medium, bild, poster, film, zitat, gehoert_zu, kategorie, text, ueber, literatur
                WHERE persoenlichkeit.PID = '".$person."'
                AND hat_medium.PID = persoenlichkeit.PID 
                AND hat_medium.BID = bild.BID
                AND hat_medium.POID = poster.POID
                AND hat_medium.FID = film.FID
                AND hat_medium.TID = text.TID
                AND gehoert_zu.PID = persoenlichkeit.PID
                AND gehoert_zu.KID = kategorie.KID
                AND zitat.PID = persoenlichkeit.PID
                AND ueber.PID = persoenlichkeit.PID
                AND ueber.LID = literatur.LID";
$res = mysqli_query($my_db, $sql);
$row = mysqli_fetch_assoc($res);
$PID = $row['PID'];
$BID = $row['BID'];
$POID = $row['POID'];
$FID = $row['FID'];
$TID = $row['TID'];
$LID = $row['LID'];


?>

<div class="page-header">
    <h1>Pers&ouml;nlichkeit bearbeiten</h1>
</div>
<div class="container">
    <div class="row vertical-offset-100">
        <div class="col-md-4 col-md-offset-4 col-custom">
            <div class="panel panel-default">
                <div class="panel-body">
                    <form accept-charset="UTF-8" role="form" action="personBearbeitet.php?PID=<?=$PID?>" method="post" enctype='multipart/form-data'>
                        <fieldset>
                            <div class="form-group">
                                <label for="vorname">Vorname: *</label>
                                <input type="text" placeholder="Vorname" class="form-control form-control-custom" name="vorname" value="<?=$row['vorname']?>" required>
                            </div>
                            <div class="form-group">
                                <label for="nachname">Nachname: *</label>
                                <input type="text" placeholder="Nachname" class="form-control form-control-custom" name="nachname" value="<?=$row['name']?>" required>
                            </div>
                            <div class="form-group">
                                <label for="gebDat">Geburtsdatum: *</label>
                                <input type="text" placeholder="yyyy-mm-dd" class="form-control form-control-custom" name="gebDat" value="<?=$row['geb']?>" required>
                            </div>
                            <div class="form-group">
                                <label for="todDat">Todesdatum: </label>
                                <input type="text" placeholder="yyyy-mm-dd" class="form-control form-control-custom" name="todDat" value="<?=$row['tod']?>">
                            </div>
                            <div class="form-group">
                                <label for="alter">Alter: *</label>
                                <input type="text" placeholder="0-150" class="form-control form-control-custom" name="alter" value="<?=$row['age']?>" required>
                            </div>
                            <div class="form-group">
                                <label for="film">Film: *</label>
                                <input type="text" placeholder="https://www.abc.com" class="form-control form-control-custom" name="furl" value="<?=$row['url']?>">
                                <input type="text" placeholder="Titel" class="form-control form-control-custom" name="ftitel" value="<?=$row['titel']?>">
                                <input type="text" placeholder="Dauer" class="form-control form-control-custom" name="fdauer" value="<?=$row['dauer']?>">
                                <input type="text" placeholder="Jahr" class="form-control form-control-custom" name="fjahr" value="<?=$row['jahr']?>">
                            </div>
                            <div class="form-group">
                                <label for="zitat">Zitat: *</label>
                                <input type="text" placeholder="Zitat" class="form-control form-control-custom" name="zselbst" value="<?=$row['inhalt']?>">
                                <input type="text" placeholder="yyyy-mm-dd" class="form-control form-control-custom" name="zdatum" value="<?=$row['datum']?>">
                                <input type="text" placeholder="Quelle" class="form-control form-control-custom" name="zquelle" value="<?=$row['quelle']?>">
                            </div>
                            <div class="form-group">
                                <label for="text">Text: *</label>
                                <textarea name="text" cols="35" rows="4" value="<?=$row['inhalt']?>" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="poster">Poster: *</label>
                                <input type="file" accept="image/*" class="form-control-custom" name="poster">
                            </div>
                            <div class="form-group">
                                <label for="bild">Bilder: *</label>
                                <input type="file" accept="image/*" class="form-control-custom" name="bild_daten"  multiple>
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
                                <input type="hidden" name="count" value="1" />
                                <div class="control-group" id="fields">
                                    <label class="control-label" for="field1">Literatur: *</label>
                                    <div class="controls" id="profs">
                                        <div id="field">
                                            <button id="b1" class="btn btn-form btn-group add-more btn-lit" type="button">+</button>
                                            <input class="input form-control form-control-lit" id="ltitel1" name="ltitel" type="text" placeholder="Titel" value="<?=$row['titel']?>" required/>
                                            <input class="input form-control form-control-lit" id="lstadt1" name="lstadt" type="text"  placeholder="Stadt" value="<?=$row['stadt']?>" required />
                                            <input class="input form-control form-control-lit" id="lverlag1" name="lverlag" type="text"  placeholder="Verlag" value="<?=$row['verlag']?>" required />
                                            <input class="input form-control form-control-lit" id="lauflage1" name="lauflage" type="text"  placeholder="Auflage" value="<?=$row['auflage']?>" required />
                                            <input class="input form-control form-control-lit" id="ljahr1" name="ljahr" type="text"  placeholder="Jahr" value="<?=$row['jahr']?>" required />
                                            <input class="input form-control form-control-lit" id="lautor1" name="lautor" type="text"  placeholder="Autor" value="<?=$row['autor']?>" required />
                                            <input class="input form-control form-control-lit" id="lseiten1" name="lseiten" type="text"  placeholder="Seiten" value="<?=$row['seiten']?>" required />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-group">Pers&ouml;nlichkeit bearbeiten</button>
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
</html>

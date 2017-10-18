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

    <script type="text/javascript">
      <!--
      function clone_this(objButton)
      {
          if(objButton.parentNode)
          {
              tmpNode=objButton.parentNode.cloneNode(true);
              objButton.form.appendChild(tmpNode);
              for(j=0;j<objButton.form.lastChild.childNodes.length;++j)
              {
                  if(objButton.form.lastChild.childNodes[j].type=='text')
                  {
                      objButton.form.lastChild.childNodes[j].value='';
                      break;
                  }
              }
              objButton.value="entfernen";
              objButton.onclick=new Function('f1','this.form.removeChild(this.parentNode)');
          }
      }
      //-->
    </script>

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
                                        <input type="text" placeholder="dd-mm-yyyy" class="form-control form-control-custom" name="gebDat" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="todDat">Todesdatum: </label>
                                        <input type="text" placeholder="dd-mm-yyyy" class="form-control form-control-custom" name="todDat">
                                    </div>
                                    <div class="form-group">
                                        <label for="alter">Alter: *</label>
                                        <input type="text" placeholder="0-150" class="form-control form-control-custom" name="alter" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="zitat">Zitat: *</label>
                                        <input type="text" placeholder="Zitat" class="form-control form-control-custom" name="zselbst">
                                        <input type="date" placeholder="dd-mm-yyyy" class="form-control form-control-custom" name="zdatum"
                                               pattern="^(31|30|0[1-9]|[12][0-9]|[1-9])\-(0[1-9]|1[012]|[1-9])\-((18|19|20)\d{2}|\d{2})$">
                                        <input type="text" placeholder="Quelle" class="form-control form-control-custom" name="zquelle">
                                    </div>
                                    <div class="form-group">
                                        <label for="text">Text: *</label>
                                        <textarea name="text" cols="35" rows="4" required></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="film">Film: </label>
                                        <input type="file" accept="video/*" class="form-control-custom" name="film">
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
                                        <input type="radio" id="kat1" name="Kategorie" value="Kla" checked>
                                        <label for="k1">Klassiker</label><br>
                                        <input type="radio" id="kat2" name="Kategorie" value="Pro">
                                        <label for="k2">Professionalisierung</label><br>
                                        <input type="radio" id="kat3" name="Kategorie" value="Wis">
                                        <label for="k3">Wissenschaft</label>
                                    </div>
                                    <div class="form-group">
                                        <label for="literatur">Literatur: </label>
                                        <input type="text" placeholder="Titel" class="form-control form-control-custom" name="ltitel">
                                        <input type="text" placeholder="Stadt" class="form-control form-control-custom" name="lstadt">
                                        <input type="text" placeholder="Verlag" class="form-control form-control-custom" name="lverlag">
                                        <input type="text" placeholder="Auflage" class="form-control form-control-custom" name="lauflage">
                                        <input type="text" placeholder="Jahr" class="form-control form-control-custom" name="ljahr">
                                        <input type="text" placeholder="Autor" class="form-control form-control-custom" name="lautor">
                                        <input type="text" placeholder="Seiten" class="form-control form-control-custom" name="lseiten">
                                        <input type="button" class="btn btn-group btn-form" value="Weiter Literatur" onclick="clone_this(this)">
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

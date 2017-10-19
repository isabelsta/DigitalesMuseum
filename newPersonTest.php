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
          $(document).ready(function(){
              var next = 1;
              $(".add-more").click(function(e){
                  e.preventDefault();
                  var addto = "#field" + next;
                  var addRemove = "#field" + (next);
                  next = next + 1;
                  var newIn = '<input autocomplete="off" class="input form-control" id="field' + next + '" name="field' + next + '" type="text">';
                  var newInput = $(newIn);
                  var removeBtn = '<button id="remove' + (next - 1) + '" class="btn btn-danger remove-me" >-</button></div><div id="field">';
                  var removeButton = $(removeBtn);
                  $(addto).after(newInput);
                  $(addRemove).after(removeButton);
                  $("#field" + next).attr('data-source',$(addto).attr('data-source'));
                  $("#count").val(next);

                  $('.remove-me').click(function(e){
                      e.preventDefault();
                      var fieldNum = this.id.charAt(this.id.length-1);
                      var fieldID = "#field" + fieldNum;
                      $(this).remove();
                      $(fieldID).remove();
                  });
              });
          });
      </script>
  </head>
  <body>
    <?php
      require("./navbar.php");
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
                                        <label for="literatur">Literatur: *</label>
                                        <input type="text" placeholder="Titel" class="form-control form-control-custom" name="ltitel" required>
                                        <input type="text" placeholder="Stadt" class="form-control form-control-custom" name="lstadt" required>
                                        <input type="text" placeholder="Verlag" class="form-control form-control-custom" name="lverlag" required>
                                        <input type="text" placeholder="Auflage" class="form-control form-control-custom" name="lauflage" required>
                                        <input type="text" placeholder="Jahr" class="form-control form-control-custom" name="ljahr" required>
                                        <input type="text" placeholder="Autor" class="form-control form-control-custom" name="lautor" required>
                                        <input type="text" placeholder="Seiten" class="form-control form-control-custom" name="lseiten" required>
                                    </div>
                                    <div class="container">
                                        <div class="row">
                                            <input type="hidden" name="count" value="1" />
                                            <div class="control-group" id="fields">
                                                <label class="control-label" for="field1">Nice Multiple Form Fields</label>
                                                <div class="controls" id="profs">
                                                    <form class="input-append">
                                                        <div id="field"><input autocomplete="off" class="input" id="field1" name="prof1" type="text" placeholder="Type something" data-items="8"/><button id="b1" class="btn add-more" type="button">+</button></div>
                                                    </form>
                                                    <br>
                                                    <small>Press + to add another form field :)</small>
                                                </div>
                                            </div>
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

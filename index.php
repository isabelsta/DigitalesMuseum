<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <link href="./css/bootstrap.min.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!--<link rel="stylesheet" href="./css/custom_styles.css">-->
    <title>Login</title>
</head>
  <div class="container">

    <div class="page-header">
        <h1>Digitales Museum</h1>
    </div>

      <?php
      if (isset($_REQUEST['error'])) {
          if ($_REQUEST['error'] == 'login') {
              echo "<div class='alert alert-danger'>Du hast deinen Nutzernamen oder dein Passwort falsch eingegeben!</div>";
          }
      }
      ?>


    <div class="container">
        <div class="row vertical-offset-100">
            <div class="col-md-4 col-md-offset-4">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <form accept-charset="UTF-8" role="form" action="start.php" method="post">
                            <fieldset>
                                <div class="form-group">
                                    <label for="login">Nutzername:</label>
                                    <input type="text" placeholder="Nutzername eingeben"
                                           class="form-control"
                                           name="login">
                                </div>
                                <div class="form-group">
                                    <label for="password">Passwort:</label>
                                    <input type="password" placeholder="Passwort eingeben" class="form-control"
                                           name="password">
                                </div>
                                <button type="submit" class="btn login-success">Anmelden</button>
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
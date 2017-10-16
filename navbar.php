<!DOCTYPE html>
<html lang="de">
  <head>
    <meta charset="utf-8">
    <title>Digitales Museum</title>

    <!-- Bootstrap -->
    <link href="./css/bootstrap.min.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">
  </head>

<body>
  <nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
      <div class="navbar-header">
        <a class="navbar-brand" href="login.php">Digitales Museum</a>
      </div>
      <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> Personen <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="./personen.php">Persönlichkeiten</a></li>
              <li><a href="./newPerson.php">Persönlichkeit hinzufügen</a></li>
            </ul>
          </li>
          <li><a href="./zeitstrahl.php">Zeitstrahl</a></li>
          <li><a href="./kategorie.php">Kategorie</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="./login.php">Abmelden</a></li>
        </ul>
      </div>
    </div>
  </nav>
</body>

<!DOCTYPE html>
<html>
<head>
  <title>Gestionale</title>
  <link rel="stylesheet" href="https://bootswatch.com/4/minty/bootstrap.min.css">
  <link rel="stylesheet" href="css/styles.css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</head>
<body>
  <div class="navbar navbar-expand fixed-top navbar-dark bg-primary">
    <div class="container-fluid">
      <ul class="navbar-nav">
        <div class="nav-item col-md">
          <a href="index.php" class="navbar-brand">Home</a>
        </div>
        <div class="nav-item col-md">
          <a class="nav-link" href="calendario.php">Calendario</a>
        </div>
        <div class="nav-item col-md">
          <a class="nav-link" href="index.php">Contabilità</a>
        </div>
        <div class="nav-item col-md">
          <a class="nav-link" href="elenco.php">Elenco</a>
        </div>
        <div class="nav-item col-md">
          <a class="nav-link" href="nuovo.php">Nuovo</a>
        </div>
        <div class="nav-item col-md">
          <a class="nav-link" href="operatori.php">Operatori</a>
        </div>
        <div class="nav-item col-md">
          <a class="nav-link" href="prestazioni.php">Prestazioni</a>
        </div>
      </ul>
    </div>
  </div>

  <?php displayMessage(); ?>

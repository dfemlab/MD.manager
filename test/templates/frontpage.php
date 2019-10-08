<?php include 'inc/header.php'?>

  <div class="jumbotron container-fluid">
    <h4 class="display-4">Cerca un Paziente</h4>
    <p class="lead">Cerca un paziente per visualizzare/modificare il contenuto della sua scheda.</p>
    <hr class="my-4">
    <p>Inserisci Nome e Cognome del Paziente.</p>
      <form method="POST" action="index.php">
            <div class="form-group">
              <div class="input-group mb-3">
                <div class="container-fluid row">
                  <div class="fill"><input name="nome" type="text" class="form-control" id="" placeholder="Nome"></div>
                  <div class="fill"><input name="cognome" type="text" class="form-control" id="" placeholder="Cognome"></div>
                  <div class="fill"><button type="submit" class="btn btn-primary btn-lg">Cerca</button></div>
                </div>
              </div>
            </div>
          </form>
        </div>
  <hr class="my-4">
  <div class="container-fluid">
    <div class="container-fluid"><h5>Risultati per: '<?php echo $title; ?>'</h5>
  </div>
  <div class="container-fluid row">
  <?php foreach($pazienti as $paziente): ?>
        <div class="fill"><a type="button" class="btn btn-outline-primary btn-lg" href="paziente.php?id=<?php echo $paziente->id; ?>"><?php echo $paziente->nome. ' '.$paziente->cognome;?></a></div>
  <?php endforeach; ?>
  </div>
  </div>



<?php include 'inc/footer.php'?>

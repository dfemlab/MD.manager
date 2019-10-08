<?php include 'inc/header.php'?>
<div class="container-fluid row">
  <div class="fill col-md">
    <h2 class="page-header"><?php echo $paziente->nome. ' '. $paziente->cognome; ?></h2>
    <small>Ultima Visita: <?php echo $paziente->ultima_visita?></small>
    <br>
    <br>
    <button class="btn btn-secondary btn-lg">Vedi File</button>
  </div>


  <div class="fill col-md">
    <img src = "images/empty.png" style="max-width: 30%;"/>
    <br>
  </div>
</div>

<hr>
<div class="container-fluid">
  <div class="container-fluid row">
    <div class="fill"><h4><a class="text-primary" href="index.php">Indietro</a></h4></div>
    <div class="fill"><a type="button" class="btn btn-info btn-lg" href="anamnesi.php?id=<?php echo $paziente->id; ?>">Anamnesi</a></div>
    <div class="fill"><a type="button" class="btn btn-primary btn-lg" href="clinica.php?id=<?php echo $paziente->id; ?>">Scheda Clinica</a></div>
    <div class="fill"><a type="button" class="btn btn-warning btn-lg" href="preventivo.php?id=<?php echo $paziente->id; ?>">Preventivo</a></div>
    <div class="fill"><a class="btn btn-outline-primary btn-lg" href="edit.php?id=<?php echo $paziente->id; ?>">Modifica</a></div>
  </div>
  <ul class="list-group">
    <li class="list-group-item"> <strong>Codice Fiscale: </strong><?php echo $paziente->codice_fiscale; ?></li>
    <li class="list-group-item"> <strong>Indirizzo: </strong><?php echo $paziente->indirizzo; ?></li>
    <li class="list-group-item"> <strong>Telefono-1: </strong><?php echo $paziente->telefono_1; ?></li>
    <li class="list-group-item"> <strong>Telefono-2: </strong><?php echo $paziente->telefono_2; ?></li>
    <li class="list-group-item"> <strong>Email: </strong><?php echo $paziente->email; ?></li>
  </ul>
  <br>
</div>
<?php include 'inc/footer.php'?>

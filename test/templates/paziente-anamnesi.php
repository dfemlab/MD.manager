<?php include 'inc/header.php'?>
<div class="container-fluid row">
  <div class="fill col-md">
    <h2 class="page-header"><?php echo $paziente->nome. ' '. $paziente->cognome; ?></h2>
    <small>Ultima Visita: <?php echo $paziente->ultima_visita?></small>
  </div>

  <div class="fill col-md">
    <img src = "images/empty.png" style="max-width: 30%;"/>
  </div>
</div>

<hr>
<div class="container-fluid">
  <ul class="list-group">
    <?php $counter=0; ?>
    <?php foreach($anamnesi as $value) : ?>
      <?php if(!is_numeric($value)) : ?>
      <?php $counter += 1; ?>
      <li class="list-group-item"> <strong>Risposta <?php echo $counter; ?>: </strong><?php echo $value; ?></li>
    <?php endif; ?>
  <?php endforeach; ?>
  </ul>
  <br>

  <div class="container-fluid row">
    <div class="fill"><h4><a href="paziente.php?id=<?php echo $paziente->id?>">Indietro</a></h4></div>
    <div class="fill"><a class="btn btn-primary btn-lg" href="modifica.php?id=<?php echo $paziente->id; ?>">Modifica</a></div>
  </div>

</div>
<?php include 'inc/footer.php'?>

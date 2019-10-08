<?php include 'inc/header.php'?>
  <div class="container-fluid">
    <h2 class="page-header">Modifica Anamnesi</h2>
  </div>
  <hr>
  <div class="container-fluid">
    <form method="POST" action="modifica.php?id=<?php echo $paziente->id; ?>">
      <?php $counter=0; ?>
      <?php foreach($anamnesi as $value) : ?>
        <?php if(!is_numeric($value)) : ?>
          <?php $counter += 1; ?>
          <div class="form-group">
            <label>Domanda-<?php echo $counter; ?></label>
            <input type="text" class="form-control" name="risposta_<?php echo $counter; ?>" value="<?php echo $value; ?>"></input>
          </div>
        <?php endif; ?>
      <?php endforeach; ?>

      <div class="container-fluid row">
        <div class="fill"><h4><a href="anamnesi.php?id=<?php echo $paziente->id?>">Indietro</a></h4></div>
        <div class="fill"><button type="submit" class="btn btn-primary btn-lg" name="submit">Invia</button></div>
      </div>
    </form>

  </div>
<?php include 'inc/footer.php'?>

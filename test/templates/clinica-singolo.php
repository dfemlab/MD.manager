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

<?php if($dente_selezionato) : ?>
  <hr>
  <div class="container-fluid">
    <div class="container-fluid">
      <h3 class="page-header">Opzioni per <?php echo $dente_selezionato; ?>:</h3>
    </div>
  <div class="container-fluid">
  <form method="POST" action="clinica.php">
    <div class="row">

            <?php $op_counter = 1;?>

            <?php foreach($opzioni as $opzione):?>
              <div clas="col">
              <?php $temp = "$dente_selezionato". "$opzione->nome";?>

              <div class="container-fluid"><li class="list-group-item"> <strong></strong><?php echo $clinica->$temp; ?></li></div>
            </div>
            <?php $op_counter +=1;?>
            <?php endforeach;?>
          </select>
            </div>
      </form>
</div>

<?php endif;?>
<hr>
<div class="container">
  <div class="container-fluid">
  <div class="row">
    <?php $counter = 0; ?>
    <?php foreach($denti as $dente) : ?>
      <?php $counter += 1;?>
      <?php if($counter <= 16): ?>
        <div class="fill col-xs-1" style="margin: 10px !important;">
          <img usemap="#<?php echo $dente->nome?>_map" src="images/denti_samples/<?php echo $dente->nome?>.png" style="max-height: 50px; max-width: 20px;"/>
          <br>
          <?php echo substr($dente->nome,6,7); ?>
          <map name="<?php echo $dente->nome?>_map">
            <area shape="rect" coords="0,0,20,50" href="clinica.php?id=<?php echo $paziente->id;?>&dente=<?php echo $dente->nome?>"/>
          </map>
        </div>
        <?php if($counter == 8) :?>
        <hr class="vl" style="margin-left:18px; margin-right:15px;">
        <?php elseif($counter==16) :?>
      </div>
      <div class="row">
      <?php endif; ?>
      <?php elseif($counter > 16) : ?>
        <div class="fill col-xs-1" style="margin: 11px !important;">
          <img usemap="#<?php echo $dente->nome?>_map" src="images/denti_samples/<?php echo $dente->nome?>.png" style="max-height: 50px; max-width: 20px;"/>
          <br>
          <?php echo substr($dente->nome,6,7); ?>
          <map name="<?php echo $dente->nome?>_map">
            <area shape="rect" coords="0,0,20,50" href="clinica.php?id=<?php echo $paziente->id;?>&dente=<?php echo $dente->nome?>"/>
          </map>
        </div>
        <?php if($counter == 24) :?>
          <hr class="vl" style="margin-left:5px; margin-right:10px;">
        <?php endif; ?>
      <?php endif; ?>
    <?php endforeach; ?>
  </div>
</div>
  </div>

</div>
<div class="container-fluid">
  <div class="row">
    <div class="fill"><h4><a class="text-primary" href="paziente.php?id=<?php echo $paziente->id; ?>">Indietro</a></h4></div>
    <div class="fill"><a class="btn btn-primary btn-lg" href="#">Modifica</a></div>
  </div>
</div>
<?php include 'inc/footer.php'?>

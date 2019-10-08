<?php include 'inc/header.php'?>

<div class="container-fluid">
  <div class="container-fluid">
    <div class="row">
      <div style="text-align:left;" class="col"><a href="calendario.php?offset=<?php echo $offset-1;?>&&primo_giorno=<?php if($primo_giorno - $prev_num%7>=0) echo $primo_giorno - $prev_num%7; else echo 7 + $primo_giorno - $prev_num%7; ?>&&temp=<?php if($curr==1) echo $temp-1; else echo $temp;?><?php if($date) : ?>&&date=<?php echo $date; endif;?>"><h2><<h2></a></div>
      <div style="text-align:center;"><h3><?php echo $mese; ?> - <?php echo $anno;?></h3></div>
      <div style="text-align:right;" class="col"><a href="calendario.php?offset=<?php echo $offset+1;?>&&primo_giorno=<?php echo $num%7 + $primo_giorno;?>&&temp=<?php if($curr==12) echo $temp+1; else echo $temp;?><?php if($date) : ?>&&date=<?php echo $date; endif;?>"><h2>><h2></a></div>
      </div>
  </div>
  <div class="container-fluid">
  <table class="table table-bordered">
    <thead>
      <tr>
        <?php $counter = 1;?>
      <?php foreach($giorni as $giorno) : ?>
          <th scope="col"><div style="text-align:center;"><p5
            <?php if($counter%7==0) : ?>
              class="text-secondary"
            <?php elseif($counter%7==6) : ?>
              class="text-info"
            <?php else : ?>
              class="text"
            <?php endif;?>
            ><?php echo $giorno->nome;?></p5></div>
          </th>
          <?php $counter += 1;?>
      <?php endforeach;?>
      </tr>
    </thead>
    <?php $counter = 1;?>
    <?php $day_counter = 1;?>
    <tbody>
        <tr>
        <?php foreach($giorni as $giorno) : ?>
          <td <?php if($mese_id == date('n') && $day_counter==date('d') && $anno == date('Y')) :?>style="background-color: #FFEE87;" <?php endif;?>>
            <?php if($counter >= $primo_giorno && $day_counter<= $num) : ?>
              <a
              <?php if($counter%7==0) : ?>
                class="text-secondary"
              <?php elseif($counter%7==6) : ?>
                class="text-info"
              <?php else : ?>
                class="text"
              <?php endif;?>
              href="calendario.php?date=<?php echo $anno;?>-<?php echo $mese_id;?>-<?php echo $day_counter;?>&&offset=<?php echo $offset;?>&&temp=<?php echo $temp;?>"><div style="text-align:center;"><?php echo $day_counter++;?></div></a>
              <?php $counter++;?>

            <?php else : ?>
              <?php $counter++;?>
            <?php endif; ?>
          </td>
        <?php endforeach;?>
        </tr>

        <tr>
        <?php foreach($giorni as $giorno) : ?>
          <td <?php if($mese_id == date('n') && $day_counter==date('d') && $anno == date('Y')) :?>style="background-color: #FFEE87;" <?php endif;?>>
            <?php if($counter >= $primo_giorno && $day_counter<= $num) : ?>
              <a
              <?php if($counter%7==0) : ?>
                class="text-secondary"
              <?php elseif($counter%7==6) : ?>
                class="text-info"
              <?php else : ?>
                class="text-link"
              <?php endif;?>
              href="calendario.php?date=<?php echo $anno;?>-<?php echo $mese_id;?>-<?php echo $day_counter;?>&&offset=<?php echo $offset;?>&&temp=<?php echo $temp;?>"><div style="text-align:center;"><?php echo $day_counter++;?></div></a>
              <?php $counter++;?>

            <?php else : ?>
              <?php $counter++;?>
            <?php endif; ?>
          </td>
        <?php endforeach;?>
        </tr>

        <tr>
        <?php foreach($giorni as $giorno) : ?>
          <td <?php if($mese_id == date('n') && $day_counter==date('d') && $anno == date('Y')) :?>style="background-color: #FFEE87;" <?php endif;?>>
            <?php if($counter >= $primo_giorno && $day_counter<= $num) : ?>
              <a
              <?php if($counter%7==0) : ?>
                class="text-secondary"
              <?php elseif($counter%7==6) : ?>
                class="text-info"
              <?php else : ?>
                class="text-link"
              <?php endif;?>
              href="calendario.php?date=<?php echo $anno;?>-<?php echo $mese_id;?>-<?php echo $day_counter;?>&&offset=<?php echo $offset;?>&&temp=<?php echo $temp;?>"><div style="text-align:center;"><?php echo $day_counter++;?></div></a>
              <?php $counter++;?>

            <?php else : ?>
              <?php $counter++;?>
            <?php endif; ?>
          </td>
        <?php endforeach;?>
        </tr>

        <tr>
        <?php foreach($giorni as $giorno) : ?>
          <td <?php if($mese_id == date('n') && $day_counter==date('d') && $anno == date('Y')) :?>style="background-color: #FFEE87;" <?php endif;?>>
            <?php if($counter >= $primo_giorno && $day_counter<= $num) : ?>
              <a
              <?php if($counter%7==0) : ?>
                class="text-secondary"
              <?php elseif($counter%7==6) : ?>
                class="text-info"
              <?php else : ?>
                class="text-link"
              <?php endif;?>
              href="calendario.php?date=<?php echo $anno;?>-<?php echo $mese_id;?>-<?php echo $day_counter;?>&&offset=<?php echo $offset;?>&&temp=<?php echo $temp;?>"><div style="text-align:center;"><?php echo $day_counter++;?></div></a>
              <?php $counter++;?>

            <?php else : ?>
              <?php $counter++;?>
            <?php endif; ?>
          </td>
        <?php endforeach;?>
        </tr>

        <tr>
        <?php foreach($giorni as $giorno) : ?>
          <td <?php if($mese_id == date('n') && $day_counter==date('d') && $anno == date('Y')) :?>style="background-color: #FFEE87;" <?php endif;?>>
            <?php if($counter >= $primo_giorno && $day_counter<= $num) : ?>
              <a
              <?php if($counter%7==0) : ?>
                class="text-secondary"
              <?php elseif($counter%7==6) : ?>
                class="text-info"
              <?php else : ?>
                class="text-link"
              <?php endif;?>
              href="calendario.php?date=<?php echo $anno;?>-<?php echo $mese_id;?>-<?php echo $day_counter;?>&&offset=<?php echo $offset;?>&&temp=<?php echo $temp;?>"><div style="text-align:center;"><?php echo $day_counter++;?></div></a>
              <?php $counter++;?>

            <?php else : ?>
              <?php $counter++;?>
            <?php endif; ?>
          </td>
        <?php endforeach;?>
        </tr>

        <tr>
        <?php foreach($giorni as $giorno) : ?>
          <td <?php if($mese_id == date('n') && $day_counter==date('d') && $anno == date('Y')) :?>style="background-color: #FFEE87;" <?php endif;?>>
            <?php if($counter >= $primo_giorno && $day_counter<= $num) : ?>
              <a
              <?php if($counter%7==0) : ?>
                class="text-secondary"
              <?php elseif($counter%7==6) : ?>
                class="text-info"
              <?php else : ?>
                class="text-link"
              <?php endif;?>
              href="calendario.php?date=<?php echo $anno;?>-<?php echo $mese_id;?>-<?php echo $day_counter;?>&&offset=<?php echo $offset;?>&&temp=<?php echo $temp;?>"><div style="text-align:center;"><?php echo $day_counter++;?></div></a>
              <?php $counter++;?>

            <?php else : ?>
              <?php $counter++;?>
            <?php endif; ?>
          </td>
        <?php endforeach;?>
        </tr>

</tbody>
  </table>
  </div>
</div>

<hr>

<div class="container-fluid">
  <h4>Appuntamenti del giorno <?php echo $date; ?> :</h4>
</div>


<?php if(isset($appuntamenti)) : ?>
<div class="container-fluid">
  <?php foreach($appuntamenti as $appuntamento):?>
    <?php //$paziente = $paziente->getPaziente($appuntamento->id_paziente);?>
    <div class="row">
      <div class="col">
        <div class="form-group">
          <label>Orario</label>
          <input type="text" class="form-control" name="nome" value="<?php echo $appuntamento->orario; ?>"></input>
        </div>
      </div>

      <div class="col">
        <div class="form-group">
          <label>Paziente</label>
          <input type="text" class="form-control" name="nome" value="<?php echo $appuntamento->paziente; ?>"></input>
        </div>
      </div>

      <div class="col">
        <div class="form-group">
          <label>Prestazione</label>
          <input type="text" class="form-control" name="nome" value="<?php echo $appuntamento->prestazione; ?>"></input>
        </div>
      </div>

      <div class="col">
        <div class="form-group">
          <label>Operatore</label>
          <input type="text" class="form-control" name="nome" value="<?php echo $appuntamento->operatore; ?>"></input>
        </div>
      </div>
    </div>
  <?php endforeach;?>

  <hr>
<form method="POST" action="calendario.php">
  <div class="row">
    <div class="col">
      <div class="form-group">
        <label>Orario</label>
        <input type="text" class="form-control" name="orario"></input>
      </div>
    </div>

    <div class="col">
      <div class="form-group">
        <label>Paziente</label>
        <input type="text" class="form-control" name="paziente"></input>
      </div>
    </div>

    <div class="col">
      <div class="form-group">
        <label>Prestazione</label>
        <input type="text" class="form-control" name="prestazione"></input>
      </div>
    </div>

    <div class="col">
      <div class="form-group">
        <label>Operatore</label>
        <input type="text" class="form-control" name="operatore"></input>
      </div>
    </div>
  </div>
  <input type="hidden" name="data" value="<?php echo $date; ?>">
  <div class="col"><br><button type="submit" class="btn btn-primary btn-lg" name="submit">Aggiungi</button></div>
</form>
</div>
<?php else : ?>
<?php endif;?>

<?php include 'inc/footer.php'?>

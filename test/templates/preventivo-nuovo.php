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
<form method="POST" action="preventivo.php">
      <label for="exampleTextarea">Note di <?php echo $paziente->nome. ' '. $paziente->cognome; ?></label>
      <textarea class="form-control" id="exampleTextarea" name="note" rows="3">note:<?php echo $paziente->note;?></textarea>
    </form>
  </div>


<div class="container-fluid">
  <form method="POST" action="preventivo.php">
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col"></th>
      <?php $tab_cnt=1;?>
    <?php foreach($opzioni as $opzione) : ?>
        <th scope="col">Opzione <?php echo $tab_cnt;?></th>
        <?php $tab_cnt++;?>
    <?php endforeach;?>
    </tr>
  </thead>
  <tbody>
    <?php foreach($denti as $dente) :?>
    <tr>
      <th scope="row"><?php echo $dente->nome?></th>
      <?php foreach($opzioni as $opzione) :?>
        <?php $dente_sel = "$dente->nome". "$opzione->nome";?>
        <td>
          <select class="custom-select" name="<?php echo $dente_sel;?>">
            <option value="<?php echo $clinica->$dente_sel;?>"><?php echo $clinica->$dente_sel;?></option>
            <?php foreach($prestazioni as $prestazione) :?>
              <option value="<?php echo $prestazione->nome; ?>"><?php echo $prestazione->nome; ?></option>
            <?php endforeach;?>
          </select>
        </td>
      <?php endforeach;?>
    </tr>
    <?php endforeach;?>
  </tbody>
</table>

    <div class="container" style="text-align:center;">
      <input type="hidden" name="id" value="<?php echo $paziente->id; ?>"></input>
      <button type="submit" class="btn btn-primary btn-lg" name="submit">Aggiorna</button>
    </div>
  </form>
</div>



<div class="container-fluid">
  <h2 class="page-header">1) Prestazione prima: </h2>
  <form method="POST" action="preventivo.php">

<select class="custom-select" name="prestazione_sel">
  <option value="0">Scegli una Prestazione</option>
  <?php foreach($prestazioni as $prestazione) :?>
    <option value="<?php echo $prestazione->nome; ?>"><?php echo $prestazione->nome; ?></option>
  <?php endforeach;?>
</select>
<div class="form-group">

    <?php $counter=0; ?>
    <?php $dente_sel = "default";?>
  <?php foreach($denti as $dente) :?>
    <?php if($counter%8==0):?>
  <div class="row">
    <?php endif;?>

    <?php foreach($opzioni as $opzione):?>
      <?php $temp = "$dente->nome". "$opzione->nome";?>
      <?php if($clinica->$temp==null):?>
        <?php $dente_sel=$temp;?>
        <?php break;?>
      <?php endif;?>
    <?php endforeach;?>
        <div class="col">
          <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="customCheck<?php echo $counter;?>" name="<?php echo $dente_sel;?>" <?php if($dente_sel=="default") : ?> disabled=""<?php endif;?>>
            <label class="custom-control-label" for="customCheck<?php echo $counter;?>"><?php echo $dente->nome;?></label>
          </div>
        </div>

        <?php $dente_sel = "default";?>
    <?php $counter++;?>
    <?php if($counter%8==0):?>
      </div>
    <?php endif;?>
  <?php endforeach;?>
</div>
<div class="container" style="text-align:center;">
<input type="hidden" name="id" value="<?php echo $paziente->id; ?>"></input>
<button type="submit" class="btn btn-primary btn-lg" name="submit1">Aggiorna</button>
</div>
</form>
</div>




<div class="container-fluid">
  <h2 class="page-header">2) Dente prima: </h2>
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

  <!-- Tabs -->
  <section id="tabs">
  	<div class="container">
  		<div class="row">
        <nav>
          <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
            <?php $tab_counter= 0;?>
            <?php foreach($denti as $dente) : ?>
              <?php if($tab_counter<8) : ?>
                  <a class="nav-item nav-link" id="nav-<?php echo $dente->nome; ?>-tab" data-toggle="tab" href="#nav-<?php echo $dente->nome; ?>" role="tab" aria-controls="nav-<?php echo $dente->nome; ?>" aria-selected="false"><?php echo $dente->nome; ?></a>
            <?php endif;?>
            <?php $tab_counter++; ?>
            <?php endforeach; ?>

            <?php $tab_counter= 0;?>
            <?php foreach($denti as $dente) : ?>
              <?php if($tab_counter>=8&&$tab_counter<16) : ?>
                  <a class="nav-item nav-link" id="nav-<?php echo $dente->nome; ?>-tab" data-toggle="tab" href="#nav-<?php echo $dente->nome; ?>" role="tab" aria-controls="nav-<?php echo $dente->nome; ?>" aria-selected="false"><?php echo $dente->nome; ?></a>
            <?php endif;?>
            <?php $tab_counter++; ?>
            <?php endforeach; ?>

            <?php $tab_counter= 0;?>
            <?php foreach($denti as $dente) : ?>
              <?php if($tab_counter>=16&&$tab_counter<24) : ?>
                <a class="nav-item nav-link" id="nav-<?php echo $dente->nome; ?>-tab" data-toggle="tab" href="#nav-<?php echo $dente->nome; ?>" role="tab" aria-controls="nav-<?php echo $dente->nome; ?>" aria-selected="false"><?php echo $dente->nome; ?></a>
            <?php endif;?>
            <?php $tab_counter++; ?>
            <?php endforeach; ?>

            <?php $tab_counter= 0;?>
            <?php foreach($denti as $dente) : ?>
              <?php if($tab_counter>=24&&$tab_counter<32) : ?>
                <a class="nav-item nav-link" id="nav-<?php echo $dente->nome; ?>-tab" data-toggle="tab" href="#nav-<?php echo $dente->nome; ?>" role="tab" aria-controls="nav-<?php echo $dente->nome; ?>" aria-selected="false"><?php echo $dente->nome; ?></a>
            <?php endif;?>
            <?php $tab_counter++; ?>
            <?php endforeach; ?>
          </div>
        </nav>

        <div class="container-fluid">
          <form method="POST" action="preventivo.php">
        <div class="tab-content" id="nav-tabContent">
          <?php $tab_counter= 0;?>
          <?php if($tab_counter>=0&&$tab_counter<32) : ?>
          <?php foreach($denti as $dente) : ?>
          <div class="tab-pane fade" id="nav-<?php echo $dente->nome; ?>" role="tabpanel" aria-labelledby="nav-<?php echo $dente->nome; ?>-tab">
            <div class="container-fluid">
            <div class="row">
            <?php foreach($opzioni as $opzione) :?>
              <?php $dente_sel = "$dente->nome". "$opzione->nome"; ?>
              <div class="col">
                <select class="custom-select" name="<?php echo $dente_sel;?>">
                  <option value="<?php echo $clinica->$dente_sel;?>"><?php echo $clinica->$dente_sel;?></option>
                  <?php foreach($prestazioni as $prestazione) :?>
                    <option value="<?php echo $prestazione->nome; ?>"><?php echo $prestazione->nome; ?></option>
                  <?php endforeach;?>
                </select>
              </div>
            <?php endforeach; ?>
          </div>

        </div>
          </div>
        <?php endforeach; ?>
        <?php $tab_counter++;?>
      <?php endif;?>
        </div>
        <div class="container" style="text-align:center;">
        <input type="hidden" name="id" value="<?php echo $paziente->id; ?>"></input>
        <button type="submit" class="btn btn-primary btn-lg" name="submit">Aggiorna</button>
      </div>
        </form>
      </div>

  		</div>
  	</div>
  </section>
</div>



<div class="container" style="text-align:center;">
  <div class="container-fluid" >
  <div class="row" style="margin-left: 19% !important; margin-right: 19% !important;">
    <?php $counter = 0; ?>
    <?php foreach($denti as $dente) : ?>
      <?php $counter += 1;?>
      <?php if($counter <= 16): ?>
        <div class="col-xs-1" style="margin: 10px !important;">
          <img usemap="#<?php echo $dente->nome?>_map" src="images/denti_samples/<?php echo $dente->nome?>.png" style="max-height: 50px; max-width: 20px;"/>
          <br>
          <?php echo substr($dente->nome,6,7); ?>
        </div>
        <?php if($counter == 8) :?>
        <hr class="vl" style="margin-left:18px; margin-right:15px;">
        <?php elseif($counter==16) :?>
      </div>
      <div class="row" style="margin-left: 19% !important; margin-right: 19% !important;">
      <?php endif; ?>
      <?php elseif($counter > 16) : ?>
        <div class="col-sx-1" style="margin: 11px !important;">
          <img usemap="#<?php echo $dente->nome?>_map" src="images/denti_samples/<?php echo $dente->nome?>.png" style="max-height: 50px; max-width: 20px;"/>
          <br>
          <?php echo substr($dente->nome,6,7); ?>
        </div>
        <?php if($counter == 24) :?>
          <hr class="vl" style="margin-left:5px; margin-right:10px;">
        <?php endif; ?>
      <?php endif; ?>
    <?php endforeach; ?>
  </div>
</div>
  </div>

<hr>
<?php include 'inc/footer.php'?>

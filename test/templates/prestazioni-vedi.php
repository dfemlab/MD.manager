<?php include 'inc/header.php'?>


<div class="container-fluid">
  <h2 class="page-header">Elenco delle Prestazioni</h2>
</div>
<hr>
<div class="container-fluid">
  <form method="POST" action="prestazioni.php">
    <?php foreach($prestazioni as $prestazione):?>
      <div class="row">
    <div class="col">
      <label>Nome</label>
      <input type="text" class="form-control" name="nome" value="<?php echo $prestazione->nome; ?>"></input>
    </div>
    <div class="col">
      <label>Prezzo</label>
      <input type="text" class="form-control" name="prezzo" value="<?php echo $prestazione->prezzo; ?>"></input>
    </div>

    <input type="hidden" name="id" value="<?php echo $prestazione->id;?>">

    <div class="fill"><button type="submit" class="btn btn-primary btn-lg" name="submit">Modifica</button></div>
    <div class="fill"><button type="submit" class="btn btn-danger btn-lg" name="delete">Elimina</button></div>

  </div>
    <?php endforeach;?>
    <br>

  </form>

    <h2 class="page-header">Nuova Prestazione</h2>
    <hr>

  <form method="POST" action="prestazioni.php">
      <div class="row">
    <div class="col">
      <label>Nome</label>
      <input type="text" class="form-control" name="nome" value="Nome"></input>
    </div>
    <div class="col">
      <label>Prezzo</label>
      <input type="text" class="form-control" name="prezzo" value="Prezzo"></input>
    </div>

    <div class="fill"><button type="submit" class="btn btn-primary btn-lg" name="nuovo">Aggiungi</button></div>
  </form>
  <div class="container-fluid row">
    <div class="fill"><h4><a href="index.php">Indietro</a></h4></div>
  </div>
</div>



<?php include 'inc/footer.php'?>

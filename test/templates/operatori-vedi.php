<?php include 'inc/header.php'?>


<div class="container-fluid">
  <h2 class="page-header">Operatori</h2>
</div>
<hr>
<div class="container-fluid">
  <form method="POST" action="operatori.php">
    <?php foreach($operatori as $operatore):?>
      <div class="row">
    <div class="col">
      <label>Nome</label>
      <input type="text" class="form-control" name="nome" value="<?php echo $operatore->nome; ?>"></input>
    </div>
    <div class="col">
      <label>Cognome</label>
      <input type="text" class="form-control" name="cognome" value="<?php echo $operatore->cognome; ?>"></input>
    </div>

    <input type="hidden" name="id" value="<?php echo $operatore->id;?>">

    <div class="fill"><button type="submit" class="btn btn-primary btn-lg" name="submit">Modifica</button></div>
    <div class="fill"><button type="submit" class="btn btn-danger btn-lg" name="delete">Elimina</button></div>

  </div>
    <?php endforeach;?>
    <br>

  </form>

    <h2 class="page-header">Nuovo Operatore</h2>
    <hr>

  <form method="POST" action="operatori.php">
      <div class="row">
    <div class="col">
      <label>Nome</label>
      <input type="text" class="form-control" name="nome" value="Nome"></input>
    </div>
    <div class="col">
      <label>Cognome</label>
      <input type="text" class="form-control" name="cognome" value="Cognome"></input>
    </div>

    <div class="fill"><button type="submit" class="btn btn-primary btn-lg" name="nuovo">Aggiungi</button></div>
  </form>
  <div class="container-fluid row">
    <div class="fill"><h4><a href="index.php">Indietro</a></h4></div>
  </div>
</div>



<?php include 'inc/footer.php'?>

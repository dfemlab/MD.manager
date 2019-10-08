<?php include 'inc/header.php'?>

  <div class="container-fluid">
  <div class="row">
    <div class="fill col-md">
    <h2 class="page-header">Nuovo Paziente</h2>
  </div>

  <div class="fill col-md">
    <img src = "images/empty.png" style="max-width: 30%;"/>
  </div>
</div>
</div>
  <br><br>
  <hr>
  <div class="container-fluid">
  <div class="container-fluid">
    <form method="POST" action="nuovo.php">
      <div class="form-group">
        <label>Nome</label>
        <input type="text" class="form-control" name="nome"></input>
      </div>
      <div class="form-group">
        <label>Cognome</label>
        <input type="text" class="form-control" name="cognome"></input>
      </div>
      <div class="form-group">
        <label>Codice Fiscale</label>
        <input type="text" class="form-control" name="codice_fiscale"></input>
      </div>
      <div class="form-group">
        <label>Indirizzo</label>
        <input type="text" class="form-control" name="indirizzo"></input>
      </div>
      <div class="form-group">
        <label>Telefono-1</label>
        <input type="text" class="form-control" name="telefono_1"></input>
      </div>
      <div class="form-group">
        <label>Telefono-2</label>
        <input type="text" class="form-control" name="telefono_2"></input>
      </div>
      <div class="form-group">
        <label>E-mail</label>
        <input type="text" class="form-control" name="email"></input>
      </div>
      <div class="form-group">
        <label>Domanda-1</label>
        <input type="text" class="form-control" name="risposta_1"></input>
      </div>
      <div class="form-group">
        <label>Domanda-2</label>
        <input type="text" class="form-control" name="risposta_2"></input>
      </div>
      <div class="form-group">
        <label>Domanda-3</label>
        <input type="text" class="form-control" name="risposta_3"></input>
      </div>

      <div class="container-fluid row">
        <div class="fill"><h4><a href="index.php">Indietro</a></h4></div>
        <div class="fill"><button type="submit" class="btn btn-primary btn-lg" name="submit">Invio</button></div>
      </div>
    </form>
  </div>
</div>
<?php include 'inc/footer.php'?>

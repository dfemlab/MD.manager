<?php include 'inc/header.php'?>
  <div class="container-fluid">
    <h2 class="page-header">Modifica Anagrafica</h2>
  </div>
  <hr>
  <div class="container-fluid">
    <form method="POST" action="edit.php?id=<?php echo $paziente->id; ?>">
      <div class="form-group">
        <label>Nome</label>
        <input type="text" class="form-control" name="nome" value="<?php echo $paziente->nome; ?>"></input>
      </div>
      <div class="form-group">
        <label>Cognome</label>
        <input type="text" class="form-control" name="cognome" value="<?php echo $paziente->cognome; ?>"></input>
      </div>
      <div class="form-group">
        <label>Codice Fiscale</label>
        <input type="text" class="form-control" name="codice_fiscale" value="<?php echo $paziente->codice_fiscale; ?>"></input>
      </div>
      <div class="form-group">
        <label>Indirizzo</label>
        <input type="text" class="form-control" name="indirizzo" value="<?php echo $paziente->indirizzo; ?>"></input>
      </div>
      <div class="form-group">
        <label>Telefono-1</label>
        <input type="text" class="form-control" name="telefono_1" value="<?php echo $paziente->telefono_1; ?>"></input>
      </div>
      <div class="form-group">
        <label>Telefono-2</label>
        <input type="text" class="form-control" name="telefono_2" value="<?php echo $paziente->telefono_2; ?>"></input>
      </div>
      <div class="form-group">
        <label>E-mail</label>
        <input type="text" class="form-control" name="email" value="<?php echo $paziente->email; ?>"></input>
      </div>

      <div class="container-fluid row">
        <div class="fill"><h4><a href="paziente.php?id=<?php echo $paziente->id?>">Indietro</a></h4></div>
        <div class="fill"><button type="submit" class="btn btn-primary btn-lg" name="submit">Invia</button></div>
          <form method="GET" action="edit.php">
            <input type="hidden" name="del_id" value="<?php echo $paziente->id; ?>">
            <div class="fill"><button class="btn btn-danger btn-lg" type="submit">Elimina</button></div>
          </form>
      </div>

      <br>

      <br><br>


    </form>

  </div>
<?php include 'inc/footer.php'?>

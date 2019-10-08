<?php include 'inc/header.php'?>


  <form method="POST" action="elenco.php">
      <div class="form-group">
        <div class="input-group mb-3">
          <div class="container-fluid row">
            <div class="fill"><input name="cognome" type="text" class="form-control" id="" placeholder="Cognome"></div>
            <div class="fill"><input name="nome" type="text" class="form-control" id="" placeholder="Nome"></div>
            <div class="fill"><button type="submit" class="btn btn-primary btn-lg">Cerca</button></div>
          </div>
        </div>
      </div>
    </form>


<div class="container-fluid row">
  <div class="col-4">Seleziona una lettera per filtrare i pazienti: </div>
  <div><a href="elenco.php?index=<?php echo 'A'; ?>">A</a></div><div>-</div>
  <div><a href="elenco.php?index=<?php echo 'B'; ?>">B</a></div><div>-</div>
  <div><a href="elenco.php?index=<?php echo 'C'; ?>">C</a></div><div>-</div>
  <div><a href="elenco.php?index=<?php echo 'D'; ?>">D</a></div><div>-</div>
  <div><a href="elenco.php?index=<?php echo 'E'; ?>">E</a></div><div>-</div>
  <div><a href="elenco.php?index=<?php echo 'F'; ?>">F</a></div><div>-</div>
  <div><a href="elenco.php?index=<?php echo 'G'; ?>">G</a></div><div>-</div>
  <div><a href="elenco.php?index=<?php echo 'H'; ?>">H</a></div><div>-</div>
  <div><a href="elenco.php?index=<?php echo 'I'; ?>">I</a></div><div>-</div>
  <div><a href="elenco.php?index=<?php echo 'J'; ?>">J</a></div><div>-</div>
  <div><a href="elenco.php?index=<?php echo 'K'; ?>">K</a></div><div>-</div>
  <div><a href="elenco.php?index=<?php echo 'L'; ?>">L</a></div><div>-</div>
  <div><a href="elenco.php?index=<?php echo 'M'; ?>">M</a></div><div>-</div>
  <div><a href="elenco.php?index=<?php echo 'N'; ?>">N</a></div><div>-</div>
  <div><a href="elenco.php?index=<?php echo 'O'; ?>">O</a></div><div>-</div>
  <div><a href="elenco.php?index=<?php echo 'P'; ?>">P</a></div><div>-</div>
  <div><a href="elenco.php?index=<?php echo 'Q'; ?>">Q</a></div><div>-</div>
  <div><a href="elenco.php?index=<?php echo 'R'; ?>">R</a></div><div>-</div>
  <div><a href="elenco.php?index=<?php echo 'S'; ?>">S</a></div><div>-</div>
  <div><a href="elenco.php?index=<?php echo 'T'; ?>">T</a></div><div>-</div>
  <div><a href="elenco.php?index=<?php echo 'U'; ?>">U</a></div><div>-</div>
  <div><a href="elenco.php?index=<?php echo 'V'; ?>">V</a></div><div>-</div>
  <div><a href="elenco.php?index=<?php echo 'W'; ?>">W</a></div><div>-</div>
  <div><a href="elenco.php?index=<?php echo 'X'; ?>">X</a></div><div>-</div>
  <div><a href="elenco.php?index=<?php echo 'Y'; ?>">Y</a></div><div>-</div>
  <div><a href="elenco.php?index=<?php echo 'Z'; ?>">Z</a></div><div>. Oppure: </div>
  <div class="col"><a href="elenco.php"> mostra tutti</a></div>
</div>

<div class="container-fluid">
<?php foreach($pazienti as $paziente): ?>

<div class="container-fluid row">
  <div><a href="paziente.php?id=<?php echo $paziente->id; ?>"><?php echo $paziente->cognome. ' '.$paziente->nome;?></a></div>
<?php endforeach; ?>
</div>
</div>
<?php include 'inc/footer.php'?>

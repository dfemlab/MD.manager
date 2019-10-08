<?php include_once 'config/init.php'; ?>

<?php
$paziente = new Paziente;

$template = new Template('templates/operatori-vedi.php');

$template->operatori = $paziente->getOperatori();



if(isset($_POST['submit'])){
  $data['id'] = $_POST['id'];
  $data['nome'] = $_POST['nome'];
  $data['cognome'] = $_POST['cognome'];

  if($paziente->aggiornaOperatori($data)) redirect('operatori.php', 'Operatore modificato con successo', 'success');
  else redirect('index.php', 'Errore nella modifica dell\'operatore', 'error');
}


if(isset($_POST['delete'])){
  $id = $_POST['id'];

  if($paziente->eliminaOperatore($id)) redirect('operatori.php', 'Operatore eliminato con successo', 'success');
  else redirect('index.php', 'Errore nella eliminazione dell\'operatore', 'error');
}

if(isset($_POST['nuovo'])){
  $data['nome'] = $_POST['nome'];
  $data['cognome'] = $_POST['cognome'];

  if($paziente->nuovoOperatore($data)) redirect('operatori.php', 'Operatore aggiunto con successo', 'success');
  else redirect('index.php', 'Errore nell\' aggiunta dell\' operatore', 'error');
}


echo $template;
?>

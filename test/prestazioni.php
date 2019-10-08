<?php include_once 'config/init.php'; ?>

<?php
$paziente = new Paziente;

$template = new Template('templates/prestazioni-vedi.php');

$template->prestazioni = $paziente->getPrestazioni();



if(isset($_POST['submit'])){
  $data['id'] = $_POST['id'];
  $data['nome'] = $_POST['nome'];
  $data['prezzo'] = $_POST['prezzo'];

  if($paziente->aggiornaPrestazioni($data)) redirect('prestazioni.php', 'Prestazione modificata con successo', 'success');
  else redirect('index.php', 'Errore nella modifica della prestazione', 'error');
}


if(isset($_POST['delete'])){
  $id = $_POST['id'];

  if($paziente->eliminaPrestazione($id)) redirect('prestazioni.php', 'Prestazione eliminata con successo', 'success');
  else redirect('index.php', 'Errore nella eliminazione della prestazione', 'error');
}

if(isset($_POST['nuovo'])){
  $data['nome'] = $_POST['nome'];
  $data['prezzo'] = $_POST['prezzo'];

  if($paziente->nuovoPrestazione($data)) redirect('prestazioni.php', 'Prestazione aggiunta con successo', 'success');
  else redirect('index.php', 'Errore nell\' aggiunta dell\' operatore', 'error');
}


echo $template;
?>

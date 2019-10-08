<?php include_once 'config/init.php'; ?>

<?php
$paziente = new Paziente;

$id_paziente = isset($_GET['id']) ? $_GET['id'] : null;

if(isset($_POST['submit'])){
  $data=array();
  $data['risposta_1'] = $_POST['risposta_1'];
  $data['risposta_2'] = $_POST['risposta_2'];
  $data['risposta_3'] = $_POST['risposta_3'];

  if($paziente->aggiornaAnamnesi($id_paziente, $data)){
    redirect('index.php', 'Anamnesi modificata con successo', 'success');
  } else {
    redirect('index.php', 'Qualcosa è andato storto', 'error');
  }
}

$template = new Template('templates/anamnesi-modifica.php');

$template->paziente = $paziente->getPaziente($id_paziente);
$template->anamnesi = $paziente->getAnamnesi($id_paziente);

echo $template;
?>

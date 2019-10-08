<?php include_once 'config/init.php'; ?>

<?php
$paziente = new Paziente;

$id_paziente = isset($_GET['id']) ? $_GET['id'] : null;

$template = new Template('templates/preventivo-nuovo.php');
$template->paziente = $paziente->getPaziente($id_paziente);
$denti = $paziente->getDenti();
$template->denti = $denti;
$cliniche = $paziente->getClinicaObj();
$template->clinica = $paziente->getClinica($id_paziente);
$opzioni = $paziente->getOpzioni();
$template->opzioni = $opzioni;

$template->prestazioni = $paziente->getPrestazioni();


if(isset($_POST['submit1'])){
  $data=array();

  $prestazione_sel = $_POST['prestazione_sel'];
  $data['id'] = $_POST['id'];
  foreach($cliniche as $clinica){
    if($clinica->id==$data['id']) break;
  }
  foreach($denti as $dente){
    foreach($opzioni as $opzione){
      $dente_sel = "$dente->nome". "$opzione->nome";
      if(isset($_POST["$dente_sel"])) {
        $data["$dente_sel"] = $prestazione_sel;
      } else {
        $data["$dente_sel"] = $clinica->$dente_sel;
      }
    }
  }

  if($paziente->nuovoPreventivo($data)){
    redirect('preventivo.php?id='. $data['id'], 'Preventivo Aggiornato', 'success');
  } else {
    redirect('index.php', 'Qualcosa è andato storto', 'error');
  }
}

if(isset($_POST['submit'])){
  $data_op=array();

  $data_op['id'] = $_POST['id'];
  foreach($denti as $dente){
    foreach($opzioni as $opzione){
      $dente_sel = "$dente->nome". "$opzione->nome";
      $data_op["$dente_sel"] = isset($_POST["$dente_sel"]) ? $_POST["$dente_sel"] : null;
    }
  }
  if($paziente->nuovoPreventivo($data_op)){
    redirect('preventivo.php?id='. $data_op['id'], 'Preventivo Aggiornato', 'success');
  } else {
    redirect('index.php', 'Qualcosa è andato storto', 'error');
  }
}

echo $template;
?>

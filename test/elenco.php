<?php include_once 'config/init.php'; ?>


<?php
$paziente = new Paziente;


$index = isset($_GET['index']) ? $_GET['index'] : null;

$nome = isset($_POST['nome']) ? $_POST['nome'] : null;
$cognome = isset($_POST['cognome']) ? $_POST['cognome'] : null;

$template = new Template('templates/elenco-pazienti.php');

if($nome && $cognome){
  $template->title = "$nome"." ". "$cognome";
  $template->pazienti = $paziente->getByNomeCognome($nome, $cognome);
} elseif ($nome) {
  $template->title = "$nome";
  $template->pazienti = $paziente->getByNome($nome);
} elseif ($cognome) {
  $template->title = "$cognome";
  $template->pazienti = $paziente->getByCognome($cognome);
} else {
  if($index) {
    $pazienti_validi = array();

    $pazienti_tutti = $paziente->getAllPazienti();

    foreach($pazienti_tutti as $current) {
      if(strcasecmp($index, substr($current->cognome, 0, 1)) == 0) array_push($pazienti_validi, $current);
    }
    $template->pazienti = $pazienti_validi;

  } else {
    $template->pazienti = $paziente->getAllPazienti();
  }
}




echo $template;
?>

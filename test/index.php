<?php include_once 'config/init.php'; ?>

<?php
$paziente = new Paziente;

$template = new Template('templates/frontpage.php');

$nome = isset($_POST['nome']) ? $_POST['nome'] : null;
$cognome = isset($_POST['cognome']) ? $_POST['cognome'] : null;


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
  $template->title = 'Pazienti Recenti';
  $template->pazienti = $paziente->getAllPazienti();
}

echo $template;
?>

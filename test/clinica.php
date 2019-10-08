<?php include_once 'config/init.php'; ?>

<?php
$paziente = new Paziente;

$id_paziente = isset($_GET['id']) ? $_GET['id'] : null;
$dente_selezionato = isset($_GET['dente']) ? $_GET['dente'] : null;



$template = new Template('templates/clinica-singolo.php');
$template->paziente = $paziente->getPaziente($id_paziente);
$template->denti = $paziente->getDenti();
$template->clinica = $paziente->getClinica($id_paziente);
$template->opzioni = $paziente->getOpzioni();
$template->dente_selezionato = $dente_selezionato;
$template->prestazioni = $paziente->getPrestazioni();

echo $template;
?>

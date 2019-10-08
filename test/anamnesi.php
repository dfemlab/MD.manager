<?php include_once 'config/init.php'; ?>

<?php
$paziente = new Paziente;

$id_paziente = isset($_GET['id']) ? $_GET['id'] : null;


$template = new Template('templates/paziente-anamnesi.php');
$template->paziente = $paziente->getPaziente($id_paziente);
$template->anamnesi = $paziente->getAnamnesi($id_paziente);

echo $template;
?>

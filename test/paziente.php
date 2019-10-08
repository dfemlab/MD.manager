<?php include_once 'config/init.php'; ?>

<?php
$paziente = new Paziente;


$template = new Template('templates/paziente-singolo.php');

$id_paziente = isset($_GET['id']) ? $_GET['id'] : null;


if(isset($_POST['profile'])){
  $data = array();

  $data['id'] = $_POST['id'];
  $data['profile'] = $_POST['profile'];
  redirect('paziente.php?id='. $data['id'], 'daje', 'success');
}
$template->paziente = $paziente->getPaziente($id_paziente);
echo $template;
?>

<?php include_once 'config/init.php'; ?>

<?php
$paziente = new Paziente;

if(isset($_GET['del_id'])) {
  $del_id = $_GET['del_id'];
  if($paziente->eliminaPaziente($del_id)){
    redirect('index.php', 'Paziente Eliminato', 'success');
  } else {
    redirect('index.php', 'Paziente non Eliminato', 'error');
  }
}

$id_paziente = isset($_GET['id']) ? $_GET['id'] : null;

if(isset($_POST['submit'])){
  $data=array();
  $data['nome'] = $_POST['nome'];
  $data['cognome'] = $_POST['cognome'];
  $data['codice_fiscale'] = $_POST['codice_fiscale'];
  $data['indirizzo'] = $_POST['indirizzo'];
  $data['telefono_1'] = $_POST['telefono_1'];
  $data['telefono_2'] = $_POST['telefono_2'];
  $data['email'] = $_POST['email'];


  if($paziente->aggiornaAnagrafica($id_paziente, $data)){
    redirect('index.php', 'Paziente modificato con successo', 'success');
  } else {
    redirect('index.php', 'Qualcosa è andato storto', 'error');
  }
}

$template = new Template('templates/paziente-modifica.php');

$template->paziente = $paziente->getPaziente($id_paziente);


echo $template;
?>

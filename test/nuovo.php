<?php include_once 'config/init.php'; ?>

<?php
$paziente = new Paziente;


if(isset($_POST['submit'])){
  $data_angrafica=array();

  $data_angrafica['nome'] = $_POST['nome'];
  $data_angrafica['cognome'] = $_POST['cognome'];
  $data_angrafica['codice_fiscale'] = $_POST['codice_fiscale'];
  $data_angrafica['indirizzo'] = $_POST['indirizzo'];
  $data_angrafica['telefono_1'] = $_POST['telefono_1'];
  $data_angrafica['telefono_2'] = $_POST['telefono_2'];
  $data_angrafica['email'] = $_POST['email'];

  $data_anamnesi=array();

  $data_anamnesi['risposta_1'] = $_POST['risposta_1'];
  $data_anamnesi['risposta_2'] = $_POST['risposta_2'];
  $data_anamnesi['risposta_3'] = $_POST['risposta_3'];

  if($paziente->nuovoPaziente($data_angrafica, $data_anamnesi)){
    redirect('index.php', 'Anagrafica aggiunta con successo', 'success');
  } else {
    redirect('index.php', 'Qualcosa è andato storto', 'error');
  }
}
$template = new Template('templates/paziente-nuovo.php');

echo $template;
?>

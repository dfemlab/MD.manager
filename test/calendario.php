<?php include_once 'config/init.php'; ?>

<?php
$paziente = new Paziente;

$date = isset($_GET['date']) ? $_GET['date'] : date('Y'). '-'. date('m'). '-' .date('d');

$offset = isset($_GET['offset']) ? $_GET['offset'] : 0;

$anno = isset($_GET['temp']) ? $_GET['temp'] : 0;

$primo_giorno = isset($_GET['primo_giorno']) ? $_GET['primo_giorno'] : (date('N') + 1 - (date('d')%7));



$template = new Template('templates/calendario-vedi.php');



if(isset($_POST['submit'])){
  $data = array();
  $data['orario']=$_POST['orario'];
  $data['paziente']=$_POST['paziente'];
  $data['prestazione']=$_POST['prestazione'];
  $data['operatore']=$_POST['operatore'];
  $data['data']=$_POST['data'];

  if($paziente->aggiungiAppuntamento($data)){
      redirect('calendario.php?date='. $data['data'], 'Appuntamento Aggiunto al Calendario', 'success');
  } else {
      redirect('index.php', 'Qualcosa è andato storto', 'error');
  }
}
$template->temp=$anno;

$template->offset = $offset%12;

$template->date = $date;

$template->paziente = $paziente;
if($date){
  $appuntamenti = $paziente->getAppuntamenti($date);
  $template->appuntamenti = $appuntamenti;
}
$giorni = $paziente->getGiorni();
$template->giorni = $giorni;

$mesi = $paziente->getMesi();


if($primo_giorno < 0) $primo_giorno = 1 - $primo_giorno;
elseif($primo_giorno==0) $primo_giorno = 7;
elseif($primo_giorno > 7) $primo_giorno=$primo_giorno%7;

$template->primo_giorno = $primo_giorno;




$curr_anno = date('Y');

$curr_mese = (date('m')-1 + $offset)%12 + 1;


if($curr_mese<=0){
  $curr_mese += 12;
}

$template->curr = $curr_mese;

$anno = $curr_anno + $anno;
$template->anno = $anno;

if(!($anno%4)) {
  if(!($anno%100)){
    if(!($anno%400)) $leap = 1; else $leap = 0;
  } else $leap=1;
} else $leap = 0;


foreach($mesi as $mese){
  if($mese->id == $curr_mese-1) $template->prev_num=$mese->num;
  elseif($mese->id == $curr_mese)  {
    if($mese->id==1) $template->prev_num=31;
    $template->num = $mese->num;
    if($mese->id==2) $template->num = $mese->num + $leap;
    if($mese->id==3) $template->prev_num = 28 + $leap;
    $template->mese = $mese->nome;
    $template->mese_id = $mese->id;
  }
}


echo $template;
?>

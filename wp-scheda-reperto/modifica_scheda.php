<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript" src = "modifica_scheda.js"></script>
<?php
include_once '/storage/ssd4/799/3511799/public_html/wp-content/plugins/wp-scheda-reperto/SchedaRepertoInterface.php';


$id = $_GET['id'];
$op = $_GET['operatore'];


$schedaRepertointerfaccia = new SchedaRepertoInterface();
$schedaRepertointerfaccia->createConn();
$scheda = $schedaRepertointerfaccia->readById($id);
$schedaRepertointerfaccia->closeConn();


$str =
		'<form id = "form_insert" name = "form_scheda2" action = "" method = "post">'.
		'<div id = "risposta"></div>'.
		'MODIFICA SCHEDA'.
		'<br> </br>'.
		'id*:<br></br>'.
		'<input type="text" id = "id_scheda_reperto" name = "id_scheda_reperto" value ='.htmlspecialchars($scheda->getId()). ' readonly><br></br>'.
		'Nome*:<br></br>'. 
		'<textarea id = "nome_scheda" name="nome_scheda" rows="2" cols="20" >'.htmlspecialchars($scheda->getNome()).'</textarea><br></br>'.
		'Tipo:<br></br>'. 
		'<textarea id = "tipo_scheda" name="tipo_scheda" rows="2" cols="20" >'.htmlspecialchars($scheda->getTipo()).'</textarea><br></br>'.
		'Materiale:<br></br>'. 
		'<textarea id = "materiale_scheda" name="materiale_scheda" rows="2" cols="20" >'.htmlspecialchars($scheda->getMateriale()).'</textarea><br></br>'.
		'Autore*:<br></br>'. 
		'<textarea id = "autore_scheda" name="autore_scheda" rows="2" cols="20" >'.htmlspecialchars($scheda->getAutore()).'</textarea><br></br>'.
		'Periodo:<br></br>'. 
		'<textarea id = "periodo_scheda" name="periodo_scheda" rows="2" cols="20" >'.htmlspecialchars($scheda->getPeriodo()).'</textarea><br></br>'.
		'Valore:<br></br>'. 
		'<input type="number" id = "valore_scheda" name="valore_scheda" step="1" value='.htmlspecialchars($scheda->getValore()).'><br></br>'.
		'Descrizione Short:<br></br>'.
		'<textarea id = "descrizione_short" name="descrizione_short" rows="10" cols="40" >'.htmlspecialchars($scheda->getDescrizioneShort()).'</textarea><br></br>'.
		'Descrizione Estesa:<br></br>'.
		'<textarea id = "descrizione_estesa" name="descrizione_estesa"  rows="20" cols="50" >'.htmlspecialchars($scheda->getDescrizioneEstesa()).'</textarea><br></br>'.
		'<input type="hidden" id = "operatore_museale" name = "operatore_museale" value =' .htmlspecialchars($op). '><br></br>'.
		'<input type="hidden" id = "pubblica" name = "pubblica" value = '.htmlspecialchars($scheda->getPubblica()). ' ><br></br>'.
		'<input type="submit" id = "invia" name = "invia" value="Invia">'.
		'<input type="reset" value="Resetta">'.
		'</form>';
		echo $str;
?>
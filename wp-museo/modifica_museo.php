<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript" src = "modifica.js"></script>
<?php

include_once '/storage/ssd4/799/3511799/public_html/wp-content/plugins/wp-museo/MuseoInterfaccia.php';

$museoInterfaccia = new MuseoInterfaccia();

$id = $_GET['id'];
$museoInterfaccia->createConn();
$museo = $museoInterfaccia->readById($id);
$museoInterfaccia->closeConn();

$str =
		'<form id = "form_insert" name = "form_museo2" action = "" method = "post">'.
		'<div id = "risposta"></div>'.
		'MODIFICA MUSEO'.
		'<br> </br>'.
		'id*:<br></br>'.
		'<input type="text" id = "id_museo" name = "id_museo" value ='.htmlspecialchars($museo->getId()). ' readonly><br></br>'.
		'Nome*:<br></br>'. 
		'<textarea id = "nome_museo" name="nome_museo" rows="2" cols="20" >'.htmlspecialchars($museo->getNome()).'</textarea><br></br>'.
		'Località*:<br></br>'.
		'<textarea id = "localita_museo" name="localita_museo" rows="2" cols="20" >'.htmlspecialchars($museo->getLocalita()).'</textarea><br></br>'.
		'Indirizzo*:<br></br>'.
		'<textarea id = "indirizzo_museo" name="indirizzo_museo"  rows="1" cols="30" >'.htmlspecialchars($museo->getIndirizzo()).'</textarea><br></br>'.
		'Cap*:<br></br>'.
		'<textarea id = "cap_museo" name = "cap_museo" rows="2" cols="10">'.htmlspecialchars($museo->getCap()). '</textarea><br></br>'.
		'Orario apertura:<br></br>'.
		'<input type="time" id = "orario_apertura_museo" name = "orario_apertura_museo" value =' .htmlspecialchars($museo->getOrarioApertura()). ' ><br></br>'.
		'Orario chiusura:<br></br>'.
		'<input type="time" id = "orario_chiusura_museo" name = "orario_chiusura_museo" value = '.htmlspecialchars($museo->getOrarioChiusura()). ' ><br></br>'.
		'Descrizione:<br></br>'.
		'<textarea id = "descrizione_museo" name="descrizione_museo" rows="10" cols="40" >'.htmlspecialchars($museo->getDescrizione()).'</textarea><br></br>'.
		'Email:<br></br>'.
		'<input type="email" id = "email_museo" name = "email_museo" value = '.htmlspecialchars($museo->getEmail()).'><br></br>'.
		'<input type="submit" id = "invia" name = "invia" value="Invia">'.
		'<input type="reset" value="Resetta">'.
		'</form>';
		echo $str;
?>
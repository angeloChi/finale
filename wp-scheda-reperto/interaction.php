<?php
	include_once '/storage/ssd4/799/3511799/public_html/wp-content/plugins/wp-scheda-reperto/SchedaRepertoInterface.php';
	$schedaReperto = new SchedaRepertoInterface();
	$schedaReperto->createConn();
	$id_scheda_reperto = urldecode($_POST['id_scheda_reperto']);
	
	$scheda = $schedaReperto->readById($id_scheda_reperto);
	
	if($scheda->getPubblica()==1){
		$output = array('nome' => $scheda->getNome(),'autore' => $scheda->getAutore(), 'descrizioneEstesa'=> $scheda->getDescrizioneEstesa());		print (json_encode($output));
	}else{
		$errore = array('Attenzione' => 'La scheda non è disponibile');
		print (json_encode($errore));
	}
	
	$schedaReperto->closeConn();
?>
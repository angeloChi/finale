<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript" src = "inserimento.js"></script>
<?php
include_once '/storage/ssd4/799/3511799/public_html/wp-content/plugins/wp-scheda-reperto/SchedaRepertoInterface.php';

$id_operatore=$_POST['operatore'];
$id_museo=$_POST['museo'];
$box= '<form id = "form_insert" name = "form_scheda" method = "post" action = "" >'.
				'<div class = "container" id = "risposta"></div>'.
				'Nome*:<br></br>'.
				'<input type="text" name = "nome_scheda" id = "nome_scheda"><br></br>'.
				'Tipo:<br></br>'.
				'<input type="text" name = "tipo_scheda" id = "tipo_scheda"><br></br>'.
				'Materiale:<br></br>'.
				'<input type="text" name = "materiale_scheda" id = "materiale_scheda"><br></br>'.
				'Autore*:<br></br>'.
				'<input type="text" name = "autore_scheda" id = "autore_scheda"><br></br>'.
				'Periodo:<br></br>'.
				'<input type="text" name = "periodo_scheda" id = "periodo_scheda"><br></br>'.
				'Valore:<br></br>'.
				'<input type="number" name = "valore_scheda" id = "valore_scheda" step="1"><br></br>'.
				'Descrizione Short:<br></br>'.
				'<textarea name = "descrizione_short" id="descrizione_short" rows="10" cols="40"></textarea><br></br>'.
				'Descrizione Estesa:<br></br>'.
				'<textarea name = "descrizione_estesa" id="descrizione_estesa" rows="20" cols="50"></textarea><br></br>'.
				'<input type="hidden" name = "operatore_museale" id="operatore_museale" value='.htmlspecialchars($id_operatore).'><br></br>'.
				'<input type="hidden" name = "museo" id="museo" value='.htmlspecialchars($id_museo).'><br></br>'.
				'<input type="submit" id = "invia" name = "invia" value="Invia">'.
				'<input type="reset" value="Resetta">'.
			'</form>';
			echo $box;
?>
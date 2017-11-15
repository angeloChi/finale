<?php
include_once '/storage/ssd4/799/3511799/public_html/wp-content/plugins/wp-scheda-reperto/SchedaRepertoInterface.php';

$id = $_POST['id'];
$nome = $_POST['nome'];
$tipo = $_POST['tipo'];
$materiale = $_POST['materiale'];
$autore = $_POST['autore'];
$periodo = $_POST['periodo'];
$valore = $_POST['valore'];
$descriziones = $_POST['descriziones'];
$descrizionee = $_POST['descrizionee'];
$operatore = $_POST['operatore'];
$pubblica = $_POST['pubblica'];

$scheda = new SchedaReperto($id,$nome,$tipo,$materiale,$autore,$periodo,$valore,$descriziones, $descrizionee, '', $operatore,'', $pubblica,'');
$schedaInterface = new SchedaRepertoInterface();
$schedaInterface->createConn();
$schedaInterface->updateSenzaQr($scheda);
$schedaInterface->closeConn();


echo'Operazione eseguita con successo!!!!';	
?>
<script type="text/javascript">
function redirect() {
		location.href = "../../../wp-admin/admin.php?page=wp-schedeReperto";
	}
window.setTimeout("redirect()", 50);
</script>

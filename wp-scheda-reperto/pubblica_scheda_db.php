<?php
include_once '/storage/ssd4/799/3511799/public_html/wp-content/plugins/wp-scheda-reperto/SchedaRepertoInterface.php';

$id_scheda=$_GET['id'];
$id_operatore=$_GET['operatore'];

$schedaInterface = new SchedaRepertoInterface();
$schedaInterface->createConn();
$schedaReperto = $schedaInterface->readById($id_scheda);


$schedaInterface->pubblica($schedaReperto,$id_operatore);
$schedaInterface->closeConn();

echo 'Operazione Eseguita!!!';
	
?>

<script type="text/javascript">
function redirect() {
		location.href = "../../../wp-admin/admin.php?page=wp-schedeReperto";
	}
window.setTimeout("redirect()", 50);
</script>

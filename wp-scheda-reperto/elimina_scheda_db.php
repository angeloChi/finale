<?php
   include_once '/storage/ssd4/799/3511799/public_html/wp-content/plugins/wp-scheda-reperto/SchedaRepertoInterface.php';
	
$schedaRepertoInterfaccia = new SchedaRepertoInterface(); //istanzio oggetto
$schedaRepertoInterfaccia->createConn();
	
	if($schedaRepertoInterfaccia->delete($_GET['id']) == 1)
		echo'Scheda Reperto Cancellata';
	else
		echo'Impossibile Cancellare la Scheda Reperto';
$schedaRepertoInterfaccia->closeConn();

?>
<script type="text/javascript">
	function redirect() {
		location.href = "../../../wp-admin/admin.php?page=wp-schedeReperto";
	}
window.setTimeout("redirect()", 50);
</script>
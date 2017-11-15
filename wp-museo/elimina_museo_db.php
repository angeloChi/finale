<?php
include_once '/storage/ssd4/799/3511799/public_html/wp-content/plugins/wp-museo/MuseoInterfaccia.php';
	
$museoInterfaccia = new MuseoInterfaccia(); //istanzio oggetto
$museoInterfaccia->createConn();

if($museoInterfaccia->delete($_GET['id'])==1)//controllo
	echo 'Cancellato';
else
	echo'Impossibile cancellare';
	
$museoInterfaccia->closeConn();
?>
<script type="text/javascript">
	function redirect() {
		location.href = "../../../wp-admin/admin.php?page=wp-museo";
	}
window.setTimeout("redirect()", 50);
</script>
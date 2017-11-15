<?php

include_once '/storage/ssd4/799/3511799/public_html/wp-content/plugins/wp-museo/MuseoInterfaccia.php';

$id = $_POST['id'];
$nome = $_POST['nome'];
$localita = $_POST['localita'];
$indirizzo = $_POST['indirizzo'];
$cap = $_POST['cap'];
$orario_ap = $_POST['orario_apertura'];
$orario_chiu =$_POST['orario_chiusura'];
$descrizione = $_POST['descrizione'];
$email = $_POST['email'];



$museo = new Museo($id,$nome,$localita,$indirizzo,$cap,$orario_ap,$orario_chiu,$descrizione,$email);
$museoInterfaccia = new MuseoInterfaccia();
$museoInterfaccia->createConn();



if($museoInterfaccia->update($museo)==true)
	echo'Operazione eseguita con successo!!!!';
else
	echo'Operazione non eseguita';
$museoInterfaccia->closeConn();

?>
<script type="text/javascript">
function redirect() {
		location.href = "../../../wp-admin/admin.php?page=wp-museo";
	}
window.setTimeout("redirect()", 50);
</script>
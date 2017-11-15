<?php	
include_once '/storage/ssd4/799/3511799/public_html/wp-content/plugins/wp-museo/MuseoInterfaccia.php';
//istanzio oggetto museo
$museo = new Museo('',$_POST['nome'],$_POST['localita'],$_POST['indirizzo'],$_POST['cap'],
						$_POST['orario_apertura'],$_POST['orario_chiusura'], $_POST['descrizione'],$_POST['email']);



$museoInterface = new MuseoInterfaccia();//istanzio oggetto
$museoInterface->createConn();
$x = $museoInterface->read();
$museoInterface->create($museo);//inserisco il museo nel db
$y = $museoInterface->read();
if(count($y) > count($x))
	echo'Operazione eseguita con successo!!!!';
else
	echo 'Impossibile inserire il museo, nome esistente!!!';
$museoInterface->closeConn(); //chiusura connessione db


	
	
?>
<script type="text/javascript">
function redirect() {
		location.href = "../../../wp-admin/admin.php?page=wp-museo";
	}
window.setTimeout("redirect()", 50);
</script>
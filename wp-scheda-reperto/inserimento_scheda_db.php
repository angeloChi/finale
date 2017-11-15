<?php	
include_once '/storage/ssd4/799/3511799/public_html/wp-content/plugins/wp-scheda-reperto/SchedaRepertoInterface.php';
//istanzio oggetto scheda reperto
$scheda = new SchedaReperto('',$_POST['nome'],$_POST['tipo'],$_POST['materiale'],$_POST['autore'],$_POST['periodo'],$_POST['valore'],
							$_POST['descriziones'],$_POST['descrizionee'],'',$_POST['op'],$_POST['museo'],'','');

$schedaInterface = new SchedaRepertoInterface();//istanzio oggetto
$schedaInterface->createConn();
$x = $schedaInterface->read();
$schedaInterface->create($scheda);//inserisco il museo nel db
$y = $schedaInterface->read();


$x=$schedaInterface->readByName($scheda->getNome());
define("DIM", 200);
$id = $x->getId();
$URLQR='https://chart.googleapis.com/chart?cht=qr&choe=UTF-8&chs='.DIM.'x'.DIM.'&chl='.$id.'';   
$x->setQr($URLQR);
$schedaInterface->update($x);
$schedaInterface->closeConn();
if(count($y) > count ($x))
	echo'Operazione eseguita con successo!!!!';
else
	echo 'Impossibile inserire la scheda, nome già presente nel database';
?>
<script type="text/javascript">
function redirect() {
		location.href = "../../../wp-admin/admin.php?page=wp-schedeReperto";
	}
window.setTimeout("redirect()", 50);
</script>
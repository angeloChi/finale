<?php
include_once '/storage/ssd4/799/3511799/public_html/wp-content/plugins/wp-assoperatore/OperatoreMusealeInterface.php';
include_once '/storage/ssd4/799/3511799/public_html/wp-content/plugins/wp-assoperatore/UserDbInterface.php';


$id_operatore=$_POST['id_operatore'];
$museo = $_POST['id_museo'];

$userInterface=new UserDbInterface();
$userInterface->createConn();
$box=$userInterface->readById($id_operatore);
$userInterface->closeConn();


$operatore=new OperatoreMuseale($id_operatore,$box->getDisplayName(),$box->getUserLogin(),$box->getUserPass(),$box->getUserEmail(),$museo);

$interfacciaOp=new OperatoreMusealeInterface();
$interfacciaOp->createConn();
$interfacciaOp->create($operatore);
$interfacciaOp->closeConn();
?>

<script type="text/javascript">
function redirect() {
		location.href = "../wp-admin/admin.php?page=wp-associazione";
	}
window.setTimeout("redirect()", 50);
</script>


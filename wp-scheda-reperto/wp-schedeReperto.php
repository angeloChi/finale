

<?php

/*
Plugin Name: wp-schedeReperto
Plugin URI: https://www.cozmoslabs.com/wordpress-profile-builder/
Description: Questo � un plugin scritto al fine di gestire le schede reperto
Vesrion: 1.0
Author: Angelo Chirico, Sergio Santoro
Text Domain: wp-schedeReperto
*/
include_once '/storage/ssd4/799/3511799/public_html/wp-content/plugins/wp-scheda-reperto/SchedaRepertoInterface.php';
include_once '/storage/ssd4/799/3511799/public_html/wp-content/plugins/wp-assoperatore/OperatoreMusealeInterface.php';
class Wp_Scheda_Reperto{			 
	
	//costruttore
	function __construct(){
		add_action('admin_menu',array($this,'add_schedaReperto_menu'));
	}
	
	
	//Metodo per aggiungere un menu
	public function add_schedaReperto_menu(){
		define('POSITION_MENU',25);
		add_menu_page(
		'Schede Reperto',         // Titolo di pagina
		'Schede Reperto',         // Titolo di menu
		'manage_options', // Autorizzazione
		'wp-schedeReperto',         // Menu slug
		array($this,'my_custom_table'),// Nome funzione
		'dashicons-list-view', // Icona
		POSITION_MENU                     // Posizione menu
		);
	}
	
	function my_custom_table(){		

		//Codice per ottenere l'id del museo dell'operatore museale
		$id_current=get_current_user_id();
		$operatoreInterfaccia=new OperatoreMusealeInterface();
		$operatoreInterfaccia->createConn();
		$operatore=$operatoreInterfaccia->readById($id_current);
		$id_museo=$operatore->getMuseo();
		$schedaRepertoInterface = new SchedaRepertoInterface();
		$schedaRepertoInterface->createConn();
		
		$str = '  
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
			<meta name="viewport" content="width=device-width, initial-scale=1">
			
			
			<div class="container" id = "form_visualizzazione">
				<h2 align = "center">GESTIONE SCHEDE REPERTO</h2>  
					<form action="' . plugins_url( 'wp-scheda-reperto/inserimento_scheda.php', _FILE_ ) . '"method = "POST">'.
					'<input type="hidden" name = "operatore" id="operatore" value='.htmlspecialchars($id_current).'>'.
					'<input type="hidden" name = "museo" id="museo" value='.htmlspecialchars($id_museo).'>'.
					'<input type="submit"  class= "button" value="Inserisci Scheda">
					</form>
					<div class="container" align="right">
					<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">
					</div>
					<br></br>
					<div class="table-responsive">          
						<table class="table" id="myTable">';
					echo $str;
	

			$schedaRepertoInterface->visualizzazione($id_museo,$id_current);
			
			
			$bx ='			</table>
					</div>
			</div>
		
		<script type=text/javascript>
			function myFunction() {
			  var input, filter, table, tr, td, i;
			  input = document.getElementById("myInput");
			  filter = input.value.toUpperCase();
			  table = document.getElementById("myTable");
			  tr = table.getElementsByTagName("tr");
			  for (i = 0; i < tr.length; i++) {
				td = tr[i].getElementsByTagName("td")[1];
				if (td) {
				  if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
					tr[i].style.display = "";
				  } else {
					tr[i].style.display = "none";
				  }
				}       
			  }
			}
		</script>
		';
		echo $bx;
		$schedaRepertoInterface->closeConn();
		$operatoreInterfaccia->closeConn();
	}
}

$wp_scheda = new Wp_Scheda_Reperto();  //istanzazione men�


?>
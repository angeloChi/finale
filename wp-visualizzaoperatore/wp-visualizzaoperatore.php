<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<?php

include_once '/storage/ssd4/799/3511799/public_html/wp-content/plugins/wp-assoperatore/OperatoreMusealeInterface.php';
/*
Plugin Name: wp-visualizzaoperatore
Plugin URI: https://www.cozmoslabs.com/wordpress-profile-builder/
Description: Questo è un plugin scritto al fine di visualizzare gli Operatori Museali
Vesrion: 1.0
Author: Santoro Sergio
Text Domain: wp-visualizzaoperatore
*/


class Wp_VisualizzaOperatore{			 
	
	
	/**
	 * Costruttore per creare il menu
	 */
	function __construct(){
		add_action('admin_menu',array($this,'add_visualizza_menu'));
	}
	
	
	/**
	 * Metodo per aggiungere il menu
	 * @return void
	 */
	public function add_visualizza_menu(){
		define('POSITION_MENU',25);
		add_menu_page(
		'Visualizza Operatori',         // Titolo di pagina
		'Visualizza Operatori',         // Titolo di menu
		'manage_options', // Autorizzazione
		'wp-visualizzaoperatore',         // Menu slug
		array($this,'my_custom_table'),// Nome funzione
		'dashicons-list-view', // Icona
		POSITION_MENU                     // Posizione menu
		);
	}
	
	/**
	 * Metodo che visualizza il menu
	 * @return void
	 */
	function my_custom_table(){		
		
		$operatoreInterfaccia = new OperatoreMusealeInterface();
		$operatori_museali_tab=array();
		$operatoreInterfaccia->createConn();
		$operatori_museali_tab=$operatoreInterfaccia->read();
		$trovato=false;
			
		/* Mi faccio restituire tutti gli operatori museali in users verifico i loro id nella tabella operatore museale se sn diversi delete*/
		
		
		$users = get_users('blog_id=1&orderby=nicename&role=operatore_museale');
		
		foreach($operatori_museali_tab as $x){
			
			foreach($users as $utente){
				if($x->getId() == $utente->ID)
					$trovato=true;
				
				
			}
			
			if($trovato==false)
				$operatoreInterfaccia->delete($x->getId());
				
			
			$trovato=false;
		}
		
		
		
		
		
		$str = '  
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
			<meta name="viewport" content="width=device-width, initial-scale=1">
			
			
			<div class="container" id = "form_visualizzazione">
				<h2 align = "center">VISUALIZZA OPERATORI</h2>  
					<div class="container" align="right">
					<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">
					</div>
					<br></br>
					<div class="table-responsive">          
						<table class="table" id="myTable">';
					echo $str;
                            
						$operatoreInterfaccia->visualizzazione();
                        
							
							
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
		
		$operatoreInterfaccia->closeConn();
	}
}
$wp_op = new Wp_VisualizzaOperatore();  //istanzazione menù
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<?php

include_once '/storage/ssd4/799/3511799/public_html/wp-content/plugins/wp-museo/MuseoInterfaccia.php';
/*
Plugin Name: wp-museo
Plugin URI: https://www.cozmoslabs.com/wordpress-profile-builder/
Description: Questo è un plugin scritto al fine di gestire i vari musei
Vesrion: 1.0
Author: Angelo Chirico
Text Domain: wp-museo
*/



	/**
	 * Classe del plugin per gestire musei
	 */

class Wp_Museo{			 
	
	
	/**
	 * Costruttore per creare il menu
	 */
	function __construct(){
		add_action('admin_menu',array($this,'add_museo_menu'));
	}
	
	
	/**
	 * Metodo per aggiungere il menu
	 * @return void
	 */
	public function add_museo_menu(){
		define('POSITION_MENU',25);
		add_menu_page(
		'Musei',         // Titolo di pagina
		'Museo',         // Titolo di menu
		'manage_options', // Autorizzazione
		'wp-museo',         // Menu slug
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
		
		$museoInterfaccia = new MuseoInterfaccia();
  
		$str = '  
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
			<meta name="viewport" content="width=device-width, initial-scale=1">
			
			
			<div class="container" id = "form_visualizzazione">
				<h2 align = "center">GESTIONE MUSEI</h2>  
					<form action="' . plugins_url( 'wp-museo/inserimento_museo.html', _FILE_ ) . '"method = "POST">
					<input type="submit"  class= "button" value="Inserisci museo">
					</form>
					<div class="container" align="right">
					<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">
					</div>
					<br></br>
					<div class="table-responsive">          
						<table class="table" id="myTable">';
					echo $str;
						
						$museoInterfaccia->createConn();
						$museoInterfaccia->visualizzazione();
                        
							
							
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
		
	}
}

$wp_museo = new Wp_Museo();  //istanzazione menù
?>
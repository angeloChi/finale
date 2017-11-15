<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<?php
/*
Plugin Name: wp-assOperatore
Plugin URI: https://www.cozmoslabs.com/wordpress-profile-builder/
Description: Questo � un plugin scritto al fine di associare operatori museali a musei
Vesrion: 1.0
Author:Sergio Santoro
Text Domain: wp-assOperatore
*/


include_once '/storage/ssd4/799/3511799/public_html/wp-content/plugins/wp-museo/MuseoInterfaccia.php';
class Wp_AssOperatore{			 
	
	
	//costruttore
	function __construct(){
		add_action('admin_menu',array($this,'add_associazione_menu'));
	}
	
	
	//Metodo per aggiungere un menu
	public function add_associazione_menu(){
		define('POSITION_MENU',25);
		add_menu_page(
		'Associa Operatore',         // Titolo di pagina
		'Associa Operatore',         // Titolo di menu
		'manage_options', // Autorizzazione
		'wp-associazione',         // Menu slug
		array($this,'my_custom_table'),// Nome funzione
		'dashicons-list-view', // Icona
		POSITION_MENU// Posizione menu
		);
	}
	
	function my_custom_table(){		
		
	$blogusers=array();	
	$blogusers = get_users('blog_id=1&orderby=nicename&role=operatore_museale');
	
	
	$museoInterface=new MuseoInterfaccia();
	
	
	$musei=array();
	
	$museoInterface->createConn();
	$musei=$museoInterface->read();
	
	
		$box=
			
			'<script type="text/javascript" src="' . plugins_url( 'wp-assoperatore/jquery_operatore.js', _FILE_ ) . '"></script>'.
			'<div class = "container" id="risposta">'.
			'<form name="modulo" action="" method="post">'.
			'<h3> ID operatore museale '.
			'<select name="ID_operatoreMuseale" id="ID_operatoreMuseale">'.
			'</h3>';
			foreach($blogusers as $utente){
		           	  $a = $a . '<option>'.$utente->ID.'</option>';
			}
		    $box= $box . $a;       
		    $str = '</select><br></br>';
			$box=$box . $str;
	 
			$box = $box . '<h3> ID museo'.
					'<select name="ID_musei" id="ID_musei">'.
					'</h3>';
					foreach($musei as $museo){
		           	  $b = $b . '<option>'.$museo->getId().'</option>';
					}
					$box = $box . $b;
					$str1 = '</select><br></br>'.
							'<input type = "submit" id = "invia" name = "invia" value="Invia">'.
							'</form></div>';
					$box = $box . $str1;
					echo $box;
					
		
	

	
}
				
			
		
	
}

$wp_associazione = new Wp_AssOperatore();  //istanzazione men?
?>
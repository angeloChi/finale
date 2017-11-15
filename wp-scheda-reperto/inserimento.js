$(document).ready(function(){
	$("#invia").click(function(){
	
	//Recuperiamo tutte le variabili
		var valid = '';
        var isr = ' � richiesto. </p>';
        var id = $("#id_scheda_reperto").val();
        var strNome= $("#nome_scheda").val();
		var nome =strNome.replace(/'/g, "\\'");
		var tipo= $("#tipo_scheda").val();
		var materiale= $("#materiale_scheda").val();
		var strAutore= $("#autore_scheda").val();
		var autore =strAutore.replace(/'/g, "\\'");
		var periodo= $("#periodo_scheda").val();
		var valore= $("#valore_scheda").val();
        var strDescriziones= $("#descrizione_short").val();
		var descriziones =strDescriziones.replace(/'/g, "\\'");
        var strDescrizioneE= $("#descrizione_estesa").val();
		var descrizionee =strDescrizioneE.replace(/'/g, "\\'");
        var op = $("#operatore_museale").val();
        var museo = $("#museo").val();
        
		
		//Controlli sui campi obbligatori
		if(nome.length < 1){
			valid += '<p>Un nome valido'+isr;
		}
		if(autore.length < 1){
			valid += '<p>Un autore valido'+isr;
		}

		
		//Se i controlli non vengono superati, appare il messaggio di errore.
		if (valid !== '') {
			$("#risposta").fadeIn("slow");
			$("#risposta").html("<p><b>Errore:</b></p>"+valid);
			$("#risposta").css("background-color","#ffc0c0");
		}
	
		//Se i controlli vengono superati, compare un messaggio di invio in corso
		 
       else{ 
		    var datastr ='nome=' + nome + '&tipo=' + tipo + '&materiale=' + materiale + '&autore=' + autore + '&periodo=' + periodo + '&valore=' + valore + '&descriziones=' + descriziones + '&descrizionee=' + descrizionee + '&op=' + op + '&museo=' + museo;
			$("#risposta").css("display", "block");
			$("#risposta").css("background-color","#FFFFA0");
			$("#risposta").html("<p>Operazione in corso...</p>");
			$("#risposta").fadeIn("slow");
			setTimeout("send('"+datastr+"')",1000);
		}
		
		return false;
	});
});
/**
 * Creazione della funzione basata sul file .php
 */
function send(datastr){
	$.ajax({	
		type: "POST",
		url:  "inserimento_scheda_db.php",
		data: datastr,
		cache: false,
		success: function(html){
		$("#risposta").fadeIn("slow");
		$("#risposta").html(html);
		$("#risposta").css("background-color","#e1ffc0");
		setTimeout('$("#risposta").fadeOut("slow")',1000);
	}
	});
}




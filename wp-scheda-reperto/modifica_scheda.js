$(document).ready(function(){
	$("#invia").click(function(){
	
	//Recuperiamo tutte le variabili
		var valid = '';
        var isr = ' è richiesto. </p>';
        var id = $("#id_scheda_reperto").val();
        var str= $("#nome_scheda").val();
		var nome =str.replace(/'/g, "\\'");
		var tipo= $("#tipo_scheda").val();
		var materiale= $("#materiale_scheda").val();
		var strAut= $("#autore_scheda").val();
		var autore =strAut.replace(/'/g, "\\'");
		var periodo= $("#periodo_scheda").val();
		var valore= $("#valore_scheda").val();
        var strS= $("#descrizione_short").val();
		var descriziones =strS.replace(/'/g, "\\'");
        var strE= $("#descrizione_estesa").val();
		var descrizionee =strE.replace(/'/g, "\\'");
        var operatore = $("#operatore_museale").val();
        var pubblica = $("#pubblica").val();
		
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
		    var datastr ='id=' + id + '&nome=' + nome + '&tipo=' + tipo + '&materiale=' + materiale + '&autore=' + autore + '&periodo=' + periodo + '&valore=' + valore + '&descriziones=' + descriziones + '&descrizionee=' + descrizionee + '&operatore=' + operatore + '&pubblica=' +pubblica;
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
		url:   "modifica_scheda_db.php",
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
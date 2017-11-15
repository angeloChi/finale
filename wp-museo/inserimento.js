$(document).ready(function(){
	$("#invia").click(function(){
	
	//Recuperiamo tutte le variabili
		var valid = '';
		var isr = ' è richiesto. </p>';
        var str= $("#nome_museo").val();
		var nome =str.replace(/'/g, "\\'");
        var localita= $("#localita_museo").val();
        var indirizzo= $("#indirizzo_museo").val();
        var cap = $("#cap_museo").val();
        var orario_apertura = $("#orario_apertura_museo").val();
        var orario_chiusura = $("#orario_chiusura_museo").val();
        var deStr = $("#descrizione_museo").val();
		var descrizione = deStr.replace(/'/g, "\\'");
		var email = $("#email_museo").val();
		
		//Controlli sui campi obbligatori
		if(nome.length < 1){
			valid += '<p>Un nome valido'+isr;
		}

		if(localita.length < 1){
			valid += '<p> Localita valida'+isr;
		}

		if(indirizzo.length < 1){
			valid +='<p> Indirizzo valido'+isr;
		}

		if(cap.length < 4 || cap.length > 11){
			valid +='<p> Cap valido'+isr;
		}

		//Se i controlli non vengono superati, appare il messaggio di errore.
		if (valid !== '') {
			$("#risposta").fadeIn("slow");
			$("#risposta").html("<p><b>Errore:</b></p>"+valid);
			$("#risposta").css("background-color","#ffc0c0");
		}
	
		//Se i controlli vengono superati, compare un messaggio di invio in corso
		 
       else{ 
		    var datastr ='nome=' + nome + '&localita=' + localita + '&indirizzo=' + indirizzo + '&cap=' + cap + '&orario_apertura=' + orario_apertura + '&orario_chiusura=' + orario_chiusura + '&descrizione=' + descrizione + '&email=' + email;
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
		url:   "inserimento_museo_db.php",
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




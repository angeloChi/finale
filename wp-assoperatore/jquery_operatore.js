$(document).ready(function(){
	$("#invia").click(function(){
	
	//Recuperiamo tutte le variabili
	
		var id_operatore = $("#ID_operatoreMuseale").val();
		var id_museo = $("#ID_musei").val();

		var datastr ='id_operatore=' + id_operatore + '&id_museo=' + id_museo;
		$("#risposta").css("display", "block");
		$("#risposta").css("background-color","#FFFFA0");
		$("#risposta").html("<p>Operazione in corso...</p>");
		$("#risposta").fadeIn("slow");
		setTimeout("send('"+datastr+"')",1000);
		return false;
	});
});
//Creazione della funzione di invio. Si baserà sul nostro file php "mail.php".
function send(datastr){
	$.ajax({	
		type: "POST",
		url:   "../wp-content/plugins/wp-assoperatore/operatore.php",
		data: datastr,
		cache: false,
		success: function(html){
		$("#risposta").fadeIn("slow");
		$("#risposta").html(html);
		$("#risposta").css("background-color","#e1ffc0");
		//setTimeout('$("#risposta").fadeOut("slow")',1000);
	}
	});
}

function boton(){
	var comentarios = document.getElementById('Comentarios');
	var boton = document.getElementById('b_comentarios');
	
	if(window.getComputedStyle(comentarios).display === 'none'){
		comentarios.style.display='block';
		boton.innerHTML = '&gt';		
	}
	else if(window.getComputedStyle(comentarios).display == 'block'){
		comentarios.style.display='none';
		boton.innerHTML = '&lt';
	}
}

function censurar(prohibidas){
	var filtro = new RegExp(prohibidas.join("|"),"i");
	var texto = document.getElementById("cuerpo_f").value;

	texto = texto.replace(filtro, function(x){

		var y = "";

		for(i=0;i<x.length;i++){
			y += "*";
		}

		return y;
	});

	document.getElementById("cuerpo_f").value = texto;
}

function compartir(rs,nombre,imagen){

	if (document.getElementById) {
		w = screen.availWidth;
		h = screen.availHeight;
	} 


	var popW = 500, popH = 400;
	var leftPos = 500;
	var topPos = 300;


	msgWindow = window.open('','popup','width=' + popW + ',height=' + popH + 
	                     ',top=' + topPos + ',left=' + leftPos + ',scrollbars=yes');

msgWindow.document.write 
    ('<HTML>'+
    	'<HEAD>'+
    		'<TITLE>Centered Window</TITLE>'+
    		'<link rel="stylesheet" type="text/css" href="CSS/estilo.css"></link>'+
    	'</HEAD>'+
    	'<BODY>'+
    		'<FORM NAME="form1" id="pop_up">' +
    			'<div><p>Se publicará en '+rs+' el siguiente mensaje:</p>'+
				'<p>'+nombre+'</p>'+
				'<p>Vía @videojugones</p>'+
				'<img src="'+imagen+'"></div>' +
    			'<INPUT TYPE="button" VALUE="Aceptar" onClick="window.close();">'+
    		'</FORM>'+
    	'</BODY>'+
    '</HTML>');
}
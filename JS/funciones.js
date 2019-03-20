function boton(){
	var comentarios = document.getElementById('Comentarios');
	var boton = document.getElementById('b_comentarios');
	
	if(window.getComputedStyle(comentarios).display === 'none'){
		comentarios.style.display='block';
		boton.innerHTML = ">";		
	}
	else if(window.getComputedStyle(comentarios).display == 'block'){
		comentarios.style.display='none';
		boton.innerHTML = "<";
	}
}

function publicar(){
	document.getElementById('nombre_usuario').innerHTML=document.getElementById("nombre").value;
	document.getElementById('fecha_com_usuario').innerHTML=new Date();
	document.getElementById('texto_com_usuario').innerHTML=document.getElementById("cuerpo").value;
	document.getElementById('com_usuario').style.display='block';
}

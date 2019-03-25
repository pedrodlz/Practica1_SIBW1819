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
	
	if(window.getComputedStyle(com_usuario).display === 'none'){

		var autor = document.getElementById("nombre_f").value;
		var texto = document.getElementById("cuerpo_f").value;
		var email = document.getElementById("email_f").value;

		if(autor.length === 0 || texto.length === 0 || email.length === 0){
			alert("Tiene que rellenar todos los campos");
		}
		else{
			var validar = /\S+@\S+\.\S/;

			if(validar.test(email)){
				var fecha = new Date();
				var fecha_s = "" + fecha.getDate() + "/" + fecha.getMonth() + "/" + fecha.getFullYear() + " " + fecha.getHours() + ":" + fecha.getMinutes();

				document.getElementById('nombre_usuario').innerHTML= autor;
				document.getElementById('fecha_com_usuario').innerHTML= fecha_s;
				document.getElementById('texto_com_usuario').innerHTML= texto;

				document.getElementById('com_usuario').style.display='block';
			}
			else{
				alert("Email no valido");
			}
		}
	}
}

function censurar(){
	var prohibidas = ["mierda", "puta", "coño", "cojones", "subnormal", "gilipollas", "polla", "coño"]
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

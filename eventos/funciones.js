function mostrar() {
    div = document.getElementById('Comentarios');
    var objetoPestania = document.getElementById('pestaña');
    div.style.display = '';
    objetoPestania.innerHTML = "CERRAR";
}

function cerrar() {
    div = document.getElementById('Comentarios');
    var objetoPestania = document.getElementById('pestaña');
    div.style.display = 'none';
    objetoPestania.innerHTML = "COMENTARIOS";
}

function funb1(){
	document.getElementById('Comentarios').style.display='block';
	document.getElementById('b2').style.display='block';
	document.getElementById('b1').style.display='none';
}

function funb2(){
	document.getElementById('Comentarios').style.display='none';
	document.getElementById('b1').style.display='block';
	document.getElementById('b2').style.display='none';
}
var num=0;

function adelante(imagenes){
	num++;
	if(num>imagenes.length-1) num=0;
	var foto = document.getElementById("galeria");
	foto.src=imagenes[num]. + "../" + enlace_i;
}

function atras(imagenes){
	num--;
	if(num<0) num=imagenes.length-1;
	var foto = document.getElementById("galeria");
	foto.src=imagenes[num].enlace_i;
}
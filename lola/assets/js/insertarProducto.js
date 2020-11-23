window.onload = function() {
  if (localStorage.getItem("imagen")) {
  	document.getElementById('flotante').style.display = 'block';
  	document.getElementById('url').value = localStorage.getItem("imagen");
  }
};
function mostrar() {
	if (localStorage.getItem("imagen")) { 
		document.getElementById('flotante').style.display = 'block';
  		document.getElementById('url').value = localStorage.getItem("imagen");
	} else {
		document.getElementById('flotante').style.display = 'block';
		document.getElementById('producto').style.display = 'none';
		document.getElementById('url').style.display = 'none';
		document.getElementById('lblproducto').style.display = 'none';
		document.getElementById('lblurl').style.display = 'none';	
	}
	
}

function cerrar() {
	document.getElementById('flotante').style.display = 'none';
}

function eliminar() {
	if(document.getElementById('url').value == localStorage.getItem("imagen")) {
		localStorage.removeItem("imagen");
	}
}

function cargar(e) {
	let ctx	= document.getElementById('canvas').getContext('2d');
	let img	= new Image;
	img.src	= URL.createObjectURL(e.files[0]);
	if(e.files[0].size < 2048) {
		img.onload= function()	{
			ctx.drawImage(img,	20,20);
			localStorage.setItem("imagen",img.src);
		}
	} else {
		document.getElementById('foto').value = "";
		alert("Tamaño superado Máximo 2MB");
	}
	
}
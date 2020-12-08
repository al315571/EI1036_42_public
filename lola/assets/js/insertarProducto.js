window.onload = function() {
	alert("funciona");
  if (localStorage.getItem("imagen")) {
  	document.getElementById('flotante').style.display = 'block';
  	document.getElementById('url').value = localStorage.getItem("imagen");
  	document.getElementById('s_producto').value = localStorage.getItem("españa");
  }
};
function mostrar() {
	if (localStorage.getItem("imagen")) { 
		document.getElementById('flotante').style.display = 'block';
  		document.getElementById('url').value = localStorage.getItem("imagen");
	} else {
		document.getElementById('flotante').style.display = 'block';		
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
	img.src	= URL.createObjectURL("./assets/img/"+e.files[0].name);
	producto = document.getElementById('s_producto').value;
	if(e.files[0].size < 2048) {
		img.onload= function()	{
			ctx.drawImage(img,	20,20);
			localStorage.setItem("imagen",img.src);
			localStorage.setItem("españa",producto)
		}
	} else {
		document.getElementById('foto').value = "";
		alert("Tamaño superado Máximo 2MB");
	}
	
}
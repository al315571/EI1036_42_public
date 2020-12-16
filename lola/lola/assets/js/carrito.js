var lista = [];
const todoItemsList = document.querySelector('.listado_carrito');
window.onload = function() {
  if (localStorage.getItem("carrito")) {
  	var localList = JSON.parse(localStorage.getItem("carrito"));
  	JSON.stringify(localList);
  	cargarLista(localList);
  }
};

function añadirCarrito(id,prod) {
	const carro = {
	      	id_prod: id,
	      	producto: prod,
    	};
	if(localStorage.getItem("carrito")) {
		lista = JSON.parse(localStorage.getItem("carrito"));
		JSON.stringify(lista);
		lista.push(carro);
		localStorage.setItem("carrito", JSON.stringify(lista));
	} else {
		lista.push(carro);
		localStorage.setItem("carrito", JSON.stringify(lista));
	}
	cargarLista(lista);
}

function cargarLista(lista) {
	localStorage.removeItem("carrito")
	todoItemsList.innerHTML = '';
	document.getElementById('enlace_carrito').href = "acciones/carrito.php?accion=comprarCesta&productos="
	enlace = document.getElementById('enlace_carrito').href;
	var pos = 0
	lista.forEach(function(valor) {
		const li = document.createElement('li');
	    li.setAttribute('class', 'producto_carrito');
	    li.innerHTML = `
      	${valor.producto}
      	<input class="carrito-eliminar-small" value="X" onclick="eliminarCarrito(${pos})">
    	`;
	    todoItemsList.append(li);
	    pos++;
	    enlace = enlace+""+valor.id_prod+",";
	});
	document.getElementById('enlace_carrito').href = enlace;
}

function eliminarCarrito(id) {
	lista = JSON.parse(localStorage.getItem("carrito"));
	JSON.stringify(lista);
	lista.splice(id,1);
	localStorage.setItem("carrito", JSON.stringify(lista));
	cargarLista(lista);
}

function carrito() {
	document.getElementById('productos_carrito').style.display = 'block';
}
function carrito_off() {
	document.getElementById('productos_carrito').style.display = 'none';
}
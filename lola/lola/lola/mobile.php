<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="https://unpkg.com/onsenui/css/onsenui.css">
  <link rel="stylesheet" href="https://unpkg.com/onsenui/css/onsen-css-components.min.css">
  <script src="https://unpkg.com/onsenui/js/onsenui.min.js"></script>

  <style>
    .miItem {margin:10px;}
    .elimina {background-color:red;}
  </style>
</head>
<body>
  
<ons-navigator id="appNavigator" swipeable swipe-target-width="80px">
  <ons-page>
    <ons-splitter id="appSplitter">
      <ons-splitter-side id="sidemenu" page="sidemenu.html" swipeable side="right" collapse="" width="260px"></ons-splitter-side>
      <ons-splitter-content page="tabbar.html"></ons-splitter-content>
    </ons-splitter>
  </ons-page>
</ons-navigator>

<template id="sidemenu.html">
   <ons-page>
    <ons-list-title>Menú</ons-list-title>
    <ons-list>
       <ons-list-item onclick="fn.loadView(0)">Hola</ons-list-item>
    </ons-list>
</template>

<template id="tabbar.html">
  <ons-page id="tabbar-page">
    <ons-toolbar>
      <div class="center">MASCARUM</div>
      <div class="right">
        <ons-toolbar-button onclick="fn.toggleMenu()">
          <ons-icon icon="ion-navicon, material:md-menu"></ons-icon>
        </ons-toolbar-button>
      </div>
    </ons-toolbar>

    <ons-tabbar swipeable id="appTabbar" position="auto"> 
      <ons-tab label="Productos" icon="ion-home" page="productos.html" active></ons-tab>
      <ons-tab label="Cesta" icon="ion-cart" page="carrito.html"></ons-tab>
    </ons-tabbar>

  </ons-page>
</template>

<template id="productos.html">
  <ons-page id="productos">
   
   <ons-toolbar>
    <div class="left">
      <ons-toolbar-button onclick="prev()">
        <ons-icon icon="md-chevron-left"></ons-icon>
      </ons-toolbar-button>
    </div>
    <div class="center">Productos</div>
    <div class="right">
      <ons-toolbar-button onclick="next()">
        <ons-icon icon="md-chevron-right"></ons-icon>
      </ons-toolbar-button>
    </div>
  </ons-toolbar>
  <ons-carousel fullscreen swipeable auto-scroll overscrollable id="carousel">
    <!-- Listado de productos -->

  </ons-carousel>
  </ons-page>
</template>

<template id="carrito.html">
  <ons-page id="carrito">
    <ons-toolbar>
      <div class="center">Cesta</div>
    </ons-toolbar>
   
    <ons-list id="lista_carrito" class="lista_carrito">

    </ons-list>
    <div id="confirmacion"> </div>
    <ons-button modifier="large" onclick="comprar()">Comprar</ons-button>
  </ons-page>

</template>
  
<script>
  var lista = []
  function añadirCarrito(id) {
    nombre = document.getElementById('titulo'+id).innerHTML
    const carro = {
	      	id_prod: id,
	      	producto: nombre,
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
    listarCarrito()
    }

    function eliminarProducto(id) {
      lista = JSON.parse(localStorage.getItem("carrito"));
      JSON.stringify(lista);
      lista.splice(id,1);
      localStorage.setItem("carrito", JSON.stringify(lista));
      listarCarrito();
  }

  function comprar() {
    var direccion
		for (var i = 0; i < lista.length; i++) {
			dirreccion=dirreccion+lista[i]+",";
		}
		fetch('./acciones/comprar.php?productos='+direccion)
  		.then(response => response.json())
  		.then(data => {
        
  			text = document.createElement("h1");
  			if(data["resultado"] == "KO") {
          text.innerHTML = "Error al comprar los productos";
  			} else {
          text.innerHTML = "Productos comprados satisfactoriamente";
        }
        lista.splice(0,lista.length)
        localStorage.removeItem("carrito");
        listarCarrito()
        document.getElementById('confirmacion').appendChild(text)
  			

  		});
	}

  /* Funciones para mover el carrusel */
  var prev = function() {
    var carousel = document.getElementById('carousel');
    carousel.prev();
  };

  var next = function() {
    var carousel = document.getElementById('carousel');
    carousel.next();
  };

  function listarCarrito() {
    // <ons-list-item><span class="miItem">BLUE</span> <ons-button class="elimina">X</ons-button></ons-list-item>
    document.getElementById('lista_carrito').innerHTML = ''
    localList =  JSON.parse(localStorage.getItem("carrito"))
    JSON.stringify(localList);
    if(localStorage.getItem("carrito")) {
      localList.forEach(function(valor) {
        let li = document.createElement('ons-list-item')
        let boton = document.createElement('ons-button')
        li.innerHTML = `
      	<span class="miItem">${valor.producto}</span>
      	<ons-button class="elimina" onclick="eliminarProducto(${valor.id_prod})">X</ons-button>
    	  `;
        document.getElementById('lista_carrito').appendChild(li);
      });
    } else {
      let li = document.createElement('ons-list-item')
      let span = document.createElement('span')
      span.innerHTML = `Carrito vacio`
      li.append(span)
      document.getElementById('lista_carrito').appendChild(li);
      
    }
  }

  function addItem(){
    fetch('./acciones/productos?accion=listarJSON')
    .then(response => response.json())
    .then(data => {
      data.forEach(x => {
        let nodo = document.createElement('ons-carousel-item')
        nodo.style.backgroundImage = `url('${x['imagen']}')`
        nodo.style.backgroundRepeat = "no-repeat"
        
        let titulo = document.createElement('h1')
        titulo.setAttribute("class","title")
        titulo.setAttribute("id","titulo"+x['product_id'])
        titulo.innerHTML = x['nombre']
        let boton = document.createElement('ons-button')
        boton.setAttribute("modifier","large")
        boton.setAttribute("onclick",'añadirCarrito('+x['product_id']+')')
        boton.innerHTML = `Añadir al carrito`

        document.getElementById('carousel').appendChild(nodo)
        nodo.append(boton)
        nodo.append(titulo)
        
    })
    
    })
    .catch(console.log)
        
  }

  /* Ejemplo para añadir elementos al carrusel cuando se carga una página */
  document.addEventListener("init", function(event) {
        var page = event.target;
        if( page.matches('#productos') ) { 
           addItem()
           //addItem('red','ROJO')
        }
        if( page.matches('#carrito') ) { 
          listarCarrito()
        }

  })



</script>
  
</body>
</html>
var Prod2ID = {};

window.onload = function() {
    fetch('./acciones/productos?accion=listarJSON')
    .then(response => response.json())
    .then(data => listarProductos(data));
};

function listarProductos(data) {
    data.forEach(x => {
        let item = document.createElement('div');
        item.setAttribute("id",x['product_id']);
        item.setAttribute("class","tabla-30");
        document.getElementById('visor').appendChild(item);
    })
    data.forEach(x => {
        item = document.getElementById(x['product_id']);
        var parrafo = document.createElement('p');
        var texto = document.createTextNode(x['nombre']+" "+x['precio']);
        parrafo.appendChild(texto);
        var foto = document.createElement('img');
        foto.setAttribute("class","img-producto");
        foto.setAttribute("src",x['imagen']);

        var boton = document.createElement('button');
        boton.setAttribute("type","submit");
        boton.setAttribute("class","clasico");
        boton.innerHTML = "Comprar";
        item.appendChild(foto);
        item.appendChild(parrafo);
        item.appendChild(boton);
        let n = document.createElement('option');
        n.value = x['nombre'];
        Prod2ID[x['nombre']] = x['product_id'];
        document.getElementById('productos').appendChild(n);

    })
}

function filtrarNombre(texto) {
    id = Prod2ID[texto.value];
    document.getElementById(id).scrollIntoView()
}


function filtrarPrecio() {
    var min = document.getElementById("minimo").value;
    var max = document.getElementById("maximo").value;
    const formulario = new FormData()
    formulario.append('minimo', min);
    formulario.append('maximo', max);

    fetch('./acciones/precio.php', { method: 'POST',  body: formulario })
    .then(response => response.json())
    .then(data => {
        document.getElementById("visor").innerHTML = "";
        listarProductos(data)
    })
    .then(console.log)
    .catch(console.log)
}
$(document).ready(function() {
  $('#buscar').click(function() {
    var ingredientes = $('#ingredientes').val();
    var lista_ingredientes = ingredientes.split(',');
    var recetas = [];
    for (var i = 0; i < data.length; i++) {
      var ingredientes_receta = data[i].ingredientes.split(',');
      var coincide = true;
      for (var j = 0; j < lista_ingredientes.length; j++) {
        if (ingredientes_receta.indexOf(lista_ingredientes[j].trim()) == -1) {
          coincide = false;
          break;
        }
      }
      if (coincide) {
        recetas.push(data[i]);
      }
    }
    mostrarRecetas(recetas);
  });
});

function mostrarRecetas(recetas) {
  var lista = $('#recetas ul');
  lista.empty();
  for (var i = 0; i < recetas.length; i++) {
    lista.append('<li><a href="' + recetas[i].url + '">' + recetas[i].nombre + '</a></li>');
  }
}

var data = [
  {
    nombre: 'Ensalada de pollo',
    url: 'https://www.example.com/ensalada-de-pollo',
    ingredientes: 'pechuga de pollo, lechuga, tomate, aguacate, aceite de oliva, vinagre'
  },
  {
    nombre: 'Tacos de carne asada',
    url: 'https://www.example',
    ingredientes: 'tortilla, carne'
}];

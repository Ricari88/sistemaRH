'use strict'

  $(document).ready( function (){
      var i = 0;
    $("#buscar").click( function (){
        event.preventDefault();
        $("#resultadoBusqueda").html(`<span>Hell-${i}</span>`);
        i++;
    })
});
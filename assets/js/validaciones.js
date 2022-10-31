"use strict";

$(".formulario-categorias").submit(function(){
    let nombre = $(".nombre-categoria").val();
    let errores =[];

    if($.trim(nombre) === '')
        errores.push("El nombre de la categoría está vacío");
    
    if(!($("#check1:checked").val() || $("#check2:checked").val() || $("#check3:checked").val()))
        errores.push("no seleccionó ninguna prioridad");
    
    if(errores.length > 0){
        alert(errores.join("\n"))
        return false;
    }else{
        return true;
    }   
})

$(".formulario-productos").submit(function(){
    let nombre = $(".nombre-producto").val();
    let errores =[];

    if($.trim(nombre) === '')
        errores.push("El nombre del producto esta vacío");
    
    if(!($("#check1:checked").val() || $("#check2:checked").val()))
        errores.push("No seleccionó si esta en venta o no");
    
    if(errores.length > 0){
        alert(errores.join("\n"))
        return false;
    }else{
        return true;
    }   
})


function showModal(tiempo){
setTimeout(function (){
    $('#exampleModal2').modal('show');
}, tiempo);
}
// localStorage.clear();

let intentoSalir = false;
if(!localStorage.getItem('modalShown')){
    //al poco despues de acceder a la pagina muestra el pop up
    showModal(1000);
    
    //pasados 30 min vuelve a aparecer
    showModal(180000);
    // Agregar evento mouseover al boton
    let publicidadAlSalir = document.getElementById("boton-modal");
    publicidadAlSalir.addEventListener("mouseover", function() {
    intentoSalir = true;
    showModal(0);
    
});
    
    localStorage.setItem('modalShown', true);
}



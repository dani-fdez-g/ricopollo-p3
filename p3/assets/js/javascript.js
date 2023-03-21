
//mostrar valoraciones
const lista = document.getElementById("lista");
//variable de filtro con evento de cambio
let orden = document.getElementById("filtro").value;
document.getElementById("filtro").addEventListener("change", () => {
  orden = document.getElementById("filtro").value; 
  mostrarValoraciones();
});
let result = [];
function mostrarValoraciones(){
  lista.innerHTML ='';
  fetch("http://localhost/php_act/p2/api/api.php")
  .then(response => response.json() )
  .then( (data) => {
    result = data;
    //se ordena en base al valor seleccionado
    if(orden === 'ASC'){
      result.sort((a, b)=> a.rating - b.rating);
    }else if(orden === 'DESC'){
      result.sort((a, b)=> b.rating - a.rating);
    }
      result.forEach((post) => {
        let starFive = '';
        let starFour = '';
        let starThree = '';
        let starTwo = '';
        let starOne = '';
          if  (post.rating == 5){
            starFive = 'checked';
          }else if (post.rating == 4){
            starFour = 'checked';
          }
          else if (post.rating == 3){
            starThree = 'checked';
          }
          else if (post.rating == 2){
            starTwo = 'checked';
          }
          else if (post.rating == 1){
            starOne = 'checked';
          }
          const div = document.createElement('div')
          cod= `
          <div class=" card text-center box-form" style="border:2px;!important">
          <div class="card-header " style ="background-color:ff5733; border-radius:0px!important;">
            <ul class="nav nav-tabs card-header-tabs card-header-personalizado">
              <li class="nav-item ">
                <p class="nav-link active subtitulo" ><img width="30px"  src="assets/img/account.svg" alt="usuario"> ${post.email}</p>
              </li>
            </ul>
          </div>
          <div class="card-body">
            <div class="card-title">
              <p class="texto">${post.codigo_pedido}</p>
                <p class="star subtitulo">
                  <input type="radio"  value="5" ${starFive}>
                  <label>★</label>
                  <input type="radio"  value="4" ${starFour}>
                  <label>★</label>
                  <input type="radio"  value="3" ${starThree}>
                  <label>★</label>
                  <input type="radio"  value="2" ${starTwo}>
                  <label>★</label>
                  <input type="radio"  value="1" ${starOne}>
                  <label>★</label>
                </p> 
              <p class="texto">${post.descripcion}</p>
            </div>
            
          </div>
        </div><br>
          `
          div.innerHTML = cod
          lista.append(div)
      })
  
  })
  
  
  // function testimonios() {
  //     let comentario_testimonio = document.getElementById("testimonio").value;
  //     let star_testimonio  = document.querySelector('input[name="estrellas"]:checked').value;
  //     let cod_pedido =  document.getElementById('cod_pedido').value;
  //     fetch("http://localhost/php_act/p2/api/api.php", {
      
  //         method: 'POST',
  //         body: JSON.stringify({
  //             codigo_pedido: cod_pedido,
  //             descripcion: comentario_testimonio,
  //             rating: star_testimonio,
  //         }),
  //         headers: {
  //             'Content-type': 'application/json; charset=UTF-8',
  //         },
  //     })
  //     .then(res => [console.log(comentario_testimonio)] )
  //     .then(res => [console.log(star_testimonio)] )
  //     .then(res => [console.log(cod_pedido)] )
  // }
}
function subirTestimonios() {
  let comentario_testimonio = document.getElementById("testimonio").value;
  let star_testimonio  = document.querySelector('input[name="estrellas"]:checked').value;
  let cod_pedido =  document.getElementById('cod_pedido').value;
  let email = document.getElementById('email').value;
  fetch("http://localhost/php_act/p2/api/api.php", {
  
      method: 'POST',
      body: JSON.stringify({
          codigo_pedido: cod_pedido,
          email: email,
          descripcion: comentario_testimonio,
          rating: star_testimonio,
      }),
      headers: {
          'Content-type': 'application/json; charset=UTF-8',
      },
  })
  .then(res => [console.log(comentario_testimonio)] )
  .then(res => [console.log(star_testimonio)] )
  .then(res => [console.log(cod_pedido)] )
  .then(res => [console.log(email)] )
  .then(res => notie.alert({ type: 1, text: '¡Se ha realizado la operacion correctamente!', time: 3 }) )
}

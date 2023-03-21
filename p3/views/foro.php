<!DOCTYPE html PUBLIC>
<html>
<head>
    <title>FORO - RICOPOLLO</title>
</head> 
    <body onload="mostrarValoraciones();">
  <div class="container">
  <section class="container-fluid col-12 col-sm-6" > <!--testimonios-->
        <h3 class="titulos" style="margin-top: 30%!important" >valoraciones</h3> 
        <div class="filtros txt-center subtitulo">
        <p><img src="assets/img/filtro.svg" width="25px" alt="filtro de reseñas">    Filtro: 
            <select class="texto" name="filtro" id="filtro">
                    <option value="ASC">Ordenar de menor a mayor </option>
                    <option value="DESC">Ordenar de mayor a menor </option>
            </select>
        </p>
        </div>
        
                  <div id="lista"></div>
  </section> <!-- fin testimonios-->

<!-- Button trigger modal -->
<?php if(isset($_SESSION['user']['email'])){?> 
<button type="button" class="btn-add" data-bs-toggle="modal" data-bs-target="#exampleModal"> haz tu reseña </button>
<?php }else{ ?>
  <p class="texto txt-center">Lo siento, para poder comentar es necesario que <b class="subtitulo">INICIES SESION</b></p>
<?php } ?>
<!-- Modal        style="background-image: URL(assets/img/logo.svg); background-repeat: repeat; background-size: 10% auto; " -->
<div class="modal fade "  id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog " style="border-style:solid; border-color:black; border-radius:0px;">
    <div class="modal-content" style="border-radius:0px!important;">
      <div class="modal-header" style="border:0px!important;">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h3 class="txt-form">HAZ TU RESEÑA</h3>
      <form id="valoracion" class="txt-titulos" method="post" action=#>
        <input hidden id="email" value="<?=$_SESSION['user']['email']?>"></input>
                <p class="txt-center texto">Selecciona el numero de tu pedido:</p>
                  <select name="codig_pedido" id="cod_pedido">
                    <?php for($i =0;$i<count($pedidoID);$i++){?>
                      <option value="<?=$pedidoID[$i]?>"><?=$pedidoID[$i]?></option>
                      <?php } ?>
                </select>
              <p class="clasificacion subtitulo">
                <input id="radio1" type="radio" name="estrellas" value="5"><!--
                --><label for="radio1">★</label><!--
                --><input id="radio2" type="radio" name="estrellas" value="4"><!--
                --><label for="radio2">★</label><!--
                --><input id="radio3" type="radio" name="estrellas" value="3"><!--
                --><label for="radio3">★</label><!--
                --><input id="radio4" type="radio" name="estrellas" value="2"><!--
                --><label for="radio4">★</label><!--
                --><input id="radio5" type="radio" name="estrellas" value="1"><!--
                --><label for="radio5">★</label>
              </p>
                <!-- Email input -->
                <div class=" mb-4 ">
                  <textarea class="form-control"  id="testimonio" rows="2" placeholder="Escribe aqui  tu comentario . . ."></textarea>
              </div>
                <!-- botones y registrate -->
                <div>
                  <button type="button" onclick="subirTestimonios()" class="btn-pedir" style="margin:0px;">COMENTAR</button>
                </div>

              </form>
      </div>
    </div>
  </div>
</div>

</div>
      
<script src="assets/js/javascript.js"></script>
<script src="assets/js/bootstrap.bundle.min.js"></script>
    </body>
    
</html>



<!DOCTYPE html PUBLIC>
<html>
<head>
    <?php 
    // se inicia la sesion
    session_start();
    // se cargan los parametros y metas en la cabecera
    require_once 'config/metas.php';
    ?>

</head>
<header> 
         <!-- menu  -->
         <div id="boton-modal" style=" background-color:ffc300; width:auto; height:7px;"></div>
<nav class="navbar navbar-expand-md bg-warning ">
  <div class="container mt-3">
  
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="<?=base_url."?controller=producto&action=index"?>"><img class="logo" src="assets/img/logo.svg" alt="logo rico pollo" width="150px"></a>
      
      <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active txt-titulos" aria-current="page" href=<?=base_url."?controller=producto&action=carta"?>>CARTA</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active txt-titulos" href="#">CUPONES</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active txt-titulos" href="#">OFERTAS</a>
          </li>

        </ul>

            <div class="form-inline my-2 my-lg-0 iconos-phone " >
                      <!-- icono desconectar sesion -->
                      <a href=<?=base_url."?controller=usuario&action=cerrarSesion"?> class="me-3 texto">
                        <?php  if(isset($_SESSION['user']['email']))
                        {echo $_SESSION['user']['email'];
                        echo '<img width="40px"  src="assets/img/disconect.svg" alt="cerrar sesion"></a>';
                        echo '<a href=?controller=usuario&action=perfil><img width="40px"  src="assets/img/account.svg" alt="ir al perfil"></a>';}?>
                      <!-- icono iniciar sesion -->
                      <a href=<?=base_url."?controller=usuario&action=acceder"?> class="me-3">
                        <?php  if(!isset($_SESSION['user']['email']))
                          {echo '<img width="40px"  src="assets/img/account.svg" alt="ir a iniciar sesion">';}?></a>
                      <a href=<?=base_url."?controller=producto&action=compra"?> class="txt-titulos" style="text-decoration:none; color:black;"><img width="40px" src="assets/img/buy.svg" alt="ir al carrito"><?php if(isset($_SESSION['sel'])){echo count($_SESSION['sel']);} ?></a>
            </div>
      </div>
    
  </div>
            

</nav>

 <!--  fin menu  -->

<!-- efecto de gotas de queso menu -->
  <div class="gotas ">
  <img width="100%" src="assets/img/gotas.svg">
  </div>
<!-- fin  efecto de gotas de queso menu -->
    <!-- modal publicidad -->
    <div class="modal fade "  id="exampleModal2" tabindex="-1"  aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" style="border-style:solid; border-color:black; border-radius:0px;">
    <div class="modal-content" style="border-radius:0px!important;">
      <div class="modal-body" style="background-image: URL(assets/img/publi1.webp); ">
        <h3 class="titulos txt-center" >OFERTA DEL MES</h3>
        
        <div style="border-style:solid; border-color:black; border-radius:0px;"   >
                <a href=<?=base_url."?controller=producto&action=carta"?>><img src="assets/img/carusel 2.webp" class="d-block w-100" alt="oferta del mes"></a>
        </div><br>
        <button type="button" class="btn-add" data-bs-dismiss="modal" aria-label="Close">No me interesa</button>
      </div>
    </div>
  </div>
</div>

</div>
    <!-- fin modal publicidad -->

</header>
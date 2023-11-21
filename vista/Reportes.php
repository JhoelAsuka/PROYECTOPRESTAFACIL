<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link
      rel="stylesheet"
      href="../controlador/bootstrap/css/bootstrap.min.css"
    />
    <link rel="stylesheet" href="../controlador/bootstrap/css/style.css" />

</head>
<body id="body2">
<header class="sticky">
    <nav class="navbar navbar-expand-lg" >

        <img src="../vista/img/prestafacilcut.jpg" class="logo" alt="">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation" >
          <span class="navbar-toggler-icon"></span>
        </button>
          <div class="collapse navbar-collapse"  id="navbarNav">
            <ul class="navbar-nav">
              <li id="sex"> 
                <a href="../vista/menu.php" id="menudrop"> INICIO</a>
              </li>
              <li  id="sex"> 
                <a href="../vista/contacto.php" id="menudrop">Contacto</a>
              </li>
              <li id="sex">
                <a href="../vista/pagos.php" id="menudrop"> Pagos</a>
              </li >
              <li  id="sex">
                <a href="../vista/reportes.php" id="menudrop">Quieres consultar un reporte?</a>
              </li>
              <li  id="sex">
                <a  href="../vista/login.php" id="menudrop">Cerrar sesión</a>
              </li>
              <li  id="icon">
                <i class="fa-solid fa-user-tie"> <a href="../controlador/mostrarusuario.php">Perfil</a></i>
              </li>
            </ul>

          </div>

    </nav>
  </header>
      <script type="text/javascript">
        window.addEventListener("scroll", function(){
          var header =document.querySelector("header");
          header.classList.toggle("sticky", window.scrollY > 0);
        })
      </script>
    <main class="main.content">

    
      <section class="container top-products">
        <h1 class="heading-1"> Nuestros planes¡</h1>
        <div class="container-options">
            <span class="active">destacados</span>
            <span>Mas recientes</span>
            <span>Mas Vendidos</span>
        </div>
        <div class="container-products">
            <!--diario-->
            <div class="card-product">
                <div class="container-img">
                    <img src="img/diario.jpg" alt="metodo de pago diario"> <!-- img[src="img/banner.jpg"alt="metodo de pago diario"] sirve en caso de querer poner mas de 1 al ponerle *5 al final -->
                    <span class="discount">-13%</span>
                    <div class="button-group">
                        <span>
                            <i class="fa-regular fa-eye"></i>
                        </span>
                        <span>
                            <i class="fa-regular fa-heart"></i>
                        </span>
                        <span>
                            <i class="fa-solid fa-code-compare"></i>
                        </span>
                    </div>
                </div> 
                <div class="content-card-product">
                    <div class="stars"> 
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                    </div>
                
                <a href="../vista/diario.php">plan de pago diario</a>
                </div>
            </div>
            <!--semanal-->
            <div class="card-product">
                <div class="container-img">
                    <img src="img/semanal.jpg" alt="metodo de pago diario"> <!-- img[src="img/banner.jpg"alt="metodo de pago diario"] sirve en caso de querer poner mas de 1 al ponerle *5 al final -->
                    <span class="discount">-13%</span>
                    <div class="button-group">
                        <span>
                            <i class="fa-regular fa-eye"></i>
                        </span>
                        <span>
                            <i class="fa-regular fa-heart"></i>
                        </span>
                        <span>
                            <i class="fa-solid fa-code-compare"></i>
                        </span>
                    </div>
                </div> 
                <div class="content-card-product">
                    <div class="stars"> 
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                    </div>
                
                <a href="../vista/semanal.php">plan de pago semanal</a>
                </div>
            </div>
            <!--quincenal-->
            <div class="card-product">
                <div class="container-img">
                    <img src="img/Quincenal.jpg" alt="metodo de pago diario"> <!-- img[src="img/banner.jpg"alt="metodo de pago diario"] sirve en caso de querer poner mas de 1 al ponerle *5 al final -->
                    <span class="discount">-13%</span>
                    <div class="button-group">
                        <span>
                            <i class="fa-regular fa-eye"></i>
                        </span>
                        <span>
                            <i class="fa-regular fa-heart"></i>
                        </span>
                        <span>
                            <i class="fa-solid fa-code-compare"></i>
                        </span>
                    </div>
                </div> 
                <div class="content-card-product">
                    <div class="stars"> 
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                    </div>
                
                <a href="../vista/seleccionarmonto.php">plan de pago quincenal</a>
                </div>
            </div>
            <!--mensual-->
            <div class="card-product">
                <div class="container-img">
                    <img src="img/mensual.jpg" alt="metodo de pago diario"> <!-- img[src="img/banner.jpg"alt="metodo de pago diario"] sirve en caso de querer poner mas de 1 al ponerle *5 al final -->
                    <span class="discount">-13%</span>
                    <div class="button-group">
                        <span>
                            <i class="fa-regular fa-eye"></i>
                        </span>
                        <span>
                            <i class="fa-regular fa-heart"></i>
                        </span>
                        <span>
                            <i class="fa-solid fa-code-compare"></i>
                        </span>
                    </div>
                </div> 
                <div class="content-card-product">
                    <div class="stars"> 
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                    </div>
                
                <a href="../vista/mensual.php">plan de pago mensual</a>
            </div>



        </div>
      </section>
    </main>





</body>
<footer class="footer">
  <div class="conteiner container-footer">
    <div class="menu-footer">
      <div class="contacto_info">
        <p class="tittle-footer">informacion de contacto</p>
        <ul>
          <li>Dirección:Av. Río San Miguel Núm. 12 Col. Tupuchu </li>
          <li>Telefono:961 666 3318</li>
          <li>Gmail:hellowo1@gmail.com</li>
        </ul>
        <div class="social-icons">
          <span class="facebook"><i class="fa-brands fa-facebook-f"></i></span>
          <span class="x"><i class="fa-solid fa-x"></i></span>
          <span class="instagram"><i class="fa-brands fa-instagram"></i></span>
        </div>
      </div>
      <div class="information">
        <p class="tittle-footer">Información</p>
        <ul>
          <li><a href="#">Acerca de nosotros</a></li>
          <li><a href="#">Información delivery  </a></li>
          <li><a href="#">Políticas de Privacidad</a></li>
          <li><a href="#">Terminos Y condiciones</a></li>
          <li><a href="#">Contactános</a></li>
        </ul>
      </div>
      <div class="my-account">
        <p class="tittle-footer">Mi cuenta</p>
        <ul>
          <li><a href="#">Mi cuenta</a></li>
          <li><a href="#">Historial</a></li>
          <li><a href="#">Lista de deseps</a></li>
          <li><a href="#">Boletin</a></li>
        </ul>
      </div>

      </Div>
    </div>
    <div class="copyright">
      <p>Desarrollado por System_eva &copy;

      </p>
    </div>

  </div>
<script src="../controlador/bootstrap/js/bootstrap.min.js"></script> 
<script src="https://kit.fontawesome.com/8b617d5d0c.js" crossorigin="anonymous"></script>
</footer>
</html>
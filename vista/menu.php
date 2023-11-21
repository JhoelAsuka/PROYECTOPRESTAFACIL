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
      
      <section class="banner">
        <div class="content-banner">
          <p>Necesitas un prestamo?</p>
          <h2> ¡Nosotros podemos ayudarte!</h2>
          <a href="../vista/Reportes.html">¡Ve nuestro planes¡</a>
       </div>
      </section>
      <div class="row">
        <div class="col">
          <div class="card">
      <img src="assets/images/bs-images/img-2x1.png" class="card-img-top" alt="card-grid-image">
      <div class="card-body">
        <h5 class="card-title">100 % seguro</h5>
        <p class="card-text"></p>
      </div>
    </div>
        </div>
        <div class="col-6"> 
        </div>
        <div class="col">
          <div class="card">
      <img src="assets/images/bs-images/img-2x1.png" class="card-img-top" alt="card-grid-image">
      <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
      </div>
    </div>
           
        </div>
       
      </div>
      <div class="row">
        <div class="col">
            <img src="../vista/img/menu.jpg" >
        </div>

        







  
        <script src="../controlador/bootstrap/js/bootstrap.min.js"></script> 
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

<script src="https://kit.fontawesome.com/8b617d5d0c.js" crossorigin="anonymous"></script>
</footer>
</html>
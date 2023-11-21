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
      <section>
        <p>En el año 2017, en la pintoresca ciudad de Tuxtla Gutiérrez, Chiapas, un grupo de emprendedores con una visión audaz decidió fundar una empresa financiera llamada PrestaFácil. La idea detrás de esta empresa era simple pero poderosa: brindar acceso a préstamos rápidos y convenientes a aquellos que lo necesitaban en momentos de apuro económico.

La empresa se destacó por su plataforma en línea fácil de usar, que permitía a los usuarios solicitar préstamos desde la comodidad de sus hogares. La aplicación de PrestaFácil pronto se convirtió en una herramienta invaluable para muchas personas en Tuxtla Gutiérrez y sus alrededores. La empresa prometía una aprobación rápida y un desembolso de fondos en cuestión de horas, lo que era un alivio para aquellos que necesitaban efectivo de manera urgente.

PrestaFácil también se esforzó por establecer relaciones de confianza con sus clientes. Ofrecieron tasas de interés justas y plazos flexibles de pago, lo que hizo que la empresa se destacara en el competitivo mercado financiero. Además, la atención al cliente de PrestaFácil era excepcional, siempre dispuesta a ayudar a los solicitantes a comprender los detalles de sus préstamos y resolver cualquier duda que pudiera tener.

Con el tiempo, la empresa creció más allá de las fronteras de Tuxtla Gutiérrez y se expandió a otras ciudades de Chiapas. La combinación de su sólida reputación y su compromiso con la satisfacción del cliente permitió que PrestaFácil se convirtiera en un nombre reconocido en el mundo de las finanzas en línea.

Hoy, PrestaFácil es una empresa financiera sólida y respetada que sigue brindando servicios a personas en todo Chiapas y más allá. Su historia es un testimonio de cómo una visión audaz, una plataforma en línea sólida y un compromiso inquebrantable con la satisfacción del cliente pueden dar lugar a un éxito duradero en el mundo de las finanzas.</p>
      </section>



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
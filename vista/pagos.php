<?php
session_start();
include('../modelo/conexionPDO.php');

$user = $_SESSION["correo"];
    $sql="SELECT  correo,nombre,aPaterno,aMaterno,IdDireccion,telefono FROM t_usuarios WHERE correo='".$user."'";
    $resultado=$conexion->query($sql);

    while($data = $resultado->fetch_assoc()){
        $correo=$data["correo"];
        $nombre=$data["nombre"];
        $apaterno=$data["aPaterno"];
        $amaterno=$data["aMaterno"];
        $direccion=$data["IdDireccion"];
        $telefono=$data["telefono"];
    }

$sqlHistorial = "SELECT Id_usuario, cantidad_prestada, numero_tarjeta, nombre_propietario, cvc, fecha_tarjeta, fecha_deprestamo, Cantidad_porfecha
                FROM historial_prestamo
                WHERE Id_usuario = '".$user."'";

$resultadoHistorial = $conexion->query($sqlHistorial);

while ($historialData = $resultadoHistorial->fetch_assoc()) {
    $idUsuario = $historialData["Id_usuario"];
    $cantidadPrestada = $historialData["cantidad_prestada"];
    $numeroTarjeta = $historialData["numero_tarjeta"];
    $nombrePropietario = $historialData["nombre_propietario"];
    $cvc = $historialData["cvc"];
    $fechaTarjeta = $historialData["fecha_tarjeta"];
    $fechaPrestamo = $historialData["fecha_deprestamo"];
    $cantidadPorFecha = $historialData["Cantidad_porfecha"];
}
?>
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
      <h1>Vista de Pagos</h1>

<!-- Información del Préstamo -->
<h2>Detalles del Préstamo</h2>
<p>Nombre del Usuario: <?php echo $nombre, $apaterno, $amaterno; ?></p>
<p>Cantidad Prestada(con interes): <?php echo $cantidadPrestada; ?></p>
<p>Cantidad Restante: <span id="cantidadRestante"></span></p>

<!-- Tabla de Pagos -->
<h2>Pagos</h2>
<table border="1">
    <thead>
        <tr>
            <th>Fecha del Pago</th>
            <th>Cantidad a pagar</th>
            <th>Cantidad Restante</th>
        </tr>
    </thead>
    <tbody id="tablaPagosBody">
        <!-- Aquí se cargarán dinámicamente los pagos -->
    </tbody>
</table>

<!-- Botones -->
<button id="pagarBtn">Realizar Pago</button>
<button id="generarPDFBtn">Generar PDF de Estado de Cuenta</button>

<!-- Agrega tus enlaces a scripts (JavaScript) aquí si es necesario -->

<script>
    // Aquí puedes agregar tu lógica JavaScript para manejar los eventos y cargar dinámicamente los datos
    // Recuerda incluir la biblioteca necesaria para generar PDF si es necesario.
</script>

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
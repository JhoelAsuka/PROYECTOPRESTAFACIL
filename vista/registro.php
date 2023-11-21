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
<body id="body3">

    <form method="post" id="registro">
      <H2 class="titulo"> REGISTRAR USUARIO</H2>
      <?php
      include("../modelo/conexionPDO.php");
      include("../controlador/registrar.php");
      ?>
        <div class="input-wrapper">
          <label for="">Correo</label>
          <input type="email" name="correo">
          <img class="input-icon" src="../vista/img/email.svg" alt="">
        </div>
        <div class="input-wrapper">
          <label for=""> Contraseña</label>
          <input type="password" name="password">
          <img class="input-icon" src="../vista/img/password.svg" alt="">
        </div>
        <div class="input-wrapper">
          <label for=""> Nombre</label>
          <input type="text" name="nombre">
          <img class="input-icon" src="../vista/img/name.svg" alt="">
        </div>
        <div class="input-wrapper">
          <label for=""> Apellido Paterno</label>
          <input type="text" name="aPaterno">
          <img class="input-icon" src="../vista/img/name.svg" alt="">
        </div>
        <div class="input-wrapper">
          <label for=""> Apellido Materno</label>
          <input type="text" name="aMaterno">
          <img class="input-icon" src="../vista/img/name.svg" alt="">
        </div>
        <div class="input-wrapper">
          <label for=""> Direccion</label>
          <input type="text" name="IdDireccion">
          <img class="input-icon" src="../vista/img/direction.svg" alt="">
        </div>
        <div class="input-wrapper">
          <label for=""> Telefono</label>
          <input type="text" name="telefono">
          <img class="input-icon" src="../vista/img/phone.svg" alt="">
        </div>      
        <div>
          <input class="btn" type="submit" value="Registrar" name="registro">
          <a href="login.php">Salir</a>
        </div>


      
    </form>
    
    <script src="/src/controlador/bootstrap/js/bootstrap.min.js"></script>
</body>
  
</html>
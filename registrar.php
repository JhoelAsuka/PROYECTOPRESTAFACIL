<?php
if(!empty($_POST["registro"])) {
    if(empty($_POST["correo"]) or empty($_POST["password"]) or empty($_POST["nombre"]) or empty($_POST["aPaterno"]) or empty($_POST["aMaterno"]) or empty($_POST["IdDireccion"]) or empty($_POST["telefono"])) {
        echo'<div id="error">Uno de los campos esta vacio</div>';
    } 
    else {
        $contraseña=$_POST['password'];
        $usuario=$_POST['correo'];
        $nombre=$_POST['nombre'];
        $apaterno=$_POST['aPaterno'];
        $amaterno=$_POST['aMaterno'];
        $direccion=$_POST['IdDireccion'];
        $telefono=$_POST['telefono'];
        $sql=$conexion->query("insert into t_usuarios(password,correo,nombre,aPaterno,aMaterno,IdDireccion,telefono) values ('$contraseña','$usuario','$nombre','$apaterno','$amaterno','$direccion','$telefono') ");
        if ($sql==1) {
            echo'<div class="correcto">Usuario registrado correctamente</div>';
        } else {
            echo'<div id="error">Usuario no registrado</div>';
             } 
    }
    
    
    }
?>
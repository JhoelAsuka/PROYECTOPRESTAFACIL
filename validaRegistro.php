<?php
$usuario=$_POST['correo'];
$contraseña=$_POST['password'];
session_start();
$_SESSION['correo']=$usuario;

include('../modelo/conexionPDO.php');

$consulta= "SELECT*FROM t_usuarios where password='$contraseña' and correo='$usuario' ";
$resultado=mysqli_query($conexion,$consulta);

$filas=mysqli_num_rows($resultado);

if($filas> 0){
    header("location:../vista/menu.php");
}else{
    ?>
    <?php
    include("../vista/login.php");
    ?>
    <h1 >LOS CAMPOS SON INCORRECTOS VERIFIQUE</h1>

    <?php

}
mysqli_free_result($resultado);
mysqli_close($conexion);
<?php
session_start();
include('../modelo/conexionPDO.php');

$user = $_SESSION["correo"];
$sql = "SELECT correo FROM t_usuarios WHERE correo='" . $user . "'";
$resultado = $conexion->query($sql);

if ($resultado->num_rows > 0) {
    // Devuelve el ID del usuario si se encuentra en la base de datos
    $fila = $resultado->fetch_assoc();
    if (isset($fila["correo"])) {
        echo json_encode(array("success" => true, "idUsuario" => $fila["correo"]));
    } else {
        echo json_encode(array("success" => false, "message" => "Clave 'IdUss' no encontrada en la respuesta."));
    }
} else {
    // Devuelve un mensaje de error en formato JSON
    echo json_encode(array("success" => false, "message" => "Usuario no encontrado."));
}

$conexion->close();
?>
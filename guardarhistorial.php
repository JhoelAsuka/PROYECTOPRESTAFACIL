<?php
// Obtener datos del POST

$data = json_decode(file_get_contents("php://input"), true);
include('../modelo/conexionPDO.php');

// Validar y procesar los datos
$idUsuario = $data['idUsuario'];
$cantidadPrestada = $data['cantidadPrestada'];
$fecha = $data['fecha'];
$numeroTarjeta = $data['numeroTarjeta'];
$nombrePropietario = $data['nombrePropietario'];
$cvc = $data['cvc'];
$fechaTarjeta = $data['fechaTarjeta'];
$montoPagarPorFecha = $data['montoPagarPorFecha'];

// Restar el 10% a la cantidad prestada
$cantidadPrestadaConDescuento = $cantidadPrestada * 1.1;

// Implementa lógica de validación y guardado en la base de datos aquí
// Asegúrate de realizar las medidas de seguridad necesarias, como la prevención de SQL injection

// Ejemplo de conexión a la base de datos (debes tener tus propias credenciales)
if ($conexion->connect_error) {
  die("Conexión fallida: " . $conexion->connect_error);
}

// Ejemplo de inserción en la tabla historial_prestamo (debes tener tus propias columnas)
$sql = "INSERT INTO historial_prestamo (id_usuario, cantidad_prestada, numero_tarjeta, nombre_propietario, cvc, fecha_tarjeta, fecha_deprestamo, Cantidad_porfecha) VALUES ('$idUsuario', '$cantidadPrestadaConDescuento', '$numeroTarjeta', '$nombrePropietario', '$cvc', '$fechaTarjeta', '$fecha', '$montoPagarPorFecha')";

if ($conexion->query($sql) === TRUE) {
  echo json_encode(array("success" => true, "message" => "Datos guardados correctamente."));
} else {
  echo json_encode(array("success" => false, "message" => "Error al guardar los datos: " . $conexion->error));
}

$conexion->close();
?>
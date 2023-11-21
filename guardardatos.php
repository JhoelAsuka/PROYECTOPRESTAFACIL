<?php
// Recibir datos del POST
$data = json_decode(file_get_contents("php://input"));

// Obtener datos
$cantidad = $data->cantidad;
$plazo = $data->plazo;
$periodoPago = $data->periodoPago;
$fechasPago = $data->fechasPago;


// ... tu lógica para calcular resultado y plazo ...

// Calcular el monto a pagar por fecha (10% de la cantidad total prestada)
$montoPagarPorFecha = ($cantidad / count($fechasPago)) * 1.1;

// Crear un array con la respuesta
$respuesta = array(
    'resultado' => '¡Datos guardados correctamente!',
    'plazo' => $plazo,
    'montoPagarPorFecha' => $montoPagarPorFecha
);

// Devolver la respuesta como JSON
echo json_encode($respuesta);
?>

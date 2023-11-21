<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
ob_start();
session_start();
include('../modelo/conexionPDO.php');
require('../controlador/fpdf186/fpdf.php');


$cantidad = $_GET['cantidad'];
$resultado = $_GET['resultado'];
$plazo = $_GET['plazo'];
$periodoPago = $_GET['periodoPago']; // Agrega esta línea para recibir el periodo de pago
$montoPagarPorFecha = $_GET['montoPagarPorFecha'];
$montoPagarPorFechaArray = explode(',', $montoPagarPorFecha);
$montoPagarPorFecha = array_map('floatval', $montoPagarPorFechaArray);


$fechasPago = json_decode($_GET['fechasPago']);
$fechasPago = array_map(function ($fecha) {
    // Asumiendo que el formato de fecha es "DD/MM/YYYY"
    $fechaObj = DateTime::createFromFormat('d/m/Y', $fecha);
    
    // Verifica si la creación fue exitosa
    if ($fechaObj === false) {
        throw new Exception("Error al parsear la fecha: $fecha");
    }
    
    return $fechaObj;
}, $fechasPago);

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

class PDF extends FPDF
    {
    private $correo;
    private $nombre;
    private $apaterno;
    private $amaterno;
    private $direccion;
    private $telefono;
    private $cantidad;
    private $plazo;
    private $periodoPago;
    private $fechasPago; // Nuevo atributo para almacenar las fechas de pago
    private $montoPagarPorFecha;
    

    // Constructor que recibe las variables necesarias
    function __construct($correo, $nombre, $apaterno, $amaterno, $direccion, $telefono, $cantidad, $plazo, $periodoPago, $fechasPago, $montoPagarPorFecha)
    {
        parent::__construct();
        $this->correo = $correo;
        $this->nombre = $nombre;
        $this->apaterno = $apaterno;
        $this->amaterno = $amaterno;
        $this->direccion = $direccion;
        $this->telefono = $telefono;
        $this->cantidad = $cantidad;
        $this->plazo = $plazo;
        $this->periodopago = $periodoPago;
        $this->fechasPago = $fechasPago;
        $this->montoPagarPorFecha = $montoPagarPorFecha;
    }

        //cabecera de página
    function Header()
    {
        //caracteres en español
        $cadena1 = "ó";
        $cadena2 = mb_convert_encoding($cadena1, 'UTF-16', 'UTF-8');
        $cadena3 = ltrim($cadena2);
        $cadena4 = "é";
        $cadena5 = mb_convert_encoding($cadena4, 'UTF-16', 'UTF-8');
        $cadena6 = ltrim($cadena5);
        $cadena7 = "ú";
        $cadena8 = mb_convert_encoding($cadena7, 'UTF-16', 'UTF-8');
        $cadena9 = ltrim($cadena8);
        //logo
        $this->Image('../vista/img/presta_facil.png',5,1,70);//(url de la imagen,posicion en x{horizontal, posicion en y,tamaño})
        //Arial bold 15
        $this->setFont('Arial','B',15);
        //movemos a la derecha
        $this->Cell(100);//(ancho,largo,contenido,borde,salto de linea)
        $this->Cell(40,10,'PRESTAFACIL',0,1,'C');
        $this->SetX(95);
        $this->Cell(73,10,'DETALLES DEL PRESTAMO',0,1,'C');
        $this->setFont('Arial','B',12);
        $this->SetX(198);
        $this->SetFillColor(211,211,211);
        $this->Cell(60,10,'Datos del Cliente',0,2,'C',true);
        $this->SetFont('Times','',12);
        $this->SetFillColor(173,216,230);
        $this->Cell(70, 8, 'Correo: ' . $this->correo, 0, 2,'L',);
        $this->Cell(70, 8, 'Nombre: ' . $this->nombre, 0, 2,'L',);
        $this->Cell(70, 8, 'Apellido Paterno: ' . $this->apaterno, 0, 2,'L',);
        $this->Cell(70, 8, 'Apellido Materno: ' . $this->amaterno, 0, 2,'L',);
        $this->Cell(70, 8,mb_convert_encoding('Dirección: ' . $this->direccion,'ISO-8859-1','UTF-8'), 0, 2,'L');
        $this->Cell(70, 8,mb_convert_encoding('Teléfono: ' . $this->telefono,'ISO-8859-1','UTF-8') , 0, 0,'L');
        $this->setFont('Arial','B',12);
        $this->SetX(18);
        $this->SetFillColor(211,211,211);
        $this->Cell(70,10,mb_convert_encoding('Préstamo Solicitado (total): $'. $this->cantidad,'ISO-8859-1','UTF-8'),'LTRB',2,'L',true);
        $this->Cell(70,10,mb_convert_encoding('Interés: 10%','ISO-8859-1','UTF-8'),'LRB',2,'L',true);    
        $this->Cell(70,10,mb_convert_encoding('Meses en los que se pagará: '. $this->plazo,'ISO-8859-1','UTF-8'),'LRB',2,'L',true);
        $this->Cell(70,10,'Periodo de pagos: '. $this->periodopago,'LRB',2,'L',true);

        $this->Ln(10);
    }
    function mostrarFechasPago()
{
    $monto = reset($this->montoPagarPorFecha); // Obtiene el primer valor del array de montos

    $this->SetFont('Arial', 'B', 12);
    $this->SetX(18);
    $this->SetFillColor(211, 211, 211);
    $this->Cell(70, 8, 'Fechas de Pago', 1, 2, 'LR', true);
    $this->SetFillColor(0, 211, 211);

    foreach ($this->fechasPago as $fecha) {
        $this->Cell(70, 6, $fecha->format('d/m/Y') . ' - $' . number_format($monto, 5), 'LRB', 2, 'L', true);
    }
}

//Pie de página
function Footer()
{
    //posición: a 1.5 cm del final
    $this->SetY(-15);
    //Arial italic B
    $this->SetFont('Arial','I',8);
    //Número de página
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb)',0,0,'C');
}
}
$pdf = new PDF($correo, $nombre, $apaterno, $amaterno, $direccion, $telefono, $cantidad, $plazo, $periodoPago, $fechasPago, $montoPagarPorFecha);
$pdf->AliasNbPages();
$pdf->AddPage('LANDSCAPE','letter');
$pdf->SetFont('Courier','',12);

// Intenta imprimir algo aquí para verificar si la creación del objeto está ocurriendo correctamente
// Puedes comentar esta línea después de verificar
var_dump($pdf);

$pdf->mostrarFechasPago();  // Llama al método mostrarFechasPago()

ob_end_clean();
$pdf->Output();
    
?>
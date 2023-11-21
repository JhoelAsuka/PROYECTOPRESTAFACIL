<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link
      rel="stylesheet"
      href="../controlador/bootstrap/css/bootstrap.min.css"
    />
    <link rel="stylesheet" href="../controlador/bootstrap/css/style.css" />
    <script src="../controlador/bootstrap/js/bootstrap.min.js"></script>

</head>
<body id="prestamo">
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
  <div class="container">
  <div class="col-sm-12 col-md-8 col-lg-6 mx-auto formulario">
    <h2 class="text-center mb-4">¡Solicita tu Préstamo!</h2>

    <!-- Formulario para solicitar préstamo -->
    <form id="prestamoForm">
      <div class="form-group">
        <label for="cantidad" class="slidervalue">Cantidad a Solicitar:

        </label>
        <div class="slider-container">
          <div class="slider-label">1,000</div>
          <input type="range" class="form-range" id="cantidad" name="cantidad" min="1000" max="20000" step="1000" value="1000">
          <div class="slider-label">20,000</div>
        </div>



        <output for="cantidad" id="output-cantidad">5,000</output>
        <small id="cantidadHelp" class="form-text text-muted">Mueva la barra para seleccionar la cantidad.</small>
      </div>
      <!-- Campo oculto para almacenar el ID del usuario y cantidad-->
      <input type="hidden" id="cantidadPrestadaHidden" name="cantidadPrestadaHidden" value="">
      <input type="hidden" id="idUsuarioHidden" name="idUsuarioHidden" value="">
      
      <div class="form-group">
        <label for="fecha" >Fecha de Solicitud:</label>
        <input type="date" class="form-control" id="fecha" name="fecha" required>
        <label for="plazo">Plazo de Pago(en meses):</label>
        <input type="number" class="form-control" id="plazo" name="plazo" min="1" placeholder="Ingrese el plazo en meses" required >

        <label for="periodoPago">Periodo de Pago:</label>
        <select class="form-control" id="periodoPago" name="periodoPago">
            <option value="mensual">Mensual</option>
            <option value="quincenal">Quincenal</option>
            <option value="semanal">Semanal</option>
            <option value="diario">Diario</option>
            <!-- Puedes agregar más opciones según tus necesidades -->
        </select>
      </div>
      <div class="form-group">
        <button type="button" class="btn btn-primary btn-block" onclick="guardarDatos()">Solicitar Préstamo</button>
      </div>
    </form>

    <!-- Tabla dinámica para mostrar detalles -->
    <div class="table-responsive table-hover" id="TablaConsulta" style="display: none;">
      <table class="table">
        <thead class="text-muted">
          <th class="text-center">Cantidad Prestada</th>
          <th class="text-center">Interés</th>
          <th class="text-center">Acciones</th> <!-- Nuevo encabezado para acciones -->
        </thead>
        <tbody id="detallePrestamo"></tbody>
      </table>
      <H4>Si Deseas ver mas detalles de tu prestamo antes de solicitar, puedes ver el pdf</H4>
      <a href="#" id="generarPDF">generar tu tabla en un pdf</a>
    </div>
  </div>
</div>

<script>
  var mensajeMostrado = false;
  var montoPagarPorFecha; // Declarar la variable global

  $("#cantidad").on("input", function() {
    $("#output-cantidad").text(addCommas($(this).val()));
    checkMaxAmount();
  });

  function addCommas(nStr) {
    nStr += '';
    var x = nStr.split('.');
    var x1 = x[0];
    var x2 = x.length > 1 ? '.' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)) {
      x1 = x1.replace(rgx, '$1' + ',' + '$2');
    }
    return x1 + x2;
  }

  function checkMaxAmount() {
    var maxAmount = 5000;
    var selectedAmount = parseInt($("#cantidad").val());

    if (selectedAmount > maxAmount && !mensajeMostrado) {
      alert("Para poder solicitar más, usted tiene que tener un historial activo con nosotros, gracias!");
      mensajeMostrado = true;
      // Puedes desactivar el botón de solicitud u otra acción aquí si lo prefieres
      $("#cantidad").val(5000); // Devuelve automáticamente la barra a 5,000
      $("#output-cantidad").text(addCommas(5000));
    } else if (selectedAmount <= maxAmount) {
      mensajeMostrado = false;
    }
  }
  function generarFechasPago(fechaSolicitud, plazo, periodoPago) {
    var fechasPago = [];
    var fechaActual = new Date(fechaSolicitud);

    // Ajustar el plazo según el periodo de pago
    if (periodoPago === 'diario') {
        plazo = plazo * 30; // Mantener el plazo en días
    } else if (periodoPago === 'semanal') {
        plazo = plazo * 4; // Convertir a semanas (4 semanas por mes)
    } else if (periodoPago === 'quincenal') {
        plazo = plazo * 2; // Convertir a quincenas (2 quincenas por mes)
    } else {
        // Mantener el plazo tal como está para pagos mensuales
    }

    for (var i = 1; i <= plazo; i++) {

        switch (periodoPago) {
            case 'mensual':
                fechaActual.setMonth(fechaActual.getMonth() + 1);
                break;
            case 'quincenal':
                fechaActual.setDate(fechaActual.getDate() + 15);
                break;
            case 'semanal':
                fechaActual.setDate(fechaActual.getDate() + 7);
                break;
            case 'diario':
                fechaActual.setDate(fechaActual.getDate() + 1);
                break;
            default:
                break;
        }

        fechasPago.push(new Date(fechaActual.getTime()).toLocaleDateString());
    }

    return fechasPago;
}

  function guardarDatos() {
    console.log("Se hizo clic en Solicitar Préstamo");
    var cantidadSeleccionada = parseInt($("#cantidad").val());
    // Puedes realizar acciones adicionales al solicitar el préstamo aquí

    // Lógica para procesar la solicitud y calcular detalles del préstamo
    var prestamo = {
      cantidadPrestada: cantidadSeleccionada,
      plazo: $("#plazo").val(),
      interes: 0.1, // Porcentaje de interés del 10%
      periodoPago: $("#periodoPago").val(),
    };
    var fechaSolicitud = new Date($("#fecha").val() + 'T00:00:00'); // Asegúrate de que la hora sea 00:00:00

    // Llamada a la función para generar fechas de pago
    var fechasPago = generarFechasPago(fechaSolicitud, prestamo.plazo, prestamo.periodoPago);

    // Puedes imprimir las fechas de pago en la consola para verificar
    
    console.log("Fechas de Pago:", fechasPago);
    

    // Llamada a la función para mostrar detalles del préstamo

    mostrarDetalles(prestamo);

}
$("#generarPDF").on("click", function(event) {
    event.preventDefault(); // Prevenir el comportamiento predeterminado del enlace

    // Recopilar los datos del formulario
    var cantidad = $("#cantidad").val();
    var plazoSeleccionado = $("#plazo").val();

    // Verificar si se ha seleccionado un plazo
    if (!plazoSeleccionado) {
        alert('Por favor, seleccione un plazo.');
        return;
    }

    // Llamada a la función para generar fechas de pago
    var fechaSolicitud = new Date($("#fecha").val() + 'T00:00:00'); // Asegúrate de que la hora sea 00:00:00
    var fechasPago = generarFechasPago(fechaSolicitud, plazoSeleccionado, $("#periodoPago").val());

    // Calcular el monto a pagar por fecha (10% de la cantidad total prestada)
    montoPagarPorFecha = (cantidad / fechasPago.length) * 1.1;

    // Datos a enviar en la solicitud AJAX
    var datos = {
        cantidad: cantidad,
        plazo: plazoSeleccionado,
        periodoPago: $("#periodoPago").val(),
        fechasPago: fechasPago,
        montoPagarPorFecha: montoPagarPorFecha
    };

    // Redirigir a generarreporte.php con los datos
    var url = '../controlador/generarreporte.php?cantidad=' + cantidad + '&plazo=' + plazoSeleccionado + '&periodoPago=' + datos.periodoPago + '&montoPagarPorFecha=' + montoPagarPorFecha + '&fechasPago=' + JSON.stringify(fechasPago);
    window.open(url, '_blank');
});
  function mostrarDetalles(prestamo) {
    $("#detallePrestamo").empty();
    $("#detallePrestamo").append(
      "<tr>" +
        "<td class='text-center'>" + prestamo.cantidadPrestada + "</td>" +
        "<td class='text-center'>" + prestamo.interes * 100 + "%</td>" +
        "<td class='text-center'><button class='btn btn-primary solicitar-ya-btn' data-cantidad='" + prestamo.cantidadPrestada + "' data-interes='" + prestamo.interes + "'>Solicitar ya</button></td>" +
      "</tr>"
    );

    // Mostrar la tabla
    $("#TablaConsulta").show();

    // Asociar evento clic al botón "Solicitar ya"
    $(".solicitar-ya-btn").on("click", function() {
      // Obtener datos del préstamo desde los atributos data del botón
      var cantidadPrestada = $(this).data("cantidad");
      var interes = $(this).data("interes");
      var fecha = $(this).data("fecha")

      // Mostrar el formulario de tarjeta o cuenta bancaria (puedes utilizar un modal, por ejemplo)
      mostrarFormularioTarjeta(cantidadPrestada, interes, fecha);
    });
  }

  function mostrarFormularioTarjeta(cantidadPrestada, interes) {
    // Obtener datos de sesión del usuario utilizando obtenerIdUsuario
    obtenerIdUsuario(function(idUsuario) {
      if (idUsuario !== null) {
        // Llenar detalles del préstamo en el formulario
        $("#numeroTarjeta").val(""); // Puedes llenar esto con información del préstamo si es necesario
        $("#nombrePropietario").val(""); // Puedes llenar esto con información del préstamo si es necesario
        $("#cvc").val(""); // Puedes llenar esto con información del préstamo si es necesario
        $("#fechaTarjeta").val(""); // Puedes llenar esto con información del préstamo si es necesario

        // Establecer la cantidad prestada en el campo oculto
        $("#cantidadPrestadaHidden").val(cantidadPrestada);

        // Establecer el ID del usuario en el campo oculto
        $("#idUsuarioHidden").val(idUsuario);

        // Mostrar el modal
        $('#formularioTarjetaModal').modal('show');
      } else {
        alert('Error al obtener el ID del usuario. Por favor, inténtelo de nuevo.');
      }
    });
  }

  function procesarFormularioTarjeta() {
    // Obtener datos de sesión del usuario utilizando obtenerIdUsuario
    obtenerIdUsuario(function(idUsuario) {
      // Obtener los datos del formulario
      var cantidadPrestada = $("#cantidadPrestadaHidden").val();
      var fecha = $("#fecha").val();
      var numeroTarjeta = $("#numeroTarjeta").val();
      var nombrePropietario = $("#nombrePropietario").val();
      var cvc = $("#cvc").val();
      var fechaTarjeta = $("#fechaTarjeta").val();
      

      // Verificar si los datos son válidos antes de enviar al servidor
      if (validarDatosTarjeta(numeroTarjeta, nombrePropietario, cvc, fechaTarjeta)) {
        // Enviar los datos al servidor mediante Ajax
        var datos = {
          idUsuario: idUsuario,
          cantidadPrestada: cantidadPrestada,
          fecha: fecha,
          numeroTarjeta: numeroTarjeta,
          nombrePropietario: nombrePropietario,
          cvc: cvc,
          fechaTarjeta: fechaTarjeta,
          montoPagarPorFecha: montoPagarPorFecha
        };

        $.ajax({
          type: 'POST',
          url: '../controlador/guardarhistorial.php', // Ruta del script que procesará y guardará en la base de datos
          data: JSON.stringify(datos),
          contentType: 'application/json',
          success: function(response) {
            // Procesar la respuesta del servidor si es necesario
            console.log(response);
          },
          error: function(error) {
            console.error('Error al enviar los datos al servidor:', error);
          }
        });

        // Cerrar el modal después de procesar
        $('#formularioTarjetaModal').modal('hide');
      } else {
        // Informar al usuario que los datos no son válidos
        alert("Por favor, ingrese datos válidos.");
      }
    });
  }

  function validarDatosTarjeta(numeroTarjeta, nombrePropietario, cvc, fechaTarjeta) {
    // Implementa tu lógica de validación aquí
    // Retorna true si los datos son válidos, false si no lo son

    return true; // Implementa la lógica de validación según tus necesidades
  }

  // Función de ejemplo para obtener el ID del usuario (debes implementarla según tu lógica de sesión)
  function obtenerIdUsuario(callback) {
    $.ajax({
      type: 'GET',
      url: '../controlador/obtenerIdUsuario.php',
      success: function(response) {
        var data = JSON.parse(response);
        if (data.success) {
          // Llamar a la función de devolución de llamada con el ID del usuario
          callback(data.idUsuario);
        } else {
          console.error('Error al obtener el ID del usuario:', data.message);
          // Llamar a la función de devolución de llamada con null en caso de error
          callback(null);
        }
      },
      error: function(error) {
        console.error('Error al obtener el ID del usuario:', error);
        // Llamar a la función de devolución de llamada con null en caso de error
        callback(null);
      }
    });
  }

</script>

</body>
<!-- Modal para el formulario de tarjeta -->
<div class="modal fade" id="formularioTarjetaModal" tabindex="-1" role="dialog" aria-labelledby="formularioTarjetaModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="formularioTarjetaModalLabel">Formulario de Tarjeta/Cuenta Bancaria</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- Formulario para la tarjeta/cuenta bancaria -->
        <form id="formularioTarjeta">
          <div class="form-group">
            <label for="numeroTarjeta">Número de Tarjeta/Cuenta (16 dígitos):</label>
            <input type="text" class="form-control" id="numeroTarjeta" name="numeroTarjeta" maxlength="16" required>
          </div>
          <div class="form-group">
            <label for="nombrePropietario">Nombre del Propietario:</label>
            <input type="text" class="form-control" id="nombrePropietario" name="nombrePropietario" required>
          </div>
          <div class="form-group">
            <label for="cvc">CVC:</label>
            <input type="text" class="form-control" id="cvc" maxlength="3" name="cvc" required>
          </div>
          <div class="form-group">
            <label for="fechaTarjeta">Fecha de Vencimiento:</label>
            <input type="date" class="form-control" id="fechaTarjeta" name="fechaTarjeta" required>
          </div>
          <button type="button" class="btn btn-primary" onclick="procesarFormularioTarjeta()">Procesar</button>
        </form>
      </div>
    </div>
  </div>
</div>
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
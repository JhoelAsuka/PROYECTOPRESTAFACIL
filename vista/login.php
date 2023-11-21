<!DOCTYPE html>
<html lang="es-MX">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link
      rel="stylesheet"
      href="../controlador/bootstrap/css/bootstrap.min.css"
    />
    <link rel="stylesheet" href="../controlador/bootstrap/css/style.css" />
  </head>
<body id="principal">
    <!-- ponemos el contenedor -->
    <div class="container w-75 bg-primary-subtle mt-5 mb-5 rounded-3 shadow" id="login">
      <div class="row align-items-stretch">
        <div class="col bg d-none d-lg-block col-md-4 col-lg-5 col-xl-6 rounded-2">
        </div>
        <div class="col bg-dark-subtle p-4 rounded-end-3">
          <div class="text-end">
            <img src="img/moneda.jpg" alt="" width="48" />
          </div>
          <!-- negritas.texto centrado, espacio entre titulo y contenido -->
          <h2 class="fw-bold text-center py-5">Bienvenido</h2>
          <!-- login -->
          <form action="./../controlador/validaRegistro.php" method="POST">
            <div class="mb-4">
              <label for="email" class="form-label"> Correo electronico</label>
              <input type="email" placeholder="ingrese su nombre"class="form-control" name="correo" />
            </div>
            <div class="mb-4">
              <label for="password" class="form-label"> Contraseña</label>
              <input type="password" placeholder="ingrese su contraseña"class="form-control" name="password" />
            </div>
            <div class="mb-4" class="form-check">
              <input
                type="checkbox"
                name="connected"
                class="form-check-input"
              />
              <label for="connected" class="form-check-label">
                ¿Deseas guardar tus inicio de sesión?</label
              >
            </div>

            <div class="d-grid">
              <button type="submit" value="Ingresar"class="btn btn-primary col-10 col-md-12">
                Iniciar sesión
              </button>
            </div>

            <div class="my-3">
              <span>No tienes una cuenta? <a href="registro.php">Crear Cuenta</a></span
              ><br />
              <span
                >Olvidaste tu contraseña?<a href=""
                  >Recuperar Contraseña</a
                ></span
              >
            </div>
          </form>

          <!-- iniciar sesion con google-->

              <div class="col"></div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script src="/src/controlador/bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>

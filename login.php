<?php include "config.php"; ?>

<!doctype html>
<html lang="es">
<?php include FOLDER_TEMPLATE . "head.php"; ?>

<body onload="cargarAlerta()">
  <nav class="navbar navbar-color-on-scroll navbar-transparent fixed-top navbar-expand-lg bg-primary" color-on-scroll="100">
    <div class="container">
      <div class="navbar-translate">
        <a class="navbar-brand" href="">
          B-ASK Project </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="sr-only">Toggle navigation</span>
          <span class="navbar-toggler-icon"></span>
          <span class="navbar-toggler-icon"></span>
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>

      <div class="collapse navbar-collapse">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a href="View/contacto.php" class="nav-link">
              <i class="material-icons">face</i> Contactanos
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="material-icons">login</i> Login
            </a>
          </li>
          <li class="nav-item">
            <a href="View/usuario.php" class="nav-link">
              <i class="material-icons">boy</i> Registrate
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <script type="text/javascript" charset="UTF-8" src="./Material Kit PRO by Creative Tim_files/common.js.descarga"></script>
  <script type="text/javascript" charset="UTF-8" src="./Material Kit PRO by Creative Tim_files/util.js.descarga"></script>
  </head>

  <body class="login-page sidebar-collapse">




    <div class="page-header header-filter" style="background-image: url(assets/img/bg2.jpg); background-size: cover; background-position: top center;">
      <div class="container">
        <div class="row">
          <div class="col-lg-4 col-md-6 col-sm-8 ml-auto mr-auto">
            <form class="form" method="post" action="Controller/UsuarioController.php">
              <div class="card card-login card-hidden">            
                <div class="card-header card-header-primary text-center">
                  <h4 class="">¡Logueate Ahora!</h4>

                </div>
                <div class="card-body ">
                  <p class="card-description text-center">Inicia sesion con tus credenciales</p>

                  <span class="bmd-form-group">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="material-icons">email</i>
                        </span>
                      </div>
                      <input type="email" name="uName" class="form-control" placeholder="Email...">
                    </div>
                  </span>
                  <span class="bmd-form-group">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="material-icons">lock_outline</i>
                        </span>
                      </div>
                      <input type="password" name="uPass" class="form-control" placeholder="Contraseña...">
                    </div>
                  </span>
                </div>
                <div class="card-footer justify-content-center">
                  <button class="btn btn-primary " name="opcion" value="validar">iniciar sesion</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>



      <?php include FOLDER_TEMPLATE . "footer.php"; ?>
      <?php include FOLDER_TEMPLATE . "scripts.php"; ?>


      <script>
        <?php
        if (isset($_GET['result'])) {

          if ($_GET['result'] == "login") { ?>

            function cargarAlerta() {
              Swal.fire({
                icon: 'error',
                title: '¡Algo anda mal!',
                text: 'Usuario o contraseña incorrectos.',
              })
              <?php $_GET['result'] = null; ?>
            }
          <?php } else if ($_GET['result'] == "contacto") { ?>

            function cargarAlerta() {
              swal("¡Enviado!", "El correo ha sido enviado.", "success");
              <?php $_GET['result'] = null; ?>
            }
        <?php }
        }
        ?>
      </script>
  </body>

</html>
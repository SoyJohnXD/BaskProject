<?php include "../config.php"; ?>

<!doctype html>
<html lang="es">
<?php include FOLDER_TEMPLATE . "head.php"; ?>

<body>
<nav class="navbar navbar-color-on-scroll navbar-transparent fixed-top navbar-expand-lg bg-primary" color-on-scroll="100">
    <div class="container">
      <div class="navbar-translate">
        <a class="navbar-brand" href="#">
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
            <a href="contacto.php" class="nav-link">
              <i class="material-icons">face</i> Contactanos
            </a>
          </li>
          <li class="nav-item">
            <a href="../login.php" class="nav-link">
              <i class="material-icons">login</i> Login
            </a>
          </li>
          <li class="nav-item">
            <a href="usuario.php" class="nav-link">
              <i class="material-icons">boy</i> Registrate
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div>
    <div class="page-header header-filter" data-parallax="true" style="background-image: url('<?= URL_LIBS ?>/img/bg3.jpg')">


      <div class="container">
        <br><br><br><br>
        <form class="needs-validation" method="post" action="../Controller/UsuarioController.php">
          <div class="row">
            <div class="col-md-8 ml-auto mr-auto">
              <div class="brand text-center">
                <div class="card card-login card-hidden p-5 text-left">
                  <div class="card-header card-header-primary text-center ">
                    <h2>Registro de Profesor</h2>
                  </div>
                  <div class="row">

                    <div class="form-group bmd-form-group col-md-5 col-6">
                      <label for="nombres" class="bmd-label-floating">Nombres</label>
                      <input type="text" name="R_Nombre" class="form-control" id="nombres" required>
                    </div>

                    <div class="form-group bmd-form-group col-md-5 col-6">
                      <label for="apellidos" class="bmd-label-floating">Apellidos</label>
                      <input type="text" name="R_Apellido" class="form-control" id="apellidos" required>
                    </div>

                    <div class="form-group bmd-form-group col-md-5 col-6">
                      <label for="tipoDoc" class="bmd-label-floating">Tipo Doc</label>
                      <input type="text" name="R_TipoDoc" class="form-control" id="tipoDoc" required>
                    </div>

                    <div class="form-group bmd-form-group col-md-5 col-6">
                      <label for="numDoc" class="bmd-label-floating">Numero de Documento</label>
                      <input type="number" name="R_NumDoc" class="form-control" id="numDoc" required>
                    </div>

                    <div class="form-group bmd-form-group col-md-5 col-6">
                      <label for="email" class="bmd-label-floating">Email</label>
                      <input type="email" name="R_Email" class="form-control" id="email" required>
                    </div>

                    <div class="form-group bmd-form-group col-md-5 col-6">
                      <label for="telefono" class="bmd-label-floating">Teléfono</label>
                      <input type="number" name="R_Tele" class="form-control" id="telefono" required>
                    </div>

                    <div class="form-group bmd-form-group col-md-5 col-6">
                      <label class="bmd-label-floating">Contraseña</label>
                      <input type="password" name="R_Pass" class="form-control" id="passwordU" required>
                    </div>

                  </div>
                  <div class="d-grid gap-2 mx-auto">
                    <button type="submit" name="opcion" value="registrar" class="btn btn-primary ">Registrarse</button>
                  </div>


                </div>

              </div>

            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

  <br>

  <?php include FOLDER_TEMPLATE . "footer.php"; ?>
  <?php include FOLDER_TEMPLATE . "scripts.php"; ?>
  <?php include FOLDER_TEMPLATE . "Alertas.php"; ?>


</body>

</html>
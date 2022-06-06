<?php include "../config.php"; ?>

<!doctype html>
<html lang="es">
<?php include FOLDER_TEMPLATE . "head.php"; ?>



<body>
<nav class="navbar navbar-color-on-scroll navbar-transparent fixed-top navbar-expand-lg bg-primary" color-on-scroll="100">
    <div class="container">
      <div class="navbar-translate">
        <a class="navbar-brand" href="../login.php">
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
            <a href="#" class="nav-link">
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

    <div class="cd-section" id="contactus">

        <div class="contactus-1 section-image" style="background-image: url('../assets/img/city-profile.jpg')">
            <div class="container">
                <div class="row">
                    <div class="col-md-5">
                        <h2 class="title">Contáctanos</h2>
                        <h5 class="description">¿Necesitas más información? ve a nuestras, llámanos o simplemente deja tus datos y nos pondremos en contacto contigo.</h5>
                        <div class="info info-horizontal">
                            <div class="icon icon-primary">
                                <i class="material-icons">pin_drop</i>
                            </div>
                            <div class="description">
                                <h4 class="info-title">Encuéntranos en la oficina</h4>
                                <p> Calle 103 # 19 - 60
                                    <br> Norte de Bogotá 
                                    <br> Colombia 
                                </p>
                            </div>
                        </div>
                        <div class="info info-horizontal">
                            <div class="icon icon-primary">
                                <i class="material-icons">phone</i>
                            </div>
                            <div class="description">
                                <h4 class="info-title">Llámanos</h4>
                                <p> Diana López
                                    <br> 601 725 3698
                                    <br> Lun - Vie, 8:00 - 18:00
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5 ml-auto">
                        <div class="card card-contact">
                            <form id="contact-form" method="post" action="../Controller/UsuarioController.php">
                                <div class="card-header card-header-raised card-header-primary text-center">
                                    <h4 class="card-title">Envíanos tu mensaje</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group label-floating is-empty bmd-form-group">
                                                <label for="nombresC" class="bmd-label-floating">Nombres</label>
                                                <input type="text" name="R_NombresC" class="form-control" id="nombresC">
                                                <span class="material-input"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group label-floating is-empty bmd-form-group">
                                                <label for="apellidosC" class="bmd-label-floating">Apellidos</label>
                                                <input type="text" name="R_ApellidosC" class="form-control" id="apellidosC">
                                                <span class="material-input"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group label-floating is-empty bmd-form-group">
                                        <label for="emailC" class="bmd-label-floating">Email</label>
                                        <input type="email" name="R_EmailC" class="form-control" id="emailC">
                                        <span class="material-input"></span>
                                    </div>
                                    <div class="form-group label-floating is-empty bmd-form-group">
                                        <label for="Message" class="bmd-label-floating">Tu mensaje</label>
                                        <textarea name="R_Message" class="form-control" id="Message" rows="6"></textarea>
                                        <span class="material-input"></span>
                                    </div>
                                </div>
                                <div class="card-footer justify-content-between">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox" value=""> No soy un robot
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>
                                    <button type="submit" name="opcion" value="contacto" class="btn btn-primary">Enviar Mensaje</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


  <?php include FOLDER_TEMPLATE . "footer.php"; ?>
  <?php include FOLDER_TEMPLATE . "scripts.php"; ?>
  <?php include FOLDER_TEMPLATE . "Alertas.php"; ?>

</body>

</html>
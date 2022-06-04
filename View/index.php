<?php include "../config.php"; ?>

<!doctype html>
<html lang="es">
<?php include FOLDER_TEMPLATE . "head.php"; ?>

<body>
  <?php include FOLDER_TEMPLATE . "top.php"; ?>

  <div class="page-header header-filter" data-parallax="true" style="background-image: url('<?= URL_LIBS ?>/img/bg3.jpg')">
    <div class="container">
      <div class="row">
        <div class="col-md-8 ml-auto mr-auto">
          <div class="brand text-center">
            <h1>Banco de preguntas</h1>
            <h3 class="title text-center">Politecnico Gran Colombiano</h3>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="main main-raised">
    <div class="container">
      <div class="section text-center">
        <section class="pt-3 pb-4" id="count-stats">
          <div class="container">
            <div class="row">
              <div class="col-lg-9 z-index-2 border-radius-xl mx-auto py-3">
                <div class="row">
                  <div class="col-md-4 position-relative">
                    <div class="p-3 text-center">
                      <h1 class="text-gradient text-primary"><span id="state1" countto="300">300</span>+</h1>
                      <h5 class="mt-3">Profesores Registrados</h5>
                      <p class="text-sm font-weight-normal">Profesionales de todas partes del pais trabajando por una mejor educacion virtual</p>
                    </div>
                    <hr class="vertical dark">
                  </div>
                  <div class="col-md-4 position-relative">
                    <div class="p-3 text-center">
                      <h1 class="text-gradient text-primary"> <span id="state2" countto="200">200</span>+</h1>
                      <h5 class="mt-3">Examenes</h5>
                      <p class="text-sm font-weight-normal">Una Gran Base de datos con mas De mil examenes de todas las facultades</p>
                    </div>
                    <hr class="vertical dark">
                  </div>
                  <div class="col-md-4">
                    <div class="p-3 text-center">
                      <h1 class="text-gradient text-primary"> <span id="state2" countto="1000">1000</span>+</h1>
                      <h5 class="mt-3">Preguntas</h5>
                      <p class="text-sm font-weight-normal">Inmensa cantidad de preguntas esperando para ser utilizadas con tus estudiantes</p>
                    </div>
                    <hr class="vertical dark">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>

        <section class="my-5 py-5">
          <div class="container">
            <div class="row align-items-center">
              <div class="col-lg-4 ms-auto me-auto p-lg-4 mt-lg-0 mt-4">
                <div class="rotating-card-container">
                  <div class="card card-rotate card-background card-background-mask-primary shadow-primary mt-md-0 mt-5">
                    <div class="front front-background" style="background-image: url(../assets/img/examen.png); background-size: cover;">
                      <div class="card-body py-7 text-center">
                        <i class="material-icons text-white text-4xl my-3">touch_app</i>
                        <h3 class="text-white">¿Por qué utilizar <br> BASK-Project ?</h3>
                        <p class="text-white opacity-8"></p>
                      </div>
                    </div>
                    <div class="back back-background" style="background-image: url(../assets/img/user.png); background-size: cover;">
                      <div class="card-body pt-7 text-center">
                        <h3 class="text-white"></h3>
                        <p class="text-white opacity-8"> Implementamos nuevas tecnologias y hacemos que la creación de examenes sea mas facil.</p>
                        <a href="../View/usuario.php" target="_blank" class="btn btn-white btn-sm w-50 mx-auto mt-3">Crea tu usuaruio</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-6 ms-auto">
                <div class="row justify-content-start">
                  <div class="col-md-6">
                    <div class="info">
                      <i class="material-icons text-gradient text-primary text-3xl">login</i>
                      <h5 class="font-weight-bolder mt-4">Acceso Rapido</h5>
                      <p class="pe-5">Contamos con un regitro rapido y seguro para tu ingreso a la plataforma.</p>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="info">
                      <i class="material-icons text-gradient text-primary text-3xl">check</i>
                      <h5 class="font-weight-bolder mt-4">Preguntas</h5>
                      <p class="pe-3">Puedes crear diferentes tipos de preguntas con variaciones.</p>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <i class="material-icons text-gradient text-primary text-3xl">delete_forever</i>
                    <h5 class="font-weight-bolder mt-4">Elimina Facilmente Preguntas</h5>
                    <p class="pe-5">Despues de realizar una pregunta la puedes eliminar sin necesidad de hacer grandes cambios en el examen.</p>
                  </div>
                  <div class="col-md-6">
                    <i class="material-icons text-gradient text-primary text-3xl">category</i>
                    <h5 class="font-weight-bolder mt-4">¿Que facultades pueden crear examenes?</h5>
                    <p class="pe-5">Puedes crear examenes de cualquier facultad, no tenemos limite.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>

        <div class="row">
          <div class="col-md-4 mt-md-0">
            <a href="./sections/page-sections/hero-sections.html">
              <div class="card shadow-lg move-on-hover min-height-160 min-height-160">
                <img class="w-100" src="../assets/img/Devices2.jpg" alt="img" loading="lazy">
              </div>
              <div class="mt-2 ms-2">
                <h6 class="mb-0">Crea tus examenes <br>Desde Cualquier Lugar</h6>
                <p class="text-secondary text-sm font-weight-normal"></p>
              </div>
            </a>
          </div>
          <div class="col-md-4 mt-md-0 mt-4">
            <a href="./sections/page-sections/features.html">
              <div class="card shadow-lg move-on-hover min-height-160 min-height-160">
                <img class="w-100" src="../assets/img/facil1.jpg" alt="img" loading="lazy">
              </div>
              <div class="mt-2 ms-2">
                <h6 class="mb-0">Rapido</h6>
                <p class="text-secondary text-sm font-weight-normal"></p>
              </div>
            </a>
          </div>
          <div class="col-md-4 mt-md-0 mt-4">
            <a href="./sections/page-sections/pricing.html">
              <div class="card shadow-lg move-on-hover min-height-160 min-height-160">
                <img class="w-100" src="../assets/img/plataforma2.jpg" alt="img" loading="lazy">
              </div>
              <div class="mt-2 ms-2">
                <h6 class="mb-0">Una plaforma <br>facil de utilizar</h6>
                <p class="text-secondary text-sm font-weight-normal"></p>
              </div>
            </a>
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
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
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <div class="col-lg-4 ms-auto me-auto p-lg-4 mt-lg-0 mt-4">
          <div class="rotating-card-container">
            <div class="card card-rotate card-background card-background-mask-primary shadow-primary mt-md-0 mt-5">
              <div class="front front-background " style="background-image: url(https://images.unsplash.com/photo-1569683795645-b62e50fbf103?ixlib=rb-1.2.1&amp;ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;auto=format&amp;fit=crop&amp;w=987&amp;q=80); background-size: cover;">
                <div class="card-body py-7 text-center">
                  <i class="material-icons text-white text-4xl my-3">touch_app</i>
                  <h3 class="text-white">Comienza <br> Ahora</h3>
                  <p class="text-white opacity-8">Crea tu primer Examen y utiliza todas nuestras herramientas </p>
                </div>
              </div>
              <div class="back back-background" style="background-image: url(https://images.unsplash.com/photo-1498889444388-e67ea62c464b?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;ixlib=rb-1.2.1&amp;auto=format&amp;fit=crop&amp;w=1365&amp;q=80); background-size: cover;">
                <div class="card-body pt-7 text-center">
                  <h3 class="text-white">Descubre mas</h3>
                  <p class="text-white opacity-8"> Guarda tus examenes y comparte tu creatividad con el equipo de profesionales del poli</p>
                  <a href=".//sections/page-sections/hero-sections.html" target="_blank" class="btn btn-primary btn-sm w-50 mx-auto mt-3">Crear Examen</a>
                </div>
              </div>
            </div>
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
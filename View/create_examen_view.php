<?php include "../config.php"; ?>

<!doctype html>
<html lang="es">
<?php include FOLDER_TEMPLATE . "head.php"; ?>

<body>
  <?php include FOLDER_TEMPLATE . "top.php"; ?>
  <div class="page-header header-filter" data-parallax="true" style="background-image: url('<?= URL_LIBS ?>/img/bg3.jpg')">
    <div class="container">
    </div>
  </div>
  <div class="main main-raised" style="margin-top:-615px ;">
    <div class="container">
      <div class="section text-center" id="sectionComodin">
        <h3 class="text-dark mb-5">Seleccione el tipo de examen que desea realizar</h3>
        <div class="row">

          <div class="rotating-card-container col-md-4">
            <div class="card card-rotate card-background card-background-mask-primary shadow-primary mt-md-0 mt-5">
              <div class="front front-background  bg-primary">
                <div class="card-body py-7 text-center">
                  <i class="material-icons text-white text-4xl my-3">touch_app</i>
                  <h3 class="text-white">Crear un Quiz</h3>
                  <p class="text-white opacity-8">Crea un quiz para probar el conocimiento adquirido de tus estudiantes </p>
                </div>
              </div>
              <div class="back back-background bg-secondary">
                <div class="card-body pt-7 text-center">
                  <h3 class="text-white">Recuerde que</h3>
                  <p class="text-white opacity-8"> Los quices tienen un maximo de 10 preguntas</p>
                  <button class="btn btn-primary" onclick="dynamicForm('selectExam','quiz',)">Crear Examen</button>
                </div>
              </div>
            </div>
          </div>
          <div class="rotating-card-container col-md-4">
            <div class="card card-rotate card-background card-background-mask-primary shadow-primary mt-md-0 mt-5">
              <div class="front front-background  bg-primary">
                <div class="card-body py-7 text-center">
                  <i class="material-icons text-white text-4xl my-3">touch_app</i>
                  <h3 class="text-white">Crear un Parcial</h3>
                  <p class="text-white opacity-8">Crea examen parcial y evalua todo lo aprendido del ultimo corte</p>
                </div>
              </div>
              <div class="back back-background bg-secondary">
                <div class="card-body pt-7 text-center">
                  <h3 class="text-white">Requerda que</h3>
                  <p class="text-white opacity-8"> Los parciales tienen un maximo de 15 preguntas </p>
                  <a href=".//sections/page-sections/hero-sections.html" target="_blank" class="btn btn-primary btn-sm w-50 mx-auto mt-3">Crear Examen</a>
                </div>
              </div>
            </div>
          </div>
          <div class="rotating-card-container col-md-4">
            <div class="card card-rotate card-background card-background-mask-primary shadow-primary mt-md-0 mt-5">
              <div class="front front-background  bg-primary">
                <div class="card-body py-7 text-center">
                  <i class="material-icons text-white text-4xl my-3">touch_app</i>
                  <h3 class="text-white">Crear un Examen Final</h3>
                  <p class="text-white opacity-8">Crea un examen final y evalua todo lo aprendido en el semestre</p>
                </div>
              </div>
              <div class="back back-background bg-secondary">
                <div class="card-body pt-7 text-center">
                  <h3 class="text-white">Recuerda que </h3>
                  <p class="text-white opacity-8">Los examenes finales tienen un maximo de 25 preguntas</p>
                  <a href=".//sections/page-sections/hero-sections.html" target="_blank" class="btn btn-primary btn-sm w-50 mx-auto mt-3">Crear Examen</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <form action="" method="post">
          <div class="row">
            <div class="col-12 text-center">
              <h2>Examen de tipo <b> Quiz </b></h2>
            </div>
            <div class="col-12 text-left row">
              <h4>Informacion de el examen</h4>
              <hr>
              <div class="col-12 row">

                <div class="col-md-4 ">
                  <div class="form-group">
                    <label for="exampleFormControlSelect1">Facultad / Carrera</label>
                    <select class="form-control selectpicker" data-style="btn btn-link" id="exampleFormControlSelect1">
                      <option value="">Seleccione...</option>
                      <?php
                      require_once "../Model/facultad_model.php";
                      $facultad = new Facultad_model();
                      $listaFacultad = $facultad->listar();
                      foreach ($listaFacultad as $itemFacultad) { ?>
                        <option value="<?= $itemFacultad['id'] ?>"><?= $itemFacultad['nombre'] ?></option>
                      <?php }  ?>
                    </select>
                  </div>
                </div>
                <div class="col-md-4 ">
                  <div class="form-group">
                    <label for="exampleFormControlSelect1">Materia / Asignatura</label>
                    <select class="form-control selectpicker" data-style="btn btn-link" id="exampleFormControlSelect1">
                      <option value="">Seleccione...</option>
                      
                      <?php
                      require_once "../Model/Materia_model.php";
                      $materia = new Materia_model();
                      $listamateria = $materia->listar();
                      $selectgroup ="";
                      foreach ($listamateria as $itemMateria) { 
                        if (!$selectgroup == $itemMateria['facultad_id']) {?>
                      </optgroup> 
                          <?php
                          $selectgroup = $itemMateria['facultad_id']; ?>
                        <optgroup label="<?= $itemMateria['facultad_nombre'] ?>">
                       
                        <?php } ?>
                        <option value="<?= $itemMateria['id'] ?>"><?= $itemMateria['nombre']." / ".$itemMateria['facultad_id'] ?></option>
                        
                      <?php  }  ?>
                    </select>
                  </div>
                </div>
                <div class="col-md-4 ">
                  <div class="form-group bmd-form-group">
                    <label class="bmd-label-floating">Corte</label>
                    <input type="text" class="form-control">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>




  <?php include FOLDER_TEMPLATE . "scripts.php"; ?>
  <script src="../logic/create_examen_logic.js"></script>
  <?php include FOLDER_TEMPLATE . "Alertas.php"; ?>

</body>

</html>
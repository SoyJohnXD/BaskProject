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

        <div class="row" id="examOptions">
          <div class="col-md-12">
            <h3 class="text-dark mb-5">Seleccione el tipo de examen que desea realizar</h3>
          </div>
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
                  <button class="btn btn-primary" onclick="dynamicForm('selectExam','Q',)">Crear Examen</button>
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
                  <button class="btn btn-primary" onclick="dynamicForm('selectExam','P',)">Crear Examen</button>

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
                  <button class="btn btn-primary" onclick="dynamicForm('selectExam','F',)">Crear Examen</button>

                </div>
              </div>
            </div>
          </div>
        </div>
        <form action="" method="post" id="formExam" style="display: none;">
          <div class="row">
            <button type="button" onclick="dynamicForm('backToSelect')" class="btn btn-secondary"> <i class="fa-solid fa-caret-left"></i> Volver</button>
            <input type="hidden" name="typeExam" id="typeExam">
            <div class="col-12 text-center">
              <h2 id="titleForm"></h2>
            </div>
            <div class="col-12 text-left ">
              <h4>Informacion de el examen</h4>
              <hr>
              <div class="col-12 row mt-3">

                <div class="col-md-4 ">
                  <div class="form-group">
                    <label for="exampleFormControlSelect1">Facultad / Carrera <span class="text-danger">(*)</span></label>
                    <select class="form-control selectpicker" data-style="btn btn-link" name="selectFacultad" id="selectFacultad">
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
                    <label for="exampleFormControlSelect1">Materia / Asignatura <span class="text-danger">(*)</span></label>
                    <select class="form-control selectpicker" data-style="btn btn-link" name="selectMateria" id="selectMateria">
                      <option value="">Seleccione...</option>

                      <?php
                      require_once "../Model/Materia_model.php";
                      $materia = new Materia_model();
                      $listamateria = $materia->listar();
                      $selectgroup = "";
                      foreach ($listaFacultad as $itemFacultad) { ?>
                        <optgroup label="<?= $itemFacultad['nombre'] ?>">
                          <?php foreach ($listamateria as $itemMateria) {
                            if ($itemMateria['facultad_id'] == $itemFacultad['id']) { ?>

                              <option value="<?= $itemMateria['id'] ?>"><?= $itemMateria['nombre'] ?></option>

                          <?php }
                          }  ?>
                        </optgroup>
                      <?php }  ?>


                    </select>
                  </div>
                </div>
                <div class="col-md-4 ">
                  <div class="form-group">
                    <label for="exampleFormControlSelect1">Corte <span class="text-danger">(*)</span></label>
                    <select class="form-control selectpicker" data-style="btn btn-link" name="selectCorte" id="selectCorte">
                      <option value="">Seleccione...</option>
                      <option value="1">Primer corte</option>
                      <option value="2">Segundo corte</option>
                      <option value="3">Tercer corte</option>
                    </select>
                  </div>
                </div>


              </div>
            </div>
            <div class="col-12 text-left ">
              <h4>Cree o agregue las preguntas </h4>
              <p>Recuerde que el examen tiene un maximo de <b id="maxQuestions"></b> preguntas</p>
              <hr>
              <button class="btn btn-primary mr-3"><i class="material-icons">add</i>Crear una pregunta</button><button class="btn btn-info"><i class="material-icons">search</i>Buscar / Agregar pregunta</button>

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
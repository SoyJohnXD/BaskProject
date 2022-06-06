<?php include "../config.php"; ?>

<!doctype html>
<html lang="es">
<?php include FOLDER_TEMPLATE . "head.php"; ?>

<body>
  <?php include FOLDER_TEMPLATE . "top.php"; ?>
  <div style="    background-image: url(/BaskProject/assets//img/bg3.jpg);
    position: fixed;
    width: 100%;
    height: 100%;
    background-attachment: fixed;
    background-repeat: no-repeat;
    background-size: cover;
    top: 0;
    left: 0;
    filter: brightness(0.4);">

  </div>
  <div class="main main-raised" style="margin-top:100px ;">
    <div class="container">
      <div class="section text-center" id="sectionComodin">
        <div class="row" id="examOptions">
          <div class="col-md-12">
            <h3 class="text-dark mb-5">Seleccione el tipo de examen que desea realizar</h3>
          </div>
          <div class="col-md-4 ml-auto mr-auto">
            <div class="rotating-card-container">
              <div class="card card-rotate card-background">
                <div class="front front-background bg-primary">
                  <div class="card-body">
                    <i class="material-icons text-white text-4xl my-3">touch_app</i>
                    <h3 class="text-white">Crear un Quiz</h3>
                    <p class="text-white opacity-8">Crea un quiz para probar el conocimiento adquirido de tus estudiantes </p>
                  </div>
                </div>

                <div class="back back-background bg-secondary">
                  <div class="card-body">
                    <h3 class="text-white">Recuerde que</h3>
                    <p class="text-white opacity-8"> Los quices tienen un maximo de 10 preguntas</p>
                    <button class="btn btn-primary" onclick="dynamicForm('selectExam','Q',)">Crear Examen</button>

                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4 ml-auto mr-auto">
            <div class="rotating-card-container">
              <div class="card card-rotate card-background">
                <div class="front front-background bg-primary">
                  <div class="card-body">
                    <i class="material-icons text-white text-4xl my-3">touch_app</i>
                    <h3 class="text-white">Crear un Parcial</h3>
                    <p class="text-white opacity-8">Crea examen parcial y evalua todo lo aprendido del ultimo corte</p>
                  </div>
                </div>

                <div class="back back-background bg-secondary">
                  <div class="card-body">
                    <h3 class="text-white">Requerda que</h3>
                    <p class="text-white opacity-8"> Los parciales tienen un maximo de 15 preguntas </p>
                    <button class="btn btn-primary" onclick="dynamicForm('selectExam','P',)">Crear Examen</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4 ml-auto mr-auto">
            <div class="rotating-card-container">
              <div class="card card-rotate card-background">
                <div class="front front-background bg-primary">
                  <div class="card-body">
                    <i class="material-icons text-white text-4xl my-3">touch_app</i>
                    <h3 class="text-white">Crear un Examen Final</h3>
                    <p class="text-white opacity-8">Crea un examen final y evalua todo lo aprendido en el semestre</p>
                  </div>
                </div>

                <div class="back back-background bg-secondary">
                  <div class="card-body">
                    <h3 class="text-white">Recuerda que </h3>
                    <p class="text-white opacity-8">Los examenes finales tienen un maximo de 25 preguntas</p>
                    <button class="btn btn-primary" onclick="dynamicForm('selectExam','F',)">Crear Examen</button>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <form action="../Controller/examenController.php" method="post" id="formExam" style="display: none;">
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
                    <select class="form-control selectpicker" require data-style="btn btn-link" name="selectFacultad" id="selectFacultad">
                      <option value="">Seleccione...</option>
                      <?php
                      require_once "../Model/Facultad_model.php";
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
                    <select class="form-control selectpicker" require data-style="btn btn-link" name="selectMateria" id="selectMateria">
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
                    <select class="form-control selectpicker" require data-style="btn btn-link" name="selectCorte" id="selectCorte">
                      <option value="">Seleccione...</option>
                      <option value="1">Primer corte</option>
                      <option value="2">Segundo corte</option>
                      <option value="3">Tercer corte</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-12 ">
                  <div class="form-group">
                    <div class="col-12 row align-items-center">
                    <label  class ="m-0 mr-2" for="exampleFormControlSelect1">Descripcion del examen <span class="text-danger">(*)</span> </label><a data-container="body" data-toggle="tooltip" data-placement="right" title="Escribe una breve descripción de los temas a tratar en el examen."><span class="material-icons text-info">info</span></a>
                    </div>
                    <textarea name="inputDescripcion" id="inputDescripcion" require cols="30" rows="5" class="form-control border rounded"></textarea>
                  </div>
                </div>


              </div>
            </div>
            <div class="col-12 text-left ">
              <h4>Cree o agregue las preguntas </h4>
              <p>Recuerde que el examen tiene un maximo de <b id="maxQuestions"></b> preguntas</p>
              <hr>
              <button type="button" class="btn btn-primary mr-3" data-toggle="modal" data-target="#createQuestion"><i class="material-icons">add</i>Crear una pregunta</button>
              <button  type="button" class="btn btn-info" data-toggle="modal" data-target="#searchQuestionModal" ><i class="material-icons">search</i>Buscar / Agregar pregunta</button>
              <div class="col-12">
                <input type="hidden" id="ids_question">
                <div id="questionContainer" role="tablist" aria-multiselectable="true" class="card-collapse">


                  <div class="col-12 text-center" id="emptyQuestions">
                    <h3>No has creado ninguna pregunta Aún...</h3>
                  </div>

                </div>
                <input type="hidden" id="dataQuestions" name="dataQuestions">
                <input type="hidden" id="opcion" name="opcion" value="crearExamen">
                <button type="button" onclick="dynamicForm('sendForm')" class="btn btn-success float-right">Crear Examen</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- MODALES -->
  <!-- MODALES Pregunta -->
  <?php include FOLDER_MODALS . "modalNewQuestion.php"; ?>

  <!-- MODAL EJEMPLO -->
  <?php include FOLDER_MODALS . "modalExampleQuestion.php"; ?>

   <!-- MODAL BUSQUEDA DE PREGUNTAS -->
   <?php include FOLDER_MODALS . "modalSearchQuestons.php"; ?>



  <!-- Requerimos los scripts -->
  <?php include FOLDER_TEMPLATE . "scripts.php"; ?>
  <script src="../logic/create_examen_logic.js"></script>
  <script>
    var ids_answer = []
    var ids_question = []
    //FUNCION PARA ARREGLAR BUG DE DOBLE MODAL
    $(document).on('hidden.bs.modal', function(event) {
      if ($('.modal:visible').length) {
        $('body').addClass('modal-open');
      }
    });
    //--------------------------------------------
    $(function() {
      $('[data-toggle="tooltip"]').tooltip()
    })
  </script>
  <?php include FOLDER_TEMPLATE . "Alertas.php"; ?>

</body>

</html>
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
              <button type="button" class="btn btn-primary mr-3" data-toggle="modal" data-target="#createQuestion"><i class="material-icons">add</i>Crear una pregunta</button>
              <button class="btn btn-info"><i class="material-icons">search</i>Buscar / Agregar pregunta</button>
              <div class="col-12">
                <input type="hidden" id="ids_question">
                <div id="questionContainer" role="tablist" aria-multiselectable="true" class="card-collapse">

            


                </div>
              </div>
            </div>
          </div>

        </form>
      </div>
    </div>
  </div>

  <!-- MODALES -->
  <!-- MODALES Pregunta -->
  <div class="modal fade" id="createQuestion" tabindex="-1" role="dialog" aria-labelledby="createQuestionLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg " role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="createQuestionLabel">Creacion de pregunta</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" id="formQuestion">
          <p>Acontinuacion seleccione el tipo de pregunta que desea crear: <a style="cursor: pointer;" onclick="$('#exampleQuestion').modal('show')"><span class="material-icons text-primary">help</span></a> </p>

          <div class="col-md-12">
            <div class="row">
              <div class="col-md-6 ">
                <div class="form-group">
                  <label for="exampleFormControlSelect1">Tipo de pregunta: <span class="text-danger">(*)</span></label>
                  <select class="form-control selectpicker" onchange="dynamicForm('typeQuestion')" data-style="btn btn-link" name="selectTypeQuestion" id="selectTypeQuestion">
                    <option value="">Seleccione...</option>
                    <option value="abierta">Pregunta Abierta</option>
                    <option value="cerrada">Pregunta cerrada</option>
                  </select>
                </div>
              </div>
              <div class="col-md-6" id="tipoRespuesta">
                <div class="form-group">
                  <label for="exampleFormControlSelect1">Tipo de respuestas: <span class="text-danger">(*)</span></label>
                  <select class="form-control selectpicker" onchange="dynamicForm('typeAnswer')" disabled data-style="btn btn-link" name="selectTypeAnswer" id="selectTypeAnswer">
                    <option value="">Seleccione...</option>
                    <option value="unica">Unica respuesta</option>
                    <option value="multiple">Multiple Repuesta</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="col-12" id="contextQuestion" style="display: none;">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group bmd-form-group">
                    <div class="row">
                      <label class="m-0 d-flex align-items-center mr-3">Indicativo: </label><a data-container="body" data-toggle="tooltip" data-placement="right" title="Que debe hacer el estudiante. (No obligatorio)"><span class="material-icons text-info">info</span></a>
                    </div>
                    <textarea rows="2" type="text" name="inputIndicativo" id="inputIndicativo" class="form-control"></textarea>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group bmd-form-group">
                    <div class="row">
                      <label class="m-0 d-flex align-items-center mr-3">Contexto: </label><a data-container="body" data-toggle="tooltip" data-placement="right" title="Todo lo que debe saber el estudiante para responder. (No obligatorio"><span class="material-icons text-info">info</span></a>
                    </div>
                    <textarea rows="3" type="text" name="inputContexto" id="inputContexto" class="form-control"></textarea>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group bmd-form-group">
                    <div class="row">
                      <label class="m-0 d-flex align-items-center mr-3">Enunciado <span class="text-danger">(*)</span></label> <a data-container="body" data-toggle="tooltip" data-placement="right" title="Pregunta como tal. (Obligatorio)"><span class="material-icons text-info">info</span></a>
                    </div>
                    <textarea rows="3" type="text" name="inputEnunciado" id="inputEnunciado" class="form-control"></textarea>
                  </div>
                </div>
                <div class="col-md-12 text-center mt-3">
                  <div class="col-12 row">
                    <p>Seleccione una imagen si es necesario: </p><a data-container="body" data-toggle="tooltip" data-placement="right" title="Agregue imagen de contexto o guia si es necesario"><span class="material-icons text-info">info</span></a>
                  </div>
                  <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                    <div class="fileinput-new thumbnail img-raised">
                      <img src="<?= URL_LIBS ?>/img/placeholder.png" alt="...">
                    </div>
                    <div class="fileinput-preview fileinput-exists thumbnail img-raised"></div>
                    <div>
                      <span class="btn btn-raised btn-round btn-default btn-file">
                        <span class="fileinput-new">Select image</span>
                        <span class="fileinput-exists">Change</span>
                        <input type="file" name="fileImg" id="fileImg" />
                      </span>
                      <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div id="createAnswers" style="display: none ;" class="col-12 mt-3">
              <hr>
              <div class="text-center col-12">
                <h4 class="">Creacion de opciones de respuesta</h4>
              </div>
              <div class="row">
                <div class="col-md-8 d-flex align-items-center">
                  <p>Agregue o elimine las respuestas creadas</p>
                </div>
                <div class="col-md-4">
                  <div class="btn-group" role="group" aria-label="Basic example">
                    <button type="button" onclick="dynamicForm('createAnswers')" class="btn btn-success">
                      <span class="material-icons">add</span>
                      Añadir</button>
                    <button type="button" onclick="dynamicForm('deleteAllAnswers')" class="btn btn-danger">
                      <span class="material-icons">delete_forever</span>
                      Limpiar</button>
                  </div>
                </div>
              </div>
              <div id="answerContainer" class="col-12">
                <input type="hidden" id="ids_answer">
                <input type="hidden" id="typeAnswer">
                <table class="table">
                  <thead>
                    <tr>
                      <th class="text-center">Correcta</th>
                      <th class="text-center">Contenido</th>
                      <th class="text-center">Eliminar</th>
                    </tr>
                  </thead>
                  <tbody id="tbodyAnswers">
                    <td id="emptyAns" class="text-center" style="display: none ;" colspan="3">
                      <h4>No hay respuestas Creadas...</h4>
                    </td>
                  </tbody>
                </table>
              </div>

            </div>
            <div id="comodinAlert" class="col-12">
              <div class="rounded alert alert-info text center" role="alert">
                <b>Seleccione una opcion</b> para ajustar el formulario...
              </div>
            </div>


          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">cerrar</button>
          <button type="button" onclick="dynamicForm('createQuestion')" class="btn btn-primary">Guardar respuesta</button>
        </div>
      </div>
    </div>
  </div>

  <!-- MODAL EJEMPLO -->
  <div class="modal fade" id="exampleQuestion" tabindex="-1" role="dialog" aria-labelledby="exampleQuestionLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg " role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleQuestionLabel">Ejemplo de Creacion de pregunta</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Acontinuacion seleccione el tipo de pregunta que desea crear: </p>

          <div class="col-md-12">
            <div class="row">
              <div class="col-md-6 ">
                <div class="form-group">
                  <label for="exampleFormControlSelect1">Tipo de pregunta: <span class="text-danger">(*)</span></label>
                  <input type="text" class="form-control" readonly="readonly" value="Cerrada">

                </div>
              </div>
              <div class="col-md-6" id="tipoRespuesta">
                <div class="form-group">
                  <label for="exampleFormControlSelect1">Tipo de respuestas: <span class="text-danger">(*)</span></label>
                  <input type="text" class="form-control" readonly="readonly" value="Multiple Repuesta">

                </div>
              </div>
            </div>
            <div class="col-12" id="contextQuestion">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group bmd-form-group">
                    <p>Indicativo: <b class="text-danger">(*)</b></p>
                    <p>Identifica las expresiones de productos de sumas:</p>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group bmd-form-group">
                    <p>Contexto: <b class="text-danger">(*)</b></p>
                    <p>Una expresíon Productos de sumas - POS-, (Product Of Sums) está conformada por varios términos suma (Multiplicacion booleana) de literales (variable afirmada o negada) que se agrupan en un producto" class="form-control</p>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group bmd-form-group">
                    <p>Enunciado: <b class="text-danger">(*)</b></p>
                    <p> Dado el siguiente circuito: </p>
                  </div>
                </div>
                <div class="col-md-12 text-center">
                  <div class="col-12">Imagen de contexto: </div>
                  <br>

                  <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                    <div class="fileinput-new thumbnail img-raised">
                      <img src="<?= URL_LIBS ?>/img/img-example.png" alt="...">
                    </div>
                    <div class="fileinput-preview fileinput-exists thumbnail img-raised"></div>

                  </div>
                </div>
              </div>
            </div>
            <div id="createAnswers" class="col-12 mt-3">
              <div class="text-center col-12">
                <h3 class="">Creacion de opciones de respuesta</h4>
              </div>
              <div id="answerContainer" class="col-12">
                <table class="table">
                  <thead>
                    <tr>
                      <th class="text-center">Correcta</th>
                      <th class="text-center">Contenido</th>
                      <th class="text-center">Eliminar</th>
                    </tr>
                  </thead>
                  <tbody id="tbodyAnswers">
                    <tr>
                      <td>
                        <div class="form-check multiple text-center">
                          <label class="form-check-label">
                            <input class="form-check-input" type="checkbox" value="">
                            <span class="form-check-sign">
                              <span class="check"></span>
                            </span>
                          </label>
                        </div>
                      </td>
                      <td class="text-right">
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text">
                              <i class="material-icons">question_answer</i>
                            </span>
                          </div>
                          <input type="text" class="form-control" value=" Respuesta de ejemplo 1" placeholder="Contenido Respuesta">
                        </div>
                      </td>
                      <td class="td-actions text-center">
                        <button type="button" rel="tooltip" class="btn btn-danger">
                          <i class="material-icons">close</i>
                        </button>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <div class="form-check multiple text-center">
                          <label class="form-check-label">
                            <input class="form-check-input" checked type="checkbox" value="">
                            <span class="form-check-sign">
                              <span class="check"></span>
                            </span>
                          </label>
                        </div>
                      </td>
                      <td class="text-right">
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text">
                              <i class="material-icons">question_answer</i>
                            </span>
                          </div>
                          <input type="text" class="form-control" value=" Respuesta de ejemplo 2" placeholder="Contenido Respuesta">
                        </div>
                      </td>
                      <td class="td-actions text-center">
                        <button type="button" rel="tooltip" class="btn btn-danger">
                          <i class="material-icons">close</i>
                        </button>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <div class="form-check multiple text-center">
                          <label class="form-check-label">
                            <input class="form-check-input" type="checkbox" value="">
                            <span class="form-check-sign">
                              <span class="check"></span>
                            </span>
                          </label>
                        </div>
                      </td>
                      <td class="text-right">
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text">
                              <i class="material-icons">question_answer</i>
                            </span>
                          </div>
                          <input type="text" class="form-control" value="Respuesta de ejemplo 1" placeholder="Contenido Respuesta">
                        </div>
                      </td>
                      <td class="td-actions text-center">
                        <button onclick="$('#exampleQuestion').modal('hide')" type="button" rel="tooltip" class="btn btn-danger">
                          <i class="material-icons">close</i>
                        </button>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>



          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">cerrar</button>
        </div>
      </div>
    </div>
  </div>




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
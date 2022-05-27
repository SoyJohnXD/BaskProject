<div class="modal fade" id="createQuestion" tabindex="-1" data-backdrop="static" data-keyboard="false" role="dialog" aria-labelledby="createQuestionLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg " role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createQuestionLabel">Creacion de pregunta</h5>
      </div>
      <div class="modal-body" id="formQuestion">
        <p>Acontinuacion seleccione el tipo de pregunta que desea crear: <a style="cursor: pointer;" onclick="$('#exampleQuestion').modal('show')"><span class="material-icons text-primary">help</span></a> </p>

        <div class="col-md-12">
          <div class="row">
            
            <div class="col-md-6 text-center py-3 ">
              <label class="text-dark" for="">Tipo de pregunta: <span class="text-danger">(*)</span></label> <br>
              <input type="hidden" id="typeQuestionHid" >
              <div class="form-check form-check-radio form-check-inline">
                <label class="form-check-label">
                  <input class="form-check-input" type="radio" name="typeQuestionRadio" onchange="$('#typeQuestionHid').val(this.value);dynamicForm('typeQuestion')" id="typeQuestionRadio1" value="abierta"> Abierta
                  <span class="circle">
                    <span class="check"></span>
                  </span>
                </label>
              </div>
              <div class="form-check form-check-radio form-check-inline">
                <label class="form-check-label">
                  <input class="form-check-input" type="radio" name="typeQuestionRadio" onchange="$('#typeQuestionHid').val(this.value);dynamicForm('typeQuestion')" id="typeQuestionRadio2" value="cerrada"> Cerrada
                  <span class="circle">
                    <span class="check"></span>
                  </span>
                </label>
              </div>
            </div>
            <div class="col-md-6 text-center py-3" id="tipoRespuesta">
            <label class="text-dark" for="">Tipo de Respuesta: <span class="text-danger">(*)</span></label> <br>
              <input type="hidden" id="typeAnswerHid" >
              <div class="form-check form-check-radio form-check-inline">
                <label class="form-check-label">
                  <input class="form-check-input typeAnswerRadio" type="radio" name="typeAnswerRadio" onchange="$('#typeAnswerHid').val(this.value);dynamicForm('typeAnswer')" id="typeAnswerRadio1" value="unica"> Unica Respuesta
                  <span class="circle">
                    <span class="check"></span>
                  </span>
                </label>
              </div>
              <div class="form-check form-check-radio form-check-inline">
                <label class="form-check-label">
                  <input class="form-check-input typeAnswerRadio" type="radio" name="typeAnswerRadio" onchange="$('#typeAnswerHid').val(this.value);dynamicForm('typeAnswer')" id="typeAnswerRadio2" value="multiple"> Multiple Respuesta
                  <span class="circle">
                    <span class="check"></span>
                  </span>
                </label>
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
                    <label class="m-0 d-flex text-dark align-items-center mr-3">Enunciado: <span class="text-danger">(*)</span></label> <a data-container="body" data-toggle="tooltip" data-placement="right" title="Pregunta como tal. (Obligatorio)"><span class="material-icons text-info">info</span></a>
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
                      <span class="fileinput-new">Seleccionar imagen</span>
                      <span class="fileinput-exists">Cambiar</span>
                      <input type="file" name="fileImg" id="fileImg" />
                    </span>
                    <a href="#pablo" id="vaciarFileModal" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Quitar</a>
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
        <button type="button" class="btn btn-secondary" id="closeModalButton" data-dismiss="modal">Cerrar</button>
        <button type="button" onclick="dynamicForm('editQuestion')" id="editModalButton"  class="btn btn-warning d-none">Editar Pregunta</button>
        <button type="button"  id="variacionModalButton"  class="btn btn-info d-none">Crear variacion</button>
        <button type="button" onclick="dynamicForm('createQuestion')" id="saveModalButton" class="btn btn-primary">Guardar Pgunta</button>
      </div>
    </div>
  </div>
</div>
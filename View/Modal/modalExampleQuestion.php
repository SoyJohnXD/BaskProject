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

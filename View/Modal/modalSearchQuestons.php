<div class="modal fade" id="searchQuestionModal" tabindex="-1" data-backdrop="static" data-keyboard="false" role="dialog" aria-labelledby="searchQuestionModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg " role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="searchQuestionModalLabel">Filtrar Preguntas</h5>
      </div>
      <div class="modal-body" id="formQuestion">
      <div class="input-group mb-3">
  <input type="text" class="form-control" placeholder="Indique una palabra clave para filtrar" aria-label="Indique una palabra clave para filtrar" aria-describedby="basic-addon2">
  <div class="input-group-append">
    <button class="btn btn-info" type="button">Buscar pregunta</button>
  </div>
</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" id="closeModalButton" data-dismiss="modal">Cerrar</button>
        <button type="button" onclick="dynamicForm('editQuestion')" id="editModalButton" class="btn btn-warning d-none">Editar Pregunta</button>
        <button type="button" id="variacionModalButton" class="btn btn-info d-none">Crear variacion</button>
        <button type="button" onclick="dynamicForm('searchQuestionModal')" id="saveModalButton" class="btn btn-primary">Guardar Pgunta</button>
      </div>
    </div>
  </div>
</div>
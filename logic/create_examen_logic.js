var typeAnswer = ""; // Constante para almacenar el tipo de respuesta
var arrayAnswer = []; //Array temporal donde se van a almacenar por id las repuestas agregadas
var maxQuestions = "";

function llenar_hidden(list, id_hidden) {
  hidden = "";
  for (var i = 0; i < list.length; i++) {
    if (i == list.length - 1) {
      hidden += list[i];
    } else {
      hidden += list[i] + ",";
    }
  }
  document.getElementById(id_hidden).value = hidden;
}

//remover el item del array
function removeItemFromArr(item, list) {
  var i = list.indexOf(item);
  list.splice(i, 1);
}

function dynamicForm(option, dataSet) {
  switch (option) {
    /* ---------------------------------------------------------------------------------- */
    case "selectExam":
      $("#examOptions").hide("slow");
      $("#formExam").show("slow");

      titleForm = "";
      switch (dataSet) {
        case "Q":
          maxQuestions = 10;
          titleForm = "Examen de tipo <b> Quiz </b>";
          break;
        case "P":
          maxQuestions = 15;
          titleForm = "Examen de tipo <b>Parcial </b>";
          break;
        case "F":
          maxQuestions = 25;
          titleForm = "<b> Examen final </b>";
          break;
      }

      $("#maxQuestions").text(maxQuestions);
      $("#typeExam").val(dataSet);
      $("#titleForm").html(titleForm);
      break;
    /* ---------------------------------------------------------------------------------- */
    case "backToSelect": //Caso para volver a seleccionar el tipo de examen
      $("#examOptions").show("slow");
      $("#formExam").hide("slow");
      break;
    /* ---------------------------------------------------------------------------------- */
    case "typeQuestion":
      if ($("#selectTypeQuestion").val() == "abierta") {
        $("#comodinAlert").hide("fast"); //ocultamos la alerta
        $("#selectTypeAnswer").prop("disabled", true); //Se pone en disable
        $("#tipoRespuesta").find(".btn").addClass("disabled");
        $("#contextQuestion").show("fast"); //Se activa el formulario que no es variable
        $("#createAnswers").hide("fast"); //Se activa el formulario que no es variable

        typeAnswer = "abierta"; //le asignamos un valor a la variable constante para utilizarla despues
      } else if ($("#selectTypeQuestion").val() == "cerrada") {
        $("#comodinAlert").hide("slow"); //ocultamos la alerta
        $("#selectTypeAnswer").prop("disabled", false); //activamos el campo tipo respuesta
        $("#tipoRespuesta").find(".btn").removeClass("disabled");
        $("#comodinAlert").show("fast"); //mostramos la alerta
        $("#contextQuestion").hide("fast"); //Se inactiva el formulario que no es variable
      } else if ($("#selectTypeQuestion").val() == "") {
        $("#comodinAlert").show("slow"); //mostramos la alerta
        $("#selectTypeAnswer").prop("disabled", true); //activamos el campo tipo respuesta
        $("#tipoRespuesta").find(".btn").addClass("disabled");
        $("#contextQuestion").hide("fast"); //Se inactiva el formulario que no es variable
        typeAnswer = ""; //le asignamos un valor a la variable constante para utilizarla despues
      }
      break;
    case "typeAnswer":
      if ($("#selectTypeAnswer").val() == "unica") {
        typeAnswer = "unica"; //le asignamos un valor a la variable constante para utilizarla despues
        $("#typeAnswer").val(typeAnswer);
        $("#comodinAlert").hide("fast"); //ocultamos la alerta
        $("#contextQuestion").show("fast"); //Se activa el formulario que no es variable
        $("#createAnswers").show("fast"); //Se activa el formulario que no es variable
        dynamicForm('createAnswers');//creamos una fila para crear una respuesta
      } else if ($("#selectTypeAnswer").val() == "multiple") {
        typeAnswer = "multiple"; //le asignamos un valor a la variable constante para utilizarla despues
        $("#typeAnswer").val(typeAnswer);
        $("#comodinAlert").hide("slow"); //ocultamos la alerta
        $("#contextQuestion").show("fast"); //Se activa el formulario que no es variable
        $("#createAnswers").show("fast"); //Se activa el formulario que no es variable
        dynamicForm('createAnswers');
      } else if ($("#selectTypeAnswer").val() == "") {
        typeAnswer = ""; //le asignamos un valor a la variable constante para utilizarla despues
        $("#typeAnswer").val("");
        $("#comodinAlert").show("fast"); //ocultamos la alerta
        $("#contextQuestion").hide("fast"); //Se activa el formulario que no es variable
      }
      break;
    case "createAnswers":
      $("#emptyAns").hide();
      answerContainer = document.getElementById("tbodyAnswers");

      if (ids_answer.length < 5) {
        ids_answer = ids_answer.sort((a, b) => a - b);
        long = ids_answer.length;
        if (ids_answer.length != 0) {
          long = ids_answer[ids_answer.length - 1] + 1;
        }
        ids_answer.push(long);
        llenar_hidden(ids_answer, "ids_answer");
        var element = document.createElement("tr");
        element.id = "answer_" + long;
        texto = `
                  <td>
                    <div class="form-check multiple text-center">
                      <label class="form-check-label">
                        <input class="form-check-input" id="ansInputCheck_${long}" name="ansInputCheck_${long}" type="checkbox" value="">
                        <span class="form-check-sign">
                          <span class="check"></span>
                        </span>
                      </label>
                    </div>
                    <div class="form-check unique text-center form-check-radio">
                      <label class="form-check-label">
                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" >
                        <span class="circle">
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
                      <input type="text" class="form-control" id="ansInputText_${long}" name="ansInputText_${long}" placeholder="Contenido Respuesta">
                    </div>
                  </td>
                  <td class="td-actions text-center">
                    <button type="button" rel="tooltip" onclick="dynamicForm('deleteAnswer',${long})" class="btn btn-danger">
                      <i class="material-icons">close</i>
                    </button>
                  </td>`;
      } else {
        Swal.fire({
          title: "Oops..?",
          text: "Solo se permite un maximo de 6 respuestas",
          icon: "warning",
        });
      }
      element.innerHTML = texto;
      answerContainer.appendChild(element);
      if (typeAnswer == "unica") {
     
        $(".multiple").hide() 
        $(".multiple").find("input").prop("disabled",true) 
        $(".unique").show("fast") 
        $(".unique").find("input").prop("disabled",false) 
      }else if(typeAnswer == "multiple"){
        
        $(".unique").hide() 
        $(".unique").find("input").prop("disabled",true) 
        $(".multiple").show("fast") 
        $(".multiple").find("input").prop("disabled",false)
      }

      break;
    case "deleteAnswer":
      var tr = document.getElementById("answer_" + dataSet);
      $("#answer_"+dataSet).hide("fast")
      tr.parentNode.removeChild(tr);
      removeItemFromArr(dataSet, ids_answer);
      llenar_hidden(ids_answer, "ids_answer");
      if (ids_answer.length == 0) {
        $("#emptyAns").show('slow');
      }
      break;
    case "deleteAllAnswers":
      for (var i = 0; i < ids_answer.length; i++) {
        var tr = document.getElementById("answer_" + ids_answer[i]);
        $("#answer_"+ids_answer[i]).hide("fast")
        tr.parentNode.removeChild(tr);
      }
      ids_answer = [];
      llenar_hidden(ids_answer, "ids_answer");
      if (ids_answer.length == 0) {
        $("#emptyAns").show('slow');
      }
      break;

    default:
      break;
  }
}
function abrirModalExample() {
  $('#exampleQuestion').modal('show')
}

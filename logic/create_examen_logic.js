var typeAnswer = ""; // Constante para almacenar el tipo de respuesta
var arrayAnswer = []; //Array temporal donde se van a almacenar por id las repuestas agregadas
var maxQuestions = "";
var Questions= [];

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
        dynamicForm("createAnswers"); //creamos una fila para crear una respuesta
      } else if ($("#selectTypeAnswer").val() == "multiple") {
        typeAnswer = "multiple"; //le asignamos un valor a la variable constante para utilizarla despues
        $("#typeAnswer").val(typeAnswer);
        $("#comodinAlert").hide("slow"); //ocultamos la alerta
        $("#contextQuestion").show("fast"); //Se activa el formulario que no es variable
        $("#createAnswers").show("fast"); //Se activa el formulario que no es variable
        dynamicForm("createAnswers");
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
                        <input class="form-check-input" id="ansInputCheck_${long}" name="ansInputCheck_${long}" type="checkbox" >
                        <span class="form-check-sign">
                          <span class="check"></span>
                        </span>
                      </label>
                    </div>
                    <div class="form-check unique text-center form-check-radio">
                      <label class="form-check-label">
                        <input class="form-check-input" type="radio" name="ansInputRadio" id="ansInputRadio_${long}" >
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
        $(".multiple").hide();
        $(".multiple").find("input").prop("disabled", true);
        $(".unique").show("fast");
        $(".unique").find("input").prop("disabled", false);
      } else if (typeAnswer == "multiple") {
        $(".unique").hide();
        $(".unique").find("input").prop("disabled", true);
        $(".multiple").show("fast");
        $(".multiple").find("input").prop("disabled", false);
      }

      break;
    case "deleteAnswer":
      var tr = document.getElementById("answer_" + dataSet);
      $("#answer_" + dataSet).hide("fast");
      tr.parentNode.removeChild(tr);
      removeItemFromArr(dataSet, ids_answer);
      llenar_hidden(ids_answer, "ids_answer");
      if (ids_answer.length == 0) {
        $("#emptyAns").show("slow");
      }
      break;
    case "deleteAllAnswers":
      for (var i = 0; i < ids_answer.length; i++) {
        var tr = document.getElementById("answer_" + ids_answer[i]);
        $("#answer_" + ids_answer[i]).hide("fast");
        tr.parentNode.removeChild(tr);
      }
      ids_answer = [];
      llenar_hidden(ids_answer, "ids_answer");
      if (ids_answer.length == 0) {
        $("#emptyAns").show("slow");
      }
      break;
    case "createQuestion":
      if (dynamicForm("validarModalQuestion")) {
        
        
        
      if (ids_question.length < maxQuestions) {
        ids_question = ids_question.sort((a, b) => a - b);
        long = ids_question.length;
        if (ids_question.length != 0) {
          long = ids_question[ids_question.length - 1] + 1;
        }
        ids_question.push(long);
        llenar_hidden(ids_question, "ids_question");
        answerArray = []
        debugger
        if (typeAnswer == "unica" || typeAnswer == "multiple" ) {
          $("#ids_answer").val().split(',').forEach(element => {
            isCorrect = (typeAnswer=="unica")? $("#ansInputRadio_"+element).prop('checked'):$("#ansInputCheck_"+element).prop('checked');
            let answer= {
              "correct": isCorrect,
              "contenido":$("#ansInputText_"+element).val()
            }
            answerArray.push(answer)
          });
        }
        console.log(answerArray);
        temporalQuestion ={
          "temporalId":long,
          "typeQuestion":$("#selectTypeQuestion").val(),
          "typeAnswer":$("#selectTypeAnswer").val(),
          "indicativo":$("#inputIndicativo").val(),
          "contexto":$("#inputContexto").val(),
          "enunciado":$("#inputEnunciado").val(),
          "imageContex":($("#fileImg")[0].files.length > 0)?$("#fileImg")[0].files:"",
          "answers":(answerArray.length > 0)?answerArray: "" ,

        }
        console.log(temporalQuestion);
        var element = document.createElement("div");
        element.classList.add("card");
        element.classList.add("card-plain");
        answerHtml = "";
        if (!(typeAnswer == "abierta")) {
          temporalQuestion.answers.forEach(key => {
            if (typeAnswer=="unica") {
              answerHtml += `
              <div class="form-check d-flex align-items-center unique form-check-radio">
              <label class="form-check-label pl-5 text-dark">
                <input class="form-check-input" type="radio" name="ansInputRadio" id="ansInputRadio_${long}" >
                    ${key.contenido}
                <span class="circle">
                  <span class="check"></span>
                </span>
                </label>
                ${(key.correct)?`<span class="material-icons ml-3 text-success">check_circle</span>`:""}
              </div>`
            }else if (typeAnswer=="multiple") {
              answerHtml +=`
              <div class="form-check d-flex align-items-center">
                <label class="form-check-label pl-5 text-dark">
                  <input class="form-check-input" type="checkbox" value="">
                  ${key.contenido}
                  <span class="form-check-sign">
                    <span class="check"></span>
                  </span>
                </label>
                ${(key.correct)?`<span class="material-icons ml-3 text-success">check_circle</span>`:""}
              </div>`
            }
          });
        }else{
          answerHtml = `<div class="form-group">
          <textarea class="form-control" id="exampleFormControlTextarea1" placeholder="Escribe tu respuesta aqui..." rows="3" style="border: solid 1px #212529;border-radius: 6px;padding: 15px;"></textarea>
        </div>`
        }
        
        element.id = "question_" + long;
        texto = `   <div class="card-header" role="tab" id="headingOne">
                      <a data-toggle="collapse" data-parent="#questionContainer" href="#collapseOne_${long}" aria-expanded="true" aria-controls="collapseOne_${long}">
                        Pregunta numero ${long+1}:

                        <i class="material-icons">keyboard_arrow_down</i>
                      </a>
                    </div>

                    <div id="collapseOne_${long}" class="collapse show" role="tabpanel" aria-labelledby="headingOne">
                      <div class="card-body row ">
                        <div class="col-md-10 p-3">
                        <p>${temporalQuestion.indicativo}</p>
                        <p>${temporalQuestion.contexto}</p>
                        <p>${temporalQuestion.enunciado} </p>
                        <img src="${(!temporalQuestion.imageContex=="")?temporalQuestion.imageContex[0]['result']:''}" class="img-responsive ${(temporalQuestion.imageContex=="")?"d-none":""}"style="max-width: 55%;" alt="...">
                        <div class="col-md-12 d-flex mt-2 flex-column">
                        
                          ${answerHtml}
                        </div>
                        </div>
                        <div class="col-md-2 d-flex flex-md-column p-2 p-md-0 flex-row justify-content-center">
                        <a href="#pablo" class="btn btn-info btn-just-icon btn-fill btn-round" data-toggle="tooltip" data-placement="right" title="Añadir Variacion.">
                            <i class="material-icons">subject</i>
                        </a>
                        <a href="#pablo" class="btn btn-success btn-just-icon btn-fill btn-round btn-wd" data-toggle="tooltip" data-placement="right" title="Editar.">
                            <i class="material-icons">mode_edit</i>
                        </a>
                        <a href="#pablo" class="btn btn-danger btn-just-icon btn-fill btn-round" data-toggle="tooltip" data-placement="right" title="Eliminar.">
                            <i class="material-icons">delete</i>
                        </a>
                        </div>
                        
                      </div>
                    </div>`;
      } else {
        Swal.fire({
          title: "Oops..?",
          text: `Solo se permite un maximo de ${maxQuestions} respuestas`,
          icon: "warning",
        });
      }
      element.innerHTML = texto;
      questionContainer.appendChild(element);
      $("#createQuestion").modal("hide");

      }
      
      break;
    case "validarModalQuestion": //Validamos que los input no vengas vacios
      //Función para comprobar los campos de texto
      formQuestion = $("#formQuestion");
      tbodyAnswers = $("#tbodyAnswers");
      var camposRellenados = true;
      formQuestion.find("input").each(function () {
        var $this = $(this);
        if (!$this.attr("type") == "file") {
          if ($this.val().length <= 0) {
            camposRellenados = false;
            $this.parents(".form-group").addClass("has-danger");
            $this.focus().finish();
          }
        }
      });
      formQuestion.find("textarea[name=inputEnunciado]").each(function () {
        var $this = $(this);
          if ($this.val().length <= 0) {
            camposRellenados = false;
            $this.parents(".form-group").addClass("has-danger");
            $this.focus().finish();
          }
        
      });
      tbodyAnswers.find("input").each(function () {
      
        var $this = $(this);
          if ($this.attr("type") == "text") {
            if ($this.val().length <= 0) {
              camposRellenados = "respuestas";
              $this.parents(".input-group").addClass("has-danger");
              $this.focus().finish();
            }
      }
        
      });
      if (camposRellenados == false) {
        Swal.fire({
          title: "Algo salio mal",
          text: `Por favor verifique que haya llenado todos los campos obligatorios recuerde que estan marcados con el simbolo (*)`,
          icon: "error",
        });
        return false;
      } else if(camposRellenados == "respuestas") {
        Swal.fire({
          title: "Algo salio mal",
          text: `Por favor verifique que las respuestas esten diligenciadas correctamente`,
          icon: "error",
        });
        return false;
      }else {
        return true;
      }

      break;

    default:
      break;
  }
}

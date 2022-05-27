var typeAnswer = ""; // Constante para almacenar el tipo de respuesta
var arrayAnswer = []; //Array temporal donde se van a almacenar por id las repuestas agregadas
var maxQuestions = "";
var Questions = [];

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
      if ($("#typeQuestionHid").val() == "abierta") {
        $("#comodinAlert").hide("fast"); //ocultamos la alerta
        $(".typeAnswerRadio").prop("disabled", true); //Se pone en disable
        $(".typeAnswerRadio").find(".check").removeClass("check");
        $("#contextQuestion").show("fast"); //Se activa el formulario que no es variable
        $("#createAnswers").hide("fast"); //Se activa el formulario que no es variable
        dynamicForm("deleteAllAnswers");
        typeAnswer = "abierta"; //le asignamos un valor a la variable constante para utilizarla despues
      } else if ($("#typeQuestionHid").val() == "cerrada") {
        $("#comodinAlert").hide("slow"); //ocultamos la alerta
        $(".typeAnswerRadio").prop("disabled", false); //activamos el campo tipo respuesta
        $(".typeAnswerRadio").find(".check").removeClass("check");
        $("#comodinAlert").show("fast"); //mostramos la alerta
        $("#contextQuestion").hide("fast"); //Se inactiva el formulario que no es variable
      } else if ($("#typeQuestionHid").val() == "") {
        $("#comodinAlert").show("slow"); //mostramos la alerta
        $(".typeAnswerRadio").prop("disabled", true); //activamos el campo tipo respuesta
        $(".typeAnswerRadio").find("span").removeClass("check");
        $("#contextQuestion").hide("fast"); //Se inactiva el formulario que no es variable
        typeAnswer = ""; //le asignamos un valor a la variable constante para utilizarla despues
      }
      break;
    case "typeAnswer":
      if ($("#typeAnswerHid").val() == "unica") {
        typeAnswer = "unica"; //le asignamos un valor a la variable constante para utilizarla despues
        $("#typeAnswer").val(typeAnswer);
        $("#comodinAlert").hide("fast"); //ocultamos la alerta
        $("#contextQuestion").show("fast"); //Se activa el formulario que no es variable
        $("#createAnswers").show("fast"); //Se activa el formulario que no es variable
        dynamicForm("createAnswers"); //creamos una fila para crear una respuesta
      } else if ($("#typeAnswerHid").val() == "multiple") {
        typeAnswer = "multiple"; //le asignamos un valor a la variable constante para utilizarla despues
        $("#typeAnswer").val(typeAnswer);
        $("#comodinAlert").hide("slow"); //ocultamos la alerta
        $("#contextQuestion").show("fast"); //Se activa el formulario que no es variable
        $("#createAnswers").show("fast"); //Se activa el formulario que no es variable
        dynamicForm("createAnswers");
      } else if ($("#typeAnswerHid").val() == "") {
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
                  <td class="d-flex flex-row align-items-center justify-content-center">
                    <div class="form-check multiple text-center">
                      <label class="form-check-label">
                        <input class="form-check-input" id="ansInputCheck_${long}" name="ansInputCheck_${long}" type="checkbox" >
                        <span class="form-check-sign">
                          <span class="check"></span>
                        </span>
                      </label>
                    </div>

                    <div class="form-check form-check-radio unique form-check-inline ">
                    <label class="form-check-label">
                      <input class="form-check-input" type="radio" name="ansInputRadio" id="ansInputRadio_${long}">
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
        $(".unique").find("input").prop("disabled", false);
        $(".unique").show("fast");
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
          answerArray = [];

          if (typeAnswer == "unica" || typeAnswer == "multiple") {
            $("#ids_answer")
              .val()
              .split(",")
              .forEach((element) => {
                isCorrect =
                  typeAnswer == "unica"
                    ? $("#ansInputRadio_" + element).prop("checked")
                    : $("#ansInputCheck_" + element).prop("checked");
                let answer = {
                  correct: isCorrect,
                  contenido: $("#ansInputText_" + element).val(),
                };
                answerArray.push(answer);
              });
          }
          console.log(answerArray);
          temporalQuestion = {
            temporalId: long,
            typeQuestion: $("#typeQuestionHid").val(),
            typeAnswer: $("#typeAnswerHid").val(),
            indicativo: $("#inputIndicativo").val(),
            contexto: $("#inputContexto").val(),
            enunciado: $("#inputEnunciado").val(),
            imageContex:
              $("#fileImg")[0].files.length > 0
                ? $("#fileImg")[0].files[0]
                : "",
            answers: answerArray.length > 0 ? answerArray : "",
            variations: []
          };
          console.log(temporalQuestion);
          var element = document.createElement("div");
          element.classList.add("card");
          element.classList.add("card-plain");
          answerHtml = "";
          if (!(typeAnswer == "abierta")) {
            temporalQuestion.answers.forEach((key) => {
              if (typeAnswer == "unica") {
                answerHtml += `
              <div class="form-check d-flex align-items-center form-check-radio">
              <label class="form-check-label pl-5 text-dark">
                <input class="form-check-input" type="radio" name="ansInputRadioQuestion_${long}" id="ansInputRadioQuestion_${long}" >
                    ${key.contenido}
                <span class="circle">
                  <span class="check"></span>
                </span>
                </label>
                ${
                  key.correct
                    ? `<span class="material-icons ml-3 text-success">check_circle</span>`
                    : ""
                }
              </div>`;
              } else if (typeAnswer == "multiple") {
                answerHtml += `
              <div class="form-check d-flex align-items-center">
                <label class="form-check-label pl-5 text-dark">
                  <input class="form-check-input"  type="checkbox" value="">
                  ${key.contenido}
                  <span class="form-check-sign">
                    <span class="check"></span>
                  </span>
                </label>
                ${
                  key.correct
                    ? `<span class="material-icons ml-3 text-success">check_circle</span>`
                    : ""
                }
              </div>`;
              }
            });
          } else {
            answerHtml = `<div class="form-group">
          <textarea class="form-control" id="exampleFormControlTextarea1" placeholder="Escribe tu respuesta aqui..." rows="3" style="border: solid 1px #212529;border-radius: 6px;padding: 15px;"></textarea>
        </div>`;
          }

          element.id = "question_" + long;
          texto = `   <div class="card-header" role="tab" id="headingOne">
                      <a data-toggle="collapse" data-parent="#questionContainer" href="#collapseOne_${long}" aria-expanded="true" aria-controls="collapseOne_${long}">
                        Pregunta:

                        <i class="material-icons">keyboard_arrow_down</i>
                      </a>
                    </div>

                    <div id="collapseOne_${long}" class="collapse show" role="tabpanel" aria-labelledby="headingOne">
                      <div class="card-body row ">
                        <div class="col-md-10 p-3">
                        <p>${temporalQuestion.indicativo}</p>
                        <p>${temporalQuestion.contexto}</p>
                        <p>${temporalQuestion.enunciado} </p>
                        <img src="${
                          !temporalQuestion.imageContex == ""
                            ? temporalQuestion.imageContex.result
                            : ""
                        }" class="img-responsive ${
            temporalQuestion.imageContex == "" ? "d-none" : ""
          }"style="max-width: 55%;" alt="...">
                        <div class="col-md-12 d-flex mt-2 flex-column">
                        
                          ${answerHtml}
                        </div>
                        </div>
                        <div class="col-md-2 d-flex flex-md-column p-2 p-md-0 flex-row justify-content-center">
                        <button type="button" onclick="dynamicForm('fillToVariacion',${long})" class="btn btn-info btn-just-icon btn-fill btn-round" data-toggle="tooltip" data-placement="right" title="Añadir Variacion.">
                            <i class="material-icons">subject</i>
                        </button>
                        <button type="button" onclick="dynamicForm('fillToEdit',${long})" class="btn btn-success btn-just-icon btn-fill btn-round btn-wd" data-toggle="tooltip" data-placement="right" title="Editar.">
                            <i class="material-icons">mode_edit</i>
                        </button>
                        <button type="button" onclick="dynamicForm('alertDeleteQuestion',${long})" class="btn btn-danger btn-just-icon btn-fill btn-round" data-toggle="tooltip" data-placement="right" title="Eliminar.">
                            <i class="material-icons">delete</i>
                        </button>
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
        Questions.push(temporalQuestion);

        dynamicForm("cleanModalQuestions");
        $("#createQuestion").modal("hide");
      }

      break;
    case "alertDeleteQuestion":
      Swal.fire({
        title: "¿Estas seguro de borrar la pregunta?",
        text: "No puedes recuperar esta iformacion!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Eliminar!",
      }).then((result) => {
        if (result.isConfirmed) {
          dynamicForm("deleteQuestion", dataSet);
        }
      });
      break;
    case "deleteQuestion":
      questContainer = document.getElementById("question_" + dataSet);

      $("#question_" + dataSet).hide("fast");
      questContainer.parentNode.removeChild(questContainer);
      removeItemFromArr(dataSet, ids_question);
      llenar_hidden(ids_question, "ids_question");
      Questions.splice(dataSet, 1);
      if (ids_question.length == 0) {
        $("#emptyQuestions").show("slow");
      }
      Swal.fire("Eliminada!", "La pregunta ha sido eliminada.", "success");

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
      } else if (camposRellenados == "respuestas") {
        Swal.fire({
          title: "Algo salio mal",
          text: `Por favor verifique que las respuestas esten diligenciadas correctamente`,
          icon: "error",
        });
        return false;
      } else {
        return true;
      }

      break;
    case "vaciarInputs":
      container = $("#" + dataSet);
      $(":input", container).each(function () {
        var type = this.type;
        var tag = this.tagName.toLowerCase();
        //limpiar los valores de los campos
        if (type == "text" || type == "password" || tag == "textarea") {
          this.value = "";
          // los checkboxes y radios, le quitamos el checked
        } else if (type == "checkbox" || type == "radio") {
          this.checked = false;
          // los select quedan con indice -
        } else if (tag == "select") {
          this.selectedIndex = -1;
        }
      });
      $("#vaciarFileModal").click();
      console.log("inputs limpios");

      break;
    case "fillModalQuestion":
      tempQuestion = Questions[dataSet];
      $("#inputIndicativo").val(tempQuestion.indicativo);
      $("#inputContexto").val(tempQuestion.contexto);
      $("#inputEnunciado").val(tempQuestion.enunciado);
      if (tempQuestion.typeQuestion == "abierta") {
        $("#typeQuestionRadio1").prop("checked", true);
        $("#typeQuestionHid").val("abierta");
        dynamicForm("typeQuestion");
      } else if (tempQuestion.typeQuestion == "cerrada") {
        $("#typeQuestionRadio2").prop("checked", true);
        dynamicForm("typeQuestion");
        if (tempQuestion.typeAnswer == "unica") {
          $("#typeAnswerRadio1").prop("checked", true);
          $("#typeAnswerHid").val("unica");
          dynamicForm("typeAnswer");
          tempQuestion.answers.forEach((element, key) => {
            dynamicForm("createAnswers");
            if (tempQuestion.answers[key].correct == true) {
              $("#ansInputRadio_" + key).prop("checked", true);
            }
            $("#ansInputText_" + key).val(tempQuestion.answers[key].contenido);
          });
        } else if (tempQuestion.typeAnswer == "multiple") {
          $("#typeAnswerRadio2").prop("checked", true);
          $("#typeAnswerHid").val("multiple");
          dynamicForm("typeAnswer");
          tempQuestion.answers.forEach((element, key) => {
            if (!key == 0) {
              dynamicForm("createAnswers");
            }
            if (tempQuestion.answers[key].correct == true) {
              $("#ansInputCheck_" + key).prop("checked", true);
            }
            $("#ansInputText_" + key).val(tempQuestion.answers[key].contenido);
          });
        }
      }

      $("#createQuestion").modal("show");
      break;
    case "fillToEdit": // Llenar modal para editar
      dynamicForm("fillModalQuestion", dataSet);
      //Modificamos los botones para hacer la edicion
      $("#editModalButton").removeClass("d-none");
      $("#editModalButton").attr(
        "onClick",
        'dynamicForm("alertEditQuestion",' + dataSet + ")"
      );
      $("#closeModalButton").attr(
        "onClick",
        "dynamicForm('cleanModalQuestions');$('#createQuestion').modal('hide');$('#saveModalButton').removeClass('d-none');$('#editModalButton').addClass('d-none');$('#closeModalButton').attr('onClick','')"
      );
      $("#saveModalButton").addClass("d-none");
      break;

    case "alertEditQuestion":
      Swal.fire({
        title: "¿Estas seguro?",
        text: "Los cambios que realice remplazaran la informacion de la pregunta anteriormente guardada",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Si Editar!",
      }).then((result) => {
        if (result.isConfirmed) {
          dynamicForm("editQuestion", dataSet);
        }
      });
      break;
    case "editQuestion":
      if (dynamicForm("validarModalQuestion")) {
        //Seleccionamos el elemento del objeto y verificamos si el contenido de los inputs es diferente al ya guardado
        //si es diferente lo actualiza sino le reasigna el valor anterior
        Questions[dataSet].indicativo =
          $("#inputIndicativo").val() != Questions[dataSet].indicativo
            ? $("#inputIndicativo").val()
            : Questions[dataSet].indicativo;
        Questions[dataSet].contexto =
          $("#inputContexto").val() != Questions[dataSet].contexto
            ? $("#inputContexto").val()
            : Questions[dataSet].contexto;
        Questions[dataSet].enunciado =
          $("#inputEnunciado").val() != Questions[dataSet].enunciado
            ? $("#inputEnunciado").val()
            : Questions[dataSet].enunciado;
        Questions[dataSet].typeQuestion =
          $("#typeQuestionHid").val() != Questions[dataSet].typeQuestion
            ? $("#typeQuestionHid").val()
            : Questions[dataSet].typeQuestion;
        Questions[dataSet].typeAnswer =
          $("#typeAnswerHid").val() != Questions[dataSet].typeQuestion
            ? $("#typeAnswerHid").val()
            : Questions[dataSet].typeQuestion;
        if (Questions[dataSet].imageContex == "") {
          Questions[dataSet].imageContex =
            $("#fileImg")[0].files.length > 0 ? $("#fileImg")[0].files[0] : "";
        } else {
          Questions[dataSet].imageContex =
            $("#fileImg")[0].files.length > 0
              ? $("#fileImg")[0].files[0]
              : Questions[dataSet].imageContex;
        }
        answerArray = [];
        if (typeAnswer == "unica" || typeAnswer == "multiple") {
          $("#ids_answer")
            .val()
            .split(",")
            .forEach((element) => {
              isCorrect =
                typeAnswer == "unica"
                  ? $("#ansInputRadio_" + element).prop("checked")
                  : $("#ansInputCheck_" + element).prop("checked");
              let answer = {
                correct: isCorrect,
                contenido: $("#ansInputText_" + element).val(),
              };
              answerArray.push(answer);
            });
        }
        Questions[dataSet].answers = answerArray.length > 0 ? answerArray : "";
        Swal.fire("Eliminada!", "La pregunta ha sido Editada.", "success");
        dynamicForm("updateQuestionHtml", dataSet);
      }
      break;
    case "updateQuestionHtml":
      container = $("#question_" + dataSet);
      container.empty(); // Vaciamos todo el contenido del Div
      answerHtml = "";
      if (!(typeAnswer == "abierta")) {
        Questions[dataSet].answers.forEach((key) => {
          if (typeAnswer == "unica") {
            answerHtml += `
              <div class="form-check d-flex align-items-center form-check-radio">
              <label class="form-check-label pl-5 text-dark">
                <input class="form-check-input" type="radio" name="ansInputRadioQuestion_${dataSet}" id="ansInputRadioQuestion_${dataSet}" >
                    ${key.contenido}
                <span class="circle">
                  <span class="check"></span>
                </span>
                </label>
                ${
                  key.correct
                    ? `<span class="material-icons ml-3 text-success">check_circle</span>`
                    : ""
                }
              </div>`;
          } else if (typeAnswer == "multiple") {
            answerHtml += `
              <div class="form-check d-flex align-items-center">
                <label class="form-check-label pl-5 text-dark">
                  <input class="form-check-input"  type="checkbox" value="">
                  ${key.contenido}
                  <span class="form-check-sign">
                    <span class="check"></span>
                  </span>
                </label>
                ${
                  key.correct
                    ? `<span class="material-icons ml-3 text-success">check_circle</span>`
                    : ""
                }
              </div>`;
          }
        });
      } else {
        answerHtml = `<div class="form-group">
          <textarea class="form-control" id="exampleFormControlTextarea1" placeholder="Escribe tu respuesta aqui..." rows="3" style="border: solid 1px #212529;border-radius: 6px;padding: 15px;"></textarea>
        </div>`;
      }
      texto = `   <div class="card-header" role="tab" id="headingOne">
                      <a data-toggle="collapse" data-parent="#questionContainer" href="#collapseOne_${dataSet}" aria-expanded="true" aria-controls="collapseOne_${dataSet}">
                        Pregunta:

                        <i class="material-icons">keyboard_arrow_down</i>
                      </a>
                    </div>

                    <div id="collapseOne_${dataSet}" class="collapse show" role="tabpanel" aria-labelledby="headingOne">
                      <div class="card-body row ">
                        <div class="col-md-10 p-3">
                        <p>${Questions[dataSet].indicativo}</p>
                        <p>${Questions[dataSet].contexto}</p>
                        <p>${Questions[dataSet].enunciado} </p>
                        <img src="${
                          !Questions[dataSet].imageContex == ""
                            ? Questions[dataSet].imageContex.result
                            : ""
                        }" class="img-responsive ${
        Questions[dataSet].imageContex == "" ? "d-none" : ""
      }"style="max-width: 55%;" alt="...">
                        <div class="col-md-12 d-flex mt-2 flex-column">
                        
                          ${answerHtml}
                        </div>
                        </div>
                        <div class="col-md-2 d-flex flex-md-column p-2 p-md-0 flex-row justify-content-center">
                        <a href="#pablo" class="btn btn-info btn-just-icon btn-fill btn-round" data-toggle="tooltip" data-placement="right" title="Añadir Variacion.">
                            <i class="material-icons">subject</i>
                        </a>
                        <button type="button" onclick="dynamicForm('fillModalQuestion',${dataSet})" class="btn btn-success btn-just-icon btn-fill btn-round btn-wd" data-toggle="tooltip" data-placement="right" title="Editar.">
                            <i class="material-icons">mode_edit</i>
                        </button>
                        <button type="button" onclick="dynamicForm('alertDeleteQuestion',${dataSet})" class="btn btn-danger btn-just-icon btn-fill btn-round" data-toggle="tooltip" data-placement="right" title="Eliminar.">
                            <i class="material-icons">delete</i>
                        </button>
                        </div>
                        
                      </div>
                    </div>`;
      container.html(texto);
      dynamicForm("cleanModalQuestions");
      $("#createQuestion").modal("hide");

      break;
    case "sendForm":
      $("#dataQuestions").val(JSON.stringify(Questions));
      $("#formExam").submit();
    case "cleanModalQuestions":
      $("#createAnswers").hide("fast");
      $("#emptyQuestions").hide("fast");
      $("#contextQuestion").hide("fast");
      dynamicForm("vaciarInputs", "formQuestion");
      dynamicForm("vaciarInputs", "tbodyAnswers");
      dynamicForm("deleteAllAnswers");

      break;
    case "fillToVariacion": // Llenar modal para editar
      dynamicForm("fillModalQuestion", dataSet);
      //Modificamos los botones para hacer la edicion

      $("#variacionModalButton").removeClass("d-none");
      $("#variacionModalButton").attr(
        "onClick",
        'dynamicForm("createVarQuestion",' + dataSet + ")"
      );
      $("#closeModalButton").attr(
        "onClick",
        "dynamicForm('cleanModalQuestions');$('#createQuestion').modal('hide');$('#saveModalButton').removeClass('d-none');$('#variacionModalButton').addClass('d-none');$('#closeModalButton').attr('onClick','')"
      );
      $("#saveModalButton").addClass("d-none");
      break;

    case "createVarQuestion":
      if (dynamicForm("validarModalQuestion")) {
        
        if (typeAnswer == "unica" || typeAnswer == "multiple") {
          $("#ids_answer")
            .val()
            .split(",")
            .forEach((element) => {
              isCorrect =
                typeAnswer == "unica"
                  ? $("#ansInputRadio_" + element).prop("checked")
                  : $("#ansInputCheck_" + element).prop("checked");
              let answer = {
                correct: isCorrect,
                contenido: $("#ansInputText_" + element).val(),
              };
              answerArray.push(answer);
            });
        }
        variationObject = {
          temporalId: long,
          typeQuestion: $("#typeQuestionHid").val(),
          typeAnswer: $("#typeAnswerHid").val(),
          indicativo: $("#inputIndicativo").val(),
          contexto: $("#inputContexto").val(),
          enunciado: $("#inputEnunciado").val(),
          imageContex:
            $("#fileImg")[0].files.length > 0 ? $("#fileImg")[0].files[0] : "",
          answers: answerArray.length > 0 ? answerArray : "",
        };
        Questions[dataSet].variations.push(variationObject);  
        $("#variations_"+dataSet).remove()
        dynamicForm("fillVariationshtml",dataSet)
      }
      break;
    case "fillVariationshtml":
      items_carrousel = "";
      indicators_carrousel = "";

      Questions[dataSet].variations.forEach((element,keyVar) => {
        answerHtml = "";
      if (!(typeAnswer == "abierta")) {
        Questions[dataSet].variations[keyVar].answers.forEach((key) => {
          if (typeAnswer == "unica") {
            answerHtml += `
              <div class="form-check d-flex align-items-center form-check-radio">
              <label class="form-check-label pl-5 text-dark">
                <input class="form-check-input" type="radio" name="ansInputRadioQuestion_${keyVar}" id="ansInputRadioQuestion_${keyVar}" >
                    ${key.contenido}
                <span class="circle">
                  <span class="check"></span>
                </span>
                </label>
                ${
                  key.correct
                    ? `<span class="material-icons ml-3 text-success">check_circle</span>`
                    : ""
                }
              </div>`;
          } else if (typeAnswer == "multiple") {
            answerHtml += `
              <div class="form-check d-flex align-items-center">
                <label class="form-check-label pl-5 text-dark">
                  <input class="form-check-input"  type="checkbox" value="">
                  ${key.contenido}
                  <span class="form-check-sign">
                    <span class="check"></span>
                  </span>
                </label>
                ${
                  key.correct
                    ? `<span class="material-icons ml-3 text-success">check_circle</span>`
                    : ""
                }
              </div>`;
          }
        });
      } else {
        answerHtml = `<div class="form-group">
          <textarea class="form-control" id="exampleFormControlTextarea1" placeholder="Escribe tu respuesta aqui..." rows="3" style="border: solid 1px #212529;border-radius: 6px;padding: 15px;"></textarea>
        </div>`;
      }
      debugger
        items_carrousel += `
              <div class="carousel-item ${(keyVar)==0?'active':''}">
                <div class="col-md-10 p-3">
                <p>${Questions[dataSet].variations[keyVar].indicativo}</p>
                <p>${Questions[dataSet].variations[keyVar].contexto}</p>
                <p>${Questions[dataSet].variations[keyVar].enunciado} </p>
                <img src="${
                  !Questions[dataSet].variations[keyVar].imageContex == ""
                    ? Questions[dataSet].variations[keyVar].imageContex.result
                    : ""
                }" class="img-responsive ${
                    Questions[dataSet].variations[keyVar].imageContex == "" ? "d-none" : ""
                  }"style="max-width: 55%;" alt="...">
                        <div class="col-md-12 d-flex mt-2 flex-column">
                        
                  ${answerHtml}
                </div>
                </div>
                <div class="col-md-2 d-flex flex-md-column p-2 p-md-0 flex-row justify-content-center">
                <button type="button" onclick="dynamicForm('alertDeleteQuestionVariable',${dataSet+"|"+keyVar})" class="btn btn-danger btn-just-icon btn-fill btn-round" data-toggle="tooltip" data-placement="right" title="Eliminar.">
                    <i class="material-icons">delete</i>
                </button>
                </div>
                
              </div>
           
              `;
              indicators_carrousel += `<li data-target="#carouselQuestion_${dataSet}_indicators" data-slide-to="${keyVar}" class="${(keyVar)==0?'active':''}active"></li>`
      });
      texto = `
      <div class="col-md-12" id="variations_${dataSet}">
        <hr>
        <h3>Variaciones generadas</h3>
        <div id="carouselExampleIndicators" class="carousel slide col-md-12" data-ride="carousel">
          <ol class="carousel-indicators" style="filter:brightness(0) ;">
             ${indicators_carrousel}
          </ol>
          <div class="carousel-inner">
             ${items_carrousel}
          </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" style="filter:brightness(0) ;" aria-hidden="true"></span>
              <span class="sr-only">Anterior</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
              <span class="carousel-control-next-icon" style="filter:brightness(0) ;" aria-hidden="true"></span>
              <span class="sr-only">Siguiente</span>
            </a>
      </div>
    </div>
          `;
          $("#collapseOne_"+dataSet).append(texto)
          dynamicForm("cleanModalQuestions");
          $("#createQuestion").modal("hide");
      break;
    default:
      break;
  }
}

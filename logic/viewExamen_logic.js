function openExam(object) {
  console.log(object);
  containerModal = $("#mbody");
  questions = [];
  QuestionsHTML = "";
  $.ajax("../Controller/examenController.php", {
    type: "POST", // http method
    data: {
      exam_id: object.idExamen,
      opcion: "view",
    }, // data to submit
    success: function (data) {
      //creamos el objeto
      questions = JSON.parse(data);

      questions.forEach((question, keyQuestion) => {
        answerHtml = "";
        if (!(questions[keyQuestion].typeQuestion == "abierta")) {
          questions[keyQuestion].answers.forEach((key) => {
            if (questions[keyQuestion].typeAnswer == "unica") {
              answerHtml += `
              <div class="form-check d-flex align-items-center form-check-radio">
              <label class="form-check-label pl-5 text-dark">
                <input class="form-check-input" type="radio" name="ansInputRadioQuestion_${keyQuestion}" id="ansInputRadioQuestion_${keyQuestion}" >
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
            } else if (questions[keyQuestion].typeAnswer == "multiple") {
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
        QuestionsHTML += `   <div class="card-header" role="tab" id="headingOne">
                      <a data-toggle="collapse" data-parent="#questionContainer" href="#collapseOne_${keyQuestion}" aria-expanded="true" aria-controls="collapseOne_${keyQuestion}">
                        Pregunta # ${keyQuestion+1}:

                        <i class="material-icons">keyboard_arrow_down</i>
                      </a>
                    </div>

                    <div id="collapseOne_${keyQuestion}" class="collapse" role="tabpanel" aria-labelledby="headingOne">
                      <div class="card-body row ">
                        <div class="col-md-12 p-3">
                        <p>${questions[keyQuestion].indicativo}</p>
                        <p>${questions[keyQuestion].contexto}</p>
                        <p>${questions[keyQuestion].enunciado} </p>
                        <img src="${
                          !questions[keyQuestion].imageContex == ""
                            ? questions[keyQuestion].imageContex.result
                            : ""
                        }" class="img-responsive ${
          questions[keyQuestion].imageContex == "" ? "d-none" : ""
        }"style="max-width: 75%;" alt="...">
                        <div class="col-md-12 d-flex mt-2 flex-column">
                        
                          ${answerHtml}
                        </div>
                        </div>
                      </div>
                    </div>`;
      });
      console.log(QuestionsHTML);
      texto = `
<h3>Examen de tipo : <b>${object.tipoExamen}</b> </h3>
<div class="col-md-12">
<table class="table table-responsive table-striped table-hover">
                    <tbody>
                        <tr>
                            <td><h5 class="m-0"><b>Facultad: </b></h5></td>
                            <td><h5 class="m-0">${object.facultad}</h5></td>
                        </tr>
                        <tr>
                            <td><h5 class="m-0"><b>Materia: </b></h5></td>
                            <td><h5 class="m-0">${object.materia}</h5></td>
                        </tr>
                        <tr>
                            <td><h5 class="m-0"><b>Corte: </b></h5></td>
                            <td><h5 class="m-0">${object.corte}</h5></td>
                        </tr>
                        <tr>
                            <td><h5 class="m-0"><b>Descripcion: </b></h5></td>
                            <td><h5 style="width: 500px; word-wrap: break-word;" class="m-0">${object.descripcion}</h5></td>
                        </tr>


                    </tbody>
                </table>
    <hr>
</div>
<h4>Preguntas: </h4>
<div class="col-md-12">
${QuestionsHTML}
</div>
`;
      containerModal.html(texto);
      $("#vieExam").modal("show");
    },
    error: function (jqXhr, textStatus, errorMessage) {
      $("p").append("Error" + errorMessage);
    },
  });
}

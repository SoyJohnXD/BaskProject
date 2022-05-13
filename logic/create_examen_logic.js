function dynamicForm(option, dataSet) {
 
  switch (option) {
    case "selectExam":
      $("#examOptions").hide("slow");
      $("#formExam").show("slow");
      maxQuestions = "";
      titleForm ="";
      switch (dataSet) {
        case "Q":
          maxQuestions = 10;
          titleForm = "Examen de tipo <b> Quiz </b>";
          break;
        case "P":
          maxQuestions = 15;
          titleForm="Examen de tipo <b>Parcial </b>"
          break;
        case "F":
          maxQuestions = 25;
          titleForm="<b> Examen final </b>"
          break;
      }
      
      $("#maxQuestions").text(maxQuestions);
      $("#typeExam").val(dataSet);
      $("#titleForm").html(titleForm);
      break;
      case "backToSelect":
        $("#examOptions").show("slow");
        $("#formExam").hide("slow");
      break;

    default:
      break;
  }
}

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
            <h2 class="text-dark mb-5">Mis Examenes creados</h2>
          </div>
          <div class="col-md-12">
            <table id="example" class="table table-responsive table-striped" style="width:100%">
              <thead>
                <tr>
                  <th class="text-center">#</th>
                  <th class="text-center">Materia- facultad</th>
                  <th class="text-center">Num Corte</th>
                  <th class="text-center">Tipo</th>
                  <th class="text-center">Descripcion</th>
                  <th class="text-center">Fecha de creacion</th>
                  <th class="text-center">Acciones</th>
                </tr>
              </thead>
              <tbody>
                <?php
                require_once "../Model/Examen_model.php";
                $examenModel = new Examen_model();
                $listaExamenes = $examenModel->list_Examen_profesor(1);
                foreach ($listaExamenes as $examen) {
                  $corte = "";
                  if ($examen['corte'] == 1) {
                    $corte = "Primer Corte";
                  } else if ($examen['corte'] == 2) {
                    $corte = "Segundo Corte";
                  } else if ($examen['corte'] == 3) {
                    $corte = "Tercer Corte";
                  }
                  $tipo = "";
                  if ($examen['tipo'] == "Q") {
                    $tipo = "Quiz";
                  } else if ($examen['tipo'] == "P") {
                    $tipo = "Parcial";
                  } else if ($examen['tipo'] == "F") {
                    $tipo = "Final";
                  }

                 
                 //FORMACION OBJ DEL EXAMEN CON PREGUNTAS COMPLETO
                $ExamenObject = array(
                  "idExamen" => $examen['id'],
                  "fk_materia" => $examen['fk_materia'],
                  "materia" => $examen['materia'],
                  "facultad" => $examen['facultad'],
                    "fk_profesor" => $examen['fk_profesor'],
                    "tipoExamen" => $tipo,
                    "corte" => $corte,
                    "descripcion" => $examen['descripcion'],
                  );
                ?>

                  <tr>
                    <td class="text-center"><?= $examen['id'] ?></td>
                    <td><?= $examen['materia'] ?> - <?= $examen['facultad'] ?></td>
                    <td><?= $corte ?></td>
                    <td><?= $tipo ?></td>
                    <td style="max-width: 360px; word-wrap: break-word;"><?= $examen['descripcion'] ?></td>
                    <td><?= $examen['fecha_creacion'] ?></td>
                    <td class="td-actions text-right">
                      <button type="button" rel="tooltip" onclick='openExam(<?=json_encode($ExamenObject)?>)' class="btn btn-primary">
                        <i class="material-icons">search</i>
                      </button>

                      <button type="button" rel="tooltip" class="btn btn-danger">
                        <i class="material-icons">close</i>
                      </button>
                    </td>
                  </tr>
                <?php } ?>

              </tbody>
            </table>
          </div>


        </div>
      </div>
    </div>
  </div>

  <!-- MODALES -->
  <!-- MODALES Pregunta -->
  <?php include FOLDER_MODALS . "modalViewExam.php"; ?>


  <!-- Requerimos los scripts -->
  <?php include FOLDER_TEMPLATE . "scripts.php"; ?>
  <script src="../logic/viewExamen_logic.js"></script>
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
  <script>
    $(document).ready(function() {
      $('#example').DataTable({
        "language": {
          "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
        },
        "aLengthMenu": [
          [5, 10, 25, -1],
          [5, 10, 25, "Todos"]
        ],
        "iDisplayLength": 5,
        "order": [
          [5, "desc"]
        ]
      });
    });
  </script>
  <?php include FOLDER_TEMPLATE . "Alertas.php"; ?>

</body>

</html>
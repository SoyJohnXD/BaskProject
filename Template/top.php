<nav class="navbar navbar-color-on-scroll navbar-transparent fixed-top navbar-expand-lg bg-primary" color-on-scroll="100">
  <div class="container">
    <div class="navbar-translate">
      <a class="navbar-brand" href="index.php">
        B-ASK Project </a>

      <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="sr-only">Toggle navigation</span>
        <span class="navbar-toggler-icon"></span>
        <span class="navbar-toggler-icon"></span>
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>

    <div class="collapse navbar-collapse">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="material-icons">quiz</i> Banco de preguntas
          </a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="material-icons">travel_explore</i> Banco de examenes
          </a>
        </li>
        <li class="dropdown nav-item ">
          <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false">
            <i class="material-icons">badge</i> Mis Examenes
            <div class="ripple-container"></div>
          </a>
          <div class="dropdown-menu dropdown-with-icons ">
            <a href="mis_examenes_view.php" class="dropdown-item">
              <i class="material-icons">view_list</i> ver mis examenes
            </a>
            <a href="create_examen_view.php" class="dropdown-item">
              <i class="material-icons">playlist_add</i> Crear un examen
            </a>
          </div>
        </li>
        <li class="dropdown nav-item ">
          <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false">
            <i class="material-icons">face</i> Perfil
            <div class="ripple-container"></div>
          </a>
          <div class="dropdown-menu dropdown-with-icons ">
            <a href="../login.php" class="dropdown-item">
              <i class="material-icons">logout</i> Cerrar Secion
            </a>
            <a href="" class="dropdown-item">
              <i class="material-icons">info</i> Informacion Personal
            </a>
            <a href="contacto.php" class="dropdown-item">
              <i class="material-icons">help</i> Ayuda
            </a>
          </div>
        </li>
      </ul>
    </div>
  </div>
</nav>
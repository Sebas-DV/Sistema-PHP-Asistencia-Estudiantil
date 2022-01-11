<nav class="navbar navbar-icon-top navbar-expand-lg navbar-dark bg-dark">
    <img class="logo-container" src="../img/logo.png" alt="">
  <a class="navbar-brand" href="#">
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">
          <i class="fa fa-home"></i>
          Inicio
          </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="Estudiantes.php">
          <i class="fa fa-user">
          </i>
          Estudiantes
        </a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="Reportes.php" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fa fa-user">
          </i>
          Docentes
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="Docentes.php">Docentes</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="Cursos.php">Cursos</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="Asignaturas.php">Asignaturas</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="Reportes.php">
          <i class="fa fa-book">
          </i>
          Reporteria
        </a>
      </li>
    </ul>
      <button type="button" class="btn btn-outline-secondary my-2 my-sm-0">Usuario: <?php echo $_SESSION['usuario']; ?></button>
      <button  class="btn btn-outline-danger my-2 my-sm-0 btn-salir"  onclick="window.location.href='../clases/salir.php'" >Salir</button>
  </div>
</nav>

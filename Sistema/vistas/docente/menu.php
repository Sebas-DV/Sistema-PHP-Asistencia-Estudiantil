<nav class="navbar navbar-icon-top navbar-expand-lg navbar-dark bg-dark">
    <img class="logo-container" src="../../img/logo.png" alt="">
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
          Home
          </a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="Reportes.php" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fa fa-book">
          </i>
          Cursos
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="Asistencia.php"><i class="fa fa-sticky-note"></i> Asistencia</a>
          <a class="dropdown-item" href="Reporteria.php"><i class="fa fa-book"></i> Reporteria</a>
        </div>
      </li>
    </ul>

      <button type="button" class="btn btn-outline-secondary my-2 my-sm-0">Docente: <?php echo $_SESSION['usuario']; ?></button>
      <button  class="btn btn-outline-danger my-2 my-sm-0 btn-salir"  onclick="window.location.href='../../clases/salir.php'" >Salir</button>
  </div>
</nav>

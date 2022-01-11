<?php
  session_start();

  require_once '../../clases/conexion.php';
  require_once 'librerias.php';

  if(isset($_SESSION['usuario']))
  {
    require_once '../../procesos/Docente/asistencia.php';
    require_once 'menu.php';

    $curso = $_SESSION['id_curso'];
?>
<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <div class="container">
      <div class="titulo">
        <hr>
        <h1>Sistema de Asistencia Docente</h1>
        <hr>
      </div>

      <div class="titulo" id="title">
        <hr>
          <h5>Tabla de Registros</h5>
        <hr>
      </div>
      <div class="msg">
        <hr>
        <p><?php echo isset($msg) ? $msg : ''; ?></p>
        <hr>
      </div>
      <div class="row">
        <div class="col-md-4">
        </div>
      </div>
        <br>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Nombre Estudiante</th>
              <th scope="col">Curso</th>
              <th scope="col">Asistencia</th>
              <th scope="col">Acciones</th>
            </tr>
          </thead>
          <tbody>
            <?php
              $sql = mysqli_query($conexionBD, "SELECT u.iduser,u.nombre_completo ,c.curso
                                                FROM usuarios u
                                                INNER JOIN cursos c ON u.idcurso = c.idcurso
                                                WHERE u.idcurso = '$curso' AND u.rango = 3");

              $result = mysqli_num_rows($sql);

              if($result >= 0)
              {
                while ($data = mysqli_fetch_array($sql))
                {
              ?>
                <tr>
                  <th scope="row"><?php echo $data[0]; ?></th>
                  <td><?php echo $data[1]; ?></td>
                  <td><?php echo $data[2]; ?></td>
                  <form class="" action="" method="POST">
                    <td>
                      <div class="form-group">
                        <input type="text" name="id_user" hidden="" value="<?php echo $data[0]; ?>">
                        <select name="reg_asistencia" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                          <option selected>Registro de Asistencia</option>
                          <option value="Falta">Falta</option>
                          <option value="Falta Justificada">Falta Justificada</option>
                          <option value="Atraso">Atraso</option>
                        </select>
                      </div>
                    </td>
                    <td>
                      <button type="submit" class="btn btn-outline-success"><i class="fa fa-save"></i> Success</button>
                    </td>
                  </form>
                </tr>
              <?php
                }
              }
              ?>
          </tbody>
        </table>
      </div>
    </div>
  </body>
</html>
<?php
  }
  else
  {
    header('Location: ../index.php');
  }
?>

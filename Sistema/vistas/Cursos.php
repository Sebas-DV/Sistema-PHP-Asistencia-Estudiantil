<?php
  session_start();
  require_once 'includes.php';

  if(isset($_SESSION['usuario']))
  {
    require_once '../procesos/Cursos/cursos.php';
    require_once 'menu.php';
?>
<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Estudiantes</title>
  </head>
  <body>
    <div class="container">
      <div class="titulo" id="title">
        <hr>
          <h1>Sistema de Asistencia Docente</h1>
        <hr>
      </div>
      <div class="row">
          <div class="col-md-4">
            <div class="titulo" id="title">
              <hr>
                <h5>Registro Cursos</h5>
              <hr>
            </div>
            <div class="msg">
              <p id="msg"><?php echo isset($msg) ? $msg : ''; ?></p>
              <hr>
            </div>
            <form action="" method="POST">
              <div class="form-group">
                <label for="exampleInputEmail1">Curso</label>
                <input type="text" class="form-control" name="curso"id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nombre y Paralelo del Curso">
              </div>
              <button type="submit" class="btn btn-outline-primary">Registrar</button>
            </form>
          </div>
          <div class="col-md-8">
            <div class="titulo" id="title">
              <hr>
                <h5>Tabla de Registros</h5>
              <hr>
            </div>
            <div class="tabla-estudiantes">
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Curso</th>
                    <th scope="col">Editar</th>
                    <th scope="col">Elimnar</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $sql = mysqli_query($conexionBD, "SELECT * FROM cursos");

                    $result = mysqli_num_rows($sql);

                    if($result > 0)
                    {
                      while ($data = mysqli_fetch_array($sql))
                      {
                        $inpts = $data[0]."||".$data[1];
                    ?>
                      <tr>
                        <th scope="row"><?php echo $data[0]; ?></th>
                        <td><?php echo $data[1]; ?></td>
                        <td><button type="button"class="btn btn-outline-primary" data-toggle="modal" data-target="#edit" onclick="modalD('<?php echo $inpts; ?>')"><i class="fa fa-edit" ></i> Editar</button></td>
                        <td><button type="button" class="btn btn-outline-danger" onclick="eliminarAlertaCurso('<?php echo $data[0]; ?>')"><i class="fa fa-trash"></i> Eliminar</button></td>
                      </tr>
                    <?php
                      }
                    }
                    ?>
                </tbody>
              </table>
            </div>
          </div>
      </div>

      <div class="modal fade" id="edit" role="dialog">
          <div class="modal-dialog">
              <div class="modal-content">
                  <!-- Modal Header -->
                  <div class="modal-header">

                    <h4 class="modal-title" id="myModalLabel">Actualizacion de Datos</h4>
                      <button type="button" class="close" data-dismiss="modal">
                          <span aria-hidden="true">×</span>
                          <span class="sr-only">Close</span>
                      </button>
                  </div>

                  <!-- Modal Body -->
                  <div class="modal-body">
                      <p class="statusMsg"></p>
                      <form role="form">
                          <div class="form-group">
                            <input type="text" name="" hidden="" id="id" value="">
                              <label for="inputName">Curso</label>
                              <input type="text" id="name" class="form-control" placeholder="Nombre y Paralelo del Curso"/>
                          </div>
                      </form>
                  </div>

                  <div class="modal-footer">
                      <button type="button" class="btn btn-outline-dark" data-dismiss="modal"><i class="fa fa-close" ></i> Cerrar</button>
                      <button type="button" data-dismiss="modal" class="btn btn-outline-primary" id="btn-actualizar" onclick=""><i class="fa fa-save" ></i> Guardar</button>
                  </div>
              </div>
          </div>
      </div>

    </div>
  </body>
</html>

<script type="text/javascript">
  $(document).ready(function(){
    $('#btn-actualizar').click(function(){
      actualizarCurso();
    });
  });
</script>
<?php
  }
  else
  {
    header('Location: ../index.php');
  }
?>

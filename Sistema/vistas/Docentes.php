<?php
  session_start();
  require_once 'includes.php';

  if(isset($_SESSION['usuario']))
  {
    require_once '../procesos/Docente/docente.php';
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
                <h5>Registro Docentes</h5>
              <hr>
            </div>
            <div class="msg">
              <p id="msg"><?php echo isset($msg) ? $msg : ''; ?></p>
              <hr>
            </div>
            <form action="" method="POST">
              <div class="form-group">
                <label for="exampleInputEmail1">Nombre Completo</label>
                <input type="text" class="form-control" name="nombre" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nombre Completo">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">#Cedula</label>
                <input type="text" class="form-control" name="cedula" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Numero de Cedula">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Usuario</label>
                <input type="text" class="form-control" name="user" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Usuario">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Contraseña</label>
                <input type="text" class="form-control" name="pass" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Contraseña">
                <input type="text" class="form-control" name="idRango" hidden="" value="2" id="exampleInputEmail1" aria-describedby="emailHelp">
              </div>
              <div class="form-group">
                <label class="mr-sm-2" for="inlineFormCustomSelect">Curso</label>
                <?php
                  $query = mysqli_query($conexionBD, "SELECT * FROM cursos");
                ?>
                <select name="idCurso" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                  <option selected>Seleccionar Curso</option>
                  <?php
                    if(mysqli_num_rows($query) >= 0)
                    {
                      while($asig = mysqli_fetch_array($query))
                      {
                  ?>
                    <option value="<?php echo $asig[0]; ?>"><?php echo $asig[1]; ?></option>
                  <?php
                      }
                    }
                  ?>
                </select>
              </div>
              <div class="form-group">
                <label class="mr-sm-2" for="inlineFormCustomSelect">Asignatura</label>
                <?php
                  $query = mysqli_query($conexionBD, "SELECT * FROM asignaturas");
                ?>
                <select name="idAsig" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                  <option selected>Seleccionar Asignatura</option>
                  <?php
                    if(mysqli_num_rows($query) >= 0)
                    {
                      while($asig = mysqli_fetch_array($query))
                      {
                  ?>
                    <option value="<?php echo $asig[0]; ?>"><?php echo $asig[1]; ?></option>
                  <?php
                      }
                    }
                  ?>
                </select>
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
                    <th scope="col">Nombre</th>
                    <th scope="col">Curso</th>
                    <th scope="col">Asignatura</th>
                    <th scope="col">Editar</th>
                    <th scope="col">Elimnar</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $sql = mysqli_query($conexionBD, "SELECT u.iduser, u.nombre_completo,u.username, u.password, u.c_i, c.curso, a.nombreasig
                                                      FROM usuarios u
                                                      INNER JOIN cursos c ON u.idcurso = c.idcurso
                                                      INNER JOIN asignaturas a ON u.idasig = a.idasig
                                                      WHERE u.rango = 2");

                    $result = mysqli_num_rows($sql);

                    if($result >= 0)
                    {
                      while ($data = mysqli_fetch_array($sql))
                      {
                        $inpts = $data[0]."||".$data[1]."||".$data[4];

                    ?>
                      <tr>
                        <th scope="row"><?php echo $data[0]; ?></th>
                        <td><?php echo $data[1]; ?></td>
                        <td><?php echo $data[5]; ?></td>
                        <td><?php echo $data[6]; ?></td>
                        <td><button type="button"class="btn btn-outline-primary"onclick="modalDatosDocente('<?php echo $inpts; ?>')" data-toggle="modal" data-target="#edit"><i class="fa fa-edit" ></i> Editar</button></td>
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
                              <label for="inputName">Nombre Completo</label>
                              <input type="text" id="name" class="form-control" placeholder="Nombre Completo"/>
                          </div>
                          <div class="form-group">
                              <label for="inputEmail">#Cedula</label>
                              <input type="text" id="cedula" class="form-control" placeholder="Numero de Cedula"/>
                          </div>
                          <div class="form-group">
                            <label class="mr-sm-2" for="inlineFormCustomSelect">Curso</label>
                            <?php
                              $query = mysqli_query($conexionBD, "SELECT * FROM cursos");
                            ?>
                            <p class="camp">*Obligatorio</p>
                            <select id="idCurso" name="idCurso" class="custom-select mr-sm-2" required>
                              <option selected>Seleccionar Curso</option>
                              <?php
                                if(mysqli_num_rows($query) >= 0)
                                {
                                  while($asig = mysqli_fetch_array($query))
                                  {
                              ?>
                                <option value="<?php echo $asig[0]; ?>"><?php echo $asig[1]; ?></option>
                              <?php
                                  }
                                }
                              ?>
                            </select>
                          </div>

                          <div class="form-group">
                            <label class="mr-sm-2" for="inlineFormCustomSelect">Asignatura</label>
                            <?php
                              $query = mysqli_query($conexionBD, "SELECT * FROM asignaturas");
                            ?>
                            <p class="camp">*Obligatorio</p>
                            <select id="idasig" name="idCurso" class="custom-select mr-sm-2" required>
                              <option selected>Seleccionar Asignatura</option>
                              <?php
                                if(mysqli_num_rows($query) >= 0)
                                {
                                  while($asig = mysqli_fetch_array($query))
                                  {
                              ?>
                                <option value="<?php echo $asig[0]; ?>"><?php echo $asig[1]; ?></option>
                              <?php
                                  }
                                }
                              ?>
                            </select>
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
      actulizarCurso();
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

<?php
  require_once '../../clases/conexion.php';

  $id = $_POST['id'];
  $nombre = $_POST['name'];
  $cedula = $_POST['cedula'];
  $curso = $_POST['curso'];
  $asignatura = $_POST['asignatura'];

  $sql = "UPDATE usuarios SET nombre_completo='$nombre', c_i='$cedula', idcurso='$curso', idasig='$asignatura' WHERE iduser='$id'";
  $result = mysqli_query($conexionBD, $sql);

  echo $result;
?>

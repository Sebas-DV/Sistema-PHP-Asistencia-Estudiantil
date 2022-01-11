<?php
  require_once '../../clases/conexion.php';

  $id = $_POST['id'];
  $nombre = $_POST['name'];
  $cedula = $_POST['cedula'];
  $curso = $_POST['curso'];

  $sql = "UPDATE usuarios SET nombre_completo='$nombre', c_i='$cedula', idcurso='$curso' WHERE iduser='$id'";
  $result = mysqli_query($conexionBD, $sql);

  echo $result;
?>

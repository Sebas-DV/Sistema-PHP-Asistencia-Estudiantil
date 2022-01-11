<?php
    require_once '../../clases/conexion.php';

    $id = $_POST['id'];
    $curso = $_POST['curso'];

    $sql = "UPDATE cursos SET curso='$curso' WHERE idcurso='$id'";
    $result = mysqli_query($conexionBD, $sql);

    echo $result;
?>

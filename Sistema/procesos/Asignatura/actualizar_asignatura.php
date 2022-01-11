<?php
    require_once '../../clases/conexion.php';

    $id = $_POST['id'];
    $asignatura = $_POST['asignatura'];

    $sql = "UPDATE asignaturas SET nombreasig='$asignatura' WHERE idasig='$id'";
    $result = mysqli_query($conexionBD, $sql);

    echo $result;
?>

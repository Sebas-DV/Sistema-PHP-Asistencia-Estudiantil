<?php
  session_start();

  require_once '../../clases/conexion.php';
  require_once '../../procesos/Estudiante/reporteria.php';

  if(isset($_SESSION['usuario']))
  {
    $curso = $_SESSION['id_curso'];
    $id = $_SESSION['id'];

    while (ob_get_level())
    ob_end_clean();
    header("Content-Encoding: None", true);

    $query = "SELECT u.iduser, u.nombre_completo ,c.curso, u.asistencia
              FROM usuarios u
              INNER JOIN cursos c ON u.idcurso = c.idcurso
              WHERE u.iduser = '$id'";

    $resultado = mysqli_query($conexionBD, $query);


    $pdf = new PDF();
    $pdf->AliasNbPages();
    $pdf->AddPage();

    $pdf->SetFillColor(232,232,232);
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(10,6,'#',1,0,'C',1);
    $pdf->Cell(60,6,'NOMBRE ESTUDIANTE',1,0,'C',1);
    $pdf->Cell(40,6,'CURSO',1,0,'C',1);
    $pdf->Cell(40,6,'ASISTENCIA',1,0,'C',1);

    $pdf->SetFont('Arial', '', 10);

    while($row = $resultado->fetch_assoc())
    {
      $pdf->Ln();
      $pdf->Cell(10,6,$row['iduser'],1,0,'C',1);
      $pdf->Cell(60,6,$row['nombre_completo'], 1,0,'C',1);
      $pdf->Cell(40,6,$row['curso'], 1,0,'C',1);
      $pdf->Cell(40,6,$row['asistencia'], 1,0,'C',1);
    }
    $pdf->Output();

  }
  else
  {
    header('Location: ../index.php');
  }
?>

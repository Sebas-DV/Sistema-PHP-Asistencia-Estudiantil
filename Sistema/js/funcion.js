function modalDatos(dats)
{
  valores = dats.split('||');

  $('#id').val(valores[0]);
  $('#name').val(valores[1]);
  $('#cedula').val(valores[2]);
}

function modalD(dats) {
  valores = dats.split('||');

  $('#id').val(valores[0]);
  $('#name').val(valores[1]);
}
function actualizarEstudiante()
{
  id = $('#id').val();
  name = $('#name').val();
  cedula = $('#cedula').val();
  curso = $('#idCurso').val();

  cadena = "id=" + id + "&name=" + name + "&cedula=" + cedula + "&curso=" + curso;

  $.ajax({
    type:"POST",
    url:"../procesos/estudiante/actualizar_estudiante.php",
    data: cadena,
    success:function(r){
      if(r==1)
      {
        document.getElementById("msg").innerHTML = "Se actualizo con exito";
      }
      else {
        document.getElementById("msg").innerHTML = "Error no se actualizo :(.";
      }
    }
  });
}

function eliminarAlerta(id)
{
  alertify.confirm('Eliminar Datos', '¿ Desea eliminar ?',
  function(){
    eliminarEstudiante (id)
  }
  ,function(){
    document.getElementById("msg").innerHTML = "No se Elimino Nada.";
  });
}

function eliminarEstudiante (id)
{
  cadena = "id=" + id;

  $.ajax({
    type:"POST",
    url:"../procesos/estudiante/eliminar_estudiante.php",
    data: cadena,
    success:function(r){

      if(r==1)
      {
        document.getElementById("msg").innerHTML = "Se elimino exitosamente.";
      }
      else {
        document.getElementById("msg").innerHTML = "Error al eliminar :(.";
      }
    }
  });
}

function modalDatosDocente(dats)
{
  valores = dats.split('||');

  $('#id').val(valores[0]);
  $('#name').val(valores[1]);
  $('#cedula').val(valores[2]);
}

function actualizarDocente()
{
  id = $('#id').val();
  name = $('#name').val();
  cedula = $('#cedula').val();
  curso = $('#idCurso').val();
  asignatura = $('#idasig').val();

  cadena = "id=" + id + "&name=" + name + "&cedula=" + cedula + "&curso=" + curso + "&asignatura=" +asignatura;

  $.ajax({
    type:"POST",
    url:"../procesos/Docente/actualizar_docente.php",
    data: cadena,
    success:function(r){
      if(r==1)
      {
        document.getElementById("msg").innerHTML = "Se actualizo con exito";
      }
      else {
        document.getElementById("msg").innerHTML = "Error no se actualizo :(.";
      }
    }
  });
}

function actualizarCurso()
{
  id = $('#id').val();
  curso = $('#name').val();

  cadena = "id=" + id + "&curso=" + curso;

  $.ajax({
    type:"POST",
    url:"../procesos/Cursos/actualizar_cursos.php",
    data: cadena,
    success:function(r){
      if(r==1)
      {
        document.getElementById("msg").innerHTML = "Se actualizo con exito";
      }
      else {
        document.getElementById("msg").innerHTML = "Error no se actualizo :(.";
      }
    }
  });
}

function eliminarAlertaCurso(id)
{
  alertify.confirm('Eliminar Datos', '¿ Desea eliminar ?',
  function(){
    eliminarCurso(id)
  }
  ,function(){
    document.getElementById("msg").innerHTML = "No se Elimino Nada.";
  });
}

function eliminarCurso (id)
{
  cadena = "id=" + id;

  $.ajax({
    type:"POST",
    url:"../procesos/Cursos/eliminar_curso.php",
    data: cadena,
    success:function(r){

      if(r==1)
      {
        document.getElementById("msg").innerHTML = "Se elimino exitosamente.";
      }
      else {
        document.getElementById("msg").innerHTML = "Error al eliminar :(.";
      }
    }
  });
}

function actualizarAsig()
{
  id = $('#id').val();
  asignatura = $('#name').val();

  cadena = "id=" + id + "&asignatura=" + asignatura;

  $.ajax({
    type:"POST",
    url:"../procesos/Asignatura/actualizar_asignatura.php",
    data: cadena,
    success:function(r){
      if(r==1)
      {
        document.getElementById("msg").innerHTML = "Se actualizo con exito";
      }
      else {
        document.getElementById("msg").innerHTML = "Error no se actualizo :(.";
      }
    }
  });
}


function eliminarAlertaAsig(id)
{
  alertify.confirm('Eliminar Datos', '¿ Desea eliminar ?',
  function(){
    eliminarAsig(id)
  }
  ,function(){
    document.getElementById("msg").innerHTML = "No se Elimino Nada.";
  });
}

function eliminarAsig(id)
{
  cadena = "id=" + id;

  $.ajax({
    type:"POST",
    url:"../procesos/Asignatura/eliminar_asignatura.php",
    data: cadena,
    success:function(r){

      if(r==1)
      {
        document.getElementById("msg").innerHTML = "Se elimino exitosamente.";
      }
      else {
        document.getElementById("msg").innerHTML = "Error al eliminar :(.";
      }
    }
  });
}

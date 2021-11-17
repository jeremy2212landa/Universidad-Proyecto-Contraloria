<?php
$template = '<div align="center">
  <h1>Crear nuevo Curso</h1>
<form method="post">
  <input type="hidden" name="r" value="add_curso">
  <input type="hidden" name="op" value="set">
  *Nombre Curso:<input type="text" name="name_curso" value="" placeholder="Curso"><br>
  Descripcion Curso:<textarea name="curso_description" rows="8" cols="80" placeholder="Descripcion"></textarea><br>
  Contralor:<input type="text" name="contralor" value="" placeholder="Contralor"><br>
  Fecha:<input type="datetime" name="fechia" value="" placeholder="aaaa-mm-dd"><br>
  Horas Academicas:<input type="number" name="curso_hours" value="" placeholder="Horas Academicas"><br>
  <input type="submit" name="save" value="Guardar">
</form>
</div>';
if ($_POST['r'] == 'add_curso' && isset($_POST['op']) == 'set') {
  //$cambiarfecha = $_POST['fechia'];
  //var_dump($cambiarfecha);
  //var_dump($_POST['curso_description']);


  $curso_data = array(
    'curso_id' => 0,
    'curso_nombre' => $_POST['name_curso'],
    'curso_descripcion' => $_POST['curso_description'],
    'curso_contralor' => $_POST['contralor'],
    'curso_fecha' => $_POST['fechia'],
    'curso_horas' => $_POST['curso_hours']);

//var_dump ($curso_data);
  $curso1 = new CursosModel();
  $cursoadd = $curso1->create($curso_data);
  $l_id = $curso1->last_id;

  header('Location: ./?r=cursos&c=' .$l_id);
}
 printf($template);
?>

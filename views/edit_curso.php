<?php
$cursos = new CursosModel();
$cursos_read = $cursos->read($_POST['c']);

  $template = '<div align="center">
  <h1>'. $cursos_read[0]['curso_name'] .'</h1><br>
<form method="post">
  <input type="hidden" name="c" value="'. $_POST['c'] .'">
  <input type="hidden" name="r" value="edit_curso">
  <input type="hidden" name="op" value="update">
  *Nombre Curso:<input type="text" name="name_curso" value="'. $cursos_read[0]['curso_name'] .'"><br>
  Descripcion Curso:<textarea name="curso_description"  rows="8" cols="80">'. $cursos_read[0]['curso_description'] .'</textarea><br>
  Contralor:<input type="text" name="contralor" value="'. $cursos_read[0]['curso_contralor'] .'"><br>
  Fecha:<input type="datetime" name="fechia" value="'. $cursos_read[0]['curso_fecha'] .'"><br>
  <input type="submit" name="save" value="Guardar">
</form>
</div>';

if ($_POST['r'] == 'edit_curso' && $_POST['op'] == 'update') {

  $curso_data = array(
    'curso_id' => $_POST['c'],
    'curso_nombre' => $_POST['name_curso'],
    'curso_descripcion' => $_POST['curso_description'],
    'curso_contralor' => $_POST['contralor'],
    'curso_fecha' => $_POST['fechia']);

    $cursoedit = $cursos->update($curso_data);

  header('Location: ./?r=cursos&c=' .$_POST['c']);

}

  printf($template);
?>

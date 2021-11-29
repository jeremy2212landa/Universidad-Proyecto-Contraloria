<?php
$cursos = new CursosModel();
$cursos_read = $cursos->read($_POST['c']);

  $template = '<div align="center">
  <h1>'. $cursos_read[0]['curso_name'] .'</h1><br>
<form method="post">
  <input type="hidden" name="c" value="'. $_POST['c'] .'">
  <input type="hidden" name="r" value="edit_curso">
  <input type="hidden" name="op" value="update">
  *Nombre Curso:<input type="text" maxlength="80" name="name_curso" value="'. $cursos_read[0]['curso_name'] .'" required><br>
  Descripcion Curso:<textarea name="curso_description"  rows="8" cols="80" required>'. $cursos_read[0]['curso_description'] .'</textarea><br>
  Contralor:<input type="text" maxlength="30" name="contralor" value="'. $cursos_read[0]['curso_contralor'] .'" required><br>
  Fecha:<input type="date" maxlength="10" name="fechia" value="'. $cursos_read[0]['curso_fecha'] .'" required><br>
  Horas:<input type="text" maxlength="3" name="curso_hours" value="'. $cursos_read[0]['curso_horas'] .'" required><br>
  <input type="submit" name="save" value="Guardar">
</form>
</div>';

if ($_POST['r'] == 'edit_curso' && isset($_POST['op']) == 'update') {

  $curso_data = array(
    'curso_id' => $_POST['c'],
    'curso_nombre' => $_POST['name_curso'],
    'curso_descripcion' => $_POST['curso_description'],
    'curso_contralor' => $_POST['contralor'],
    'curso_fecha' => $_POST['fechia'],
    'curso_horas' => $_POST['curso_hours']
  );

    $cursoedit = $cursos->update($curso_data);

  header('Location: ./?r=cursos&c=' .$_POST['c']);

}

  printf($template);
?>

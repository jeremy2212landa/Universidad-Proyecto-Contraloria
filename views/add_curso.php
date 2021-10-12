<div align="center">
  <h1>Crear nuevo Curso</h1>
<form method="post">
  <input type="hidden" name="r" value="add_curso">
  <input type="hidden" name="op" value="set">
  *Nombre Curso:<input type="text" name="name_curso" value=""><br>
  Descripcion Curso:<textarea name="curso_description" rows="8" cols="80"></textarea><br>
  Contralor:<input type="text" name="contralor" value=""><br>
  Fecha:<input type="datetime" name="fechia" value=""><br>
  <input type="submit" name="save" value="Guardar">
</form>
</div>

<?php
if ($_POST['r'] == 'add_curso' && $_POST['op'] == 'set') {
  //$cambiarfecha = $_POST['fechia'];
  //var_dump($cambiarfecha);
  //var_dump($_POST['curso_description']);


  $curso_data = array(
    'curso_id' => 0,
    'curso_nombre' => $_POST['name_curso'],
    'curso_descripcion' => $_POST['curso_description'],
    'curso_contralor' => $_POST['contralor'],
    'curso_fecha' => $_POST['fechia']);

//var_dump ($curso_data);
  $curso1 = new CursosModel();
  $cursoadd = $curso1->create($curso_data);
  

  header('Location: ./?r=home');
}
?>

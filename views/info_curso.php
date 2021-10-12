<div align="center">
<?php

$cursos = new CursosModel();
$cp = new CP_Model();
$ci = new CI_Model();
$cursos_datos = $cursos->read($_POST['c']);
$cp_datos = $cp->read($_POST['c']);
$ci_datos = $ci->read($_POST['c']);

//var_dump ($ci_datos);
//var_dump ($cp_datos);
foreach ($cursos_datos as $key) {
  print('<h2>Curso</h2>
  <table class="bordez">
    <tr>
      <td>' . $key['curso_id'] . '</td>
      <td>' . $key['curso_name'] . '</td>
      <td>
        <form method="post">
          <input type="hidden" name="r" value="edit_curso">
          <input type="hidden" name="c" value="' . $key['curso_id'] . '">
          <input type="submit" name="envio" value="Editar">
        </form>
        <form method="post">
          <input type="hidden" name="r" value="delete_curso">
          <input type="hidden" name="c" value="' . $key['curso_id'] . '">
          <input type="submit" name="delete" value="Eliminar">
        </form>
      </td>
    </tr>
    <tr>
      <td colspan="3">' . $key['curso_description'] . '</td>
    </tr>
    <tr>
      <td colspan="2">' . $key['curso_contralor'] . '</td>
      <td>' . $key['curso_fecha'] . '</td>
    </tr>
  </table><br><br><br>');
}

$template = '<h2>Instructor</h2>
<table class="bordez">
  <tr>
    <td>Nombre</td>
    <td>Apellido</td>
    <td>Cedula</td>
    <td>Correo</td>
    <td>Instituto</td>
    <td>Cargo</td>
  </tr>';

  foreach ($ci_datos as $key) {
    $template .= '
    <tr>
      <td>'. $key['nombre'] .'</td>
      <td>'. $key['apellido'] .'</td>
      <td>'. $key['cedula'] .'</td>
      <td>'. $key['correo'] .'</td>
      <td>'. $key['instituto'] .'</td>
      <td>'. $key['cargo'] .'</td>
    </tr>';
  }

  $template .= '
</table>
<form method="post">
  <input type="submit" name=edit_instructor value="Editar">
</form>';

$template .= '<br><br><br>
<h2>Participantes</h2>
<table class="bordez">
  <tr>
    <td>Nombre</td>
    <td>Apellido</td>
    <td>Cedula</td>
    <td>Correo</td>
    <td>Direccion</td>
    <td colspan="2">opciones</td>
  </tr>';

  foreach ($cp_datos as $key) {
    $template .= '
    <tr>
      <td>'. $key['nombre'] .'</td>
      <td>'. $key['apellido'] .'</td>
      <td>'. $key['cedula'] .'</td>
      <td>'. $key['correo'] .'</td>
      <td>'. $key['direccion'] .'</td>
      <td>
      <form method="post">
        <input type="submit" name=edit_instructor value="Editar">
      </form>
      </td>
      <td>
      <form method="post">
        <input type="submit" name=edit_instructor value="Eliminar">
      </form>
      </td>
    </tr>';
  }
  $template .= '
  <tr>
    <td colspan="7" align="center">
    <form method="post">
      <input type="hidden" name="r" value="add_usuario">
      <input type="submit" name=add_usuario value="Agregar">
    </form>
    </td>
  </tr>
</table>';
  printf($template);
?>













<!--<form method="post">
  <input type="text" name=c value="add_usuario">Agregar
</form> -->





  <!--<h2>Titulo Curso</h2>
</div>
<div align="left">
  <form method="post">
    *Nombre Curso:<input type="text" name="" value=""><br>
    Descripcion Curso:<textarea name="curso_description" rows="8" cols="80"></textarea><br>
    Contralor:<input type="text" name="" value=""><br>
    Fecha:<input type="date" name="" value=""><br>
    <input type="submit" name="" value="Añadir">
  </form>
</div>-->

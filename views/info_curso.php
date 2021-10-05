<div align="center">
<?php

$cursos = new CursosModel();
$cursos_datos = $cursos->read($_POST['c']);
$cp = new CP_Model();
$cp_datos = $cp->read($_POST['c']);
//var_dump ($cp_datos);
$template = '<table>
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
      <td>Editar</td>
      <td>Eliminar</td>
    </tr>';
  }
  $template .= '
  <tr>
    <td colspan="7" align="center">Agregar</td>
  </tr>
</table>';
  printf($template);
?>



















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

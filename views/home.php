<div align="center">
<h1>Gestion de cursos</h1>
<form method="post">
  <input type="hidden" name="r" value="add_curso">
  <input type="hidden" name="c" value="set">
  <input type="submit" name="add_curso" value="Añadir curso">
</form>
<?php

  $cursos = new CursosModel();
  $cursos_datos = $cursos->read();

  //var_dump($cursos_datos);

  foreach ($cursos_datos as $key) {
    print('<table class="bordez">
      <tr>
        <td>' . $key['curso_id'] . '</td>
        <td>' . $key['curso_name'] . '</td>
        <td>
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
      <tr>
        <td colspan="4" align="center">
        <form align="center" method="post">
          <input type="hidden" name="r" value="info_curso">
          <input type="hidden" name="c" value="' . $key['curso_id'] . '">
          <input type="submit" name="informacion" value="Info">
        </form>
        </td>
      </tr>
    </table>');
  }

?>
</div>

<style>
  .bordez {
    border: 1px solid #d0d0d0;
  }
  td{
    border: 1px solid #d0d0d0;
  }
  table{
    margin: 25px auto;
  }
</style>

<?php

  $cursos = new CursosModel();
  $cursos_datos = $cursos->read();

  //var_dump($cursos_datos);

  foreach ($cursos_datos as $key) {
    print('<table class="bordez">
      <th>
        <td>' . $key['curso_id'] . '</td>
        <td>' . $key['curso_name'] . '</td>
        <td><form method="post">
          <input type="hidden" name="r" value="curso_edit">
          <input type="hidden" name="c" value="' . $key['curso_id'] . '">
          <input type="submit" name="envio" value="Editar">
        </form></td>
      </th>
      <tr>
        <td colspan="4">' . $key['curso_description'] . '</td>
      </tr>
      <tr>
        <td colspan="2">' . $key['curso_contralor'] . '</td>
        <td colspan="2">' . $key['curso_fecha'] . '</td>
      </tr>
    </table>');
  }

?>

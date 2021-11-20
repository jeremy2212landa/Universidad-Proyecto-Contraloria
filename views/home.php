<?php

  $cursos = new CursosModel();
  $cursos_datos = $cursos->read();

$template = '
<div class="bdy">
<h1>Gestion de cursos</h1>
<form method="post">
  <input type="hidden" name="r" value="add_curso">
  <input type="hidden" name="c" value="set">
  <input class="btn-n" type="submit" name="add_curso" value="Añadir curso">
</form>';

  foreach ($cursos_datos as $key) {

    $template .= '
    <table class="tb-home">
      <tr>
        <td>' . $key['curso_id'] . '</td>
        <td>' . $key['curso_name'] . '</td>
        <td>Horas: ' . $key['curso_horas'] .'</td>
        <td>
          </form>
          <form method="post">
            <input type="hidden" name="r" value="delete_curso">
            <input type="hidden" name="c" value="' . $key['curso_id'] . '">
            <input id="button" type="submit" name="delete" value="Eliminar">
          </form>
        </td>
      </tr>
      <tr>
        <td colspan="4">' . $key['curso_description'] . '</td>
      </tr>
      <tr>
        <td colspan="3">' . $key['curso_contralor'] . '</td>
        <td>' . $key['curso_fecha'] . '</td>
      </tr>
      <tr>
        <td colspan="4" align="center">
        <form align="center" action="./?r=cursos&c='. $key['curso_id'] .'" method="post">
          <input type="hidden" name="r" value="info_curso">
          <input type="hidden" name="c" value="' . $key['curso_id'] . '">
          <input id="button" type="submit" name="informacion" value="Info">
        </form>
        </td>
      </tr>
    </table>';

  }

$template .= '</div>';
printf($template);

?>

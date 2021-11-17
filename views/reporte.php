<?php

if (isset($_POST['cachichen'])) {

  require_once ('./vendor/autoload.php');
  $mpdf = new \Mpdf\Mpdf(['tempDir' => __DIR__ . '/custom/temp/dir/path']);
  $mpdf->WriteHTML('Hello World');
  $mpdf->Output();
}



$template = '
<div align="center">
<form method="post">
<input type="submit" name="cachichen" value="pdf"><br>
</form><br>
</div>
<div align="center">
<h3>Reporte</h3>
<form method="post">
<select name="report">

<option value="cur">Curso</option>

<option value="par">Participante</option>

<option value="ins">instructor</option>

</select>
<input type="submit" name="check" value="Enviar"><br>
</form><br>';


if (isset($_POST['check'])) {

  if ($_POST['report'] == 'cur') {

    $cur = new CursosModel();
    $get_cur = $cur->read();
    $template .= '
    <table>
      <tr>
        <td>
        <form method="post">
        <input type="hidden" name="op" value="check"><br>
        <select name="report">';
        foreach ($get_cur as $key) {
          $template .= '<option value="'. $key['curso_name'] .'">'. $key['curso_name'] .'</option>';
        }

    $template .= '
    </select>
    <input type="submit" name="sip" value="Enviar"><br>
        </form>
        </td>
      </tr>
    </table>';

  }elseif ($_POST['report'] == 'par') {
    $par = new ParticipantesModel();
    $get_par = $par->read();
    $template .= '
    <table>
      <tr>
        <td>
        <form method="post">
        <input type="hidden" name="op" value="check"><br>
        <select name="report">';

        foreach ($get_par as $key) {
          $template .= '<option value="'. $key['nombre'] .'">'. $key['nombre'] .' '. $key['apellido'] .' '. $key['cedula'] .'</option>';
        }

    $template .= '
    </select>
    <input type="submit" name="sip" value="Enviar"><br>
        </form>
        </td>
      </tr>
    </table>';

  }elseif ($_POST['report'] == 'ins') {

    $ins = new InstructorModel();
    $get_ins = $ins->read();
    $template .= '
    <table>
      <tr>
        <td>
        <form method="post">
        <input type="hidden" name="op" value="check"><br>
        <select name="report">';

        foreach ($get_ins as $key) {
          $template .= '<option value="'. $key['nombre'] .'">'. $key['nombre'] .' '. $key['apellido'] .' '. $key['cedula'] .'</option>';
        }

    $template .= '
    </select>
    <input type="submit" name="sip" value="Enviar"><br>
        </form>
        </td>
      </tr>
    </table>';

  }

}


$template .= '</div>';

printf($template);
?>

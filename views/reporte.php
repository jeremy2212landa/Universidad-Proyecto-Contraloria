<?php

$template = '
<div align="center">
<h3>Reporte</h3>
<form method="post">
<select name="report">

<option value="rep">Reporte mensual</option>

<option value="cur">Curso</option>

<option value="par">Participante</option>

<option value="ins">instructor</option>

</select>
<input type="submit" name="check" value="Enviar"><br>
</form><br>';


if (isset($_POST['check'])) {

  if ($_POST['report'] == 'rep') {

    $cur = new CursosModel();
    $get_cur = $cur->read();
    $template = '
    <table>
    <tr>
    <td>curso</td>
    <td>mes</td>
    <td>año</td>
    </tr>
    </table>';

  }elseif ($_POST['report'] == 'cur') {

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
    $pdf=new FPDF();
    $pdf->AddPage();
    $pdf->SetTitle('Exemplo de Relatório em PDF via PHP');
    $pdf->Output();
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

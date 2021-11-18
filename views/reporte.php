<?php
if (isset($_POST['op'])) {
  if ($_POST['op'] == 'cu') {
    $cp = new CP_Model();
    $get_cp = $cp->read($_POST['report']);
    ob_start();
    // Instanciation of inherited class
    $pdf = new PDF('Portrait');
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->SetFont('Arial','',12);
    $pdf->Cell(25,10,'cedula',1);
    $pdf->Cell(60,10,'Apellidos y Nombres',1);
    $pdf->Cell(60,10,'Correo',1);
    $pdf->Cell(45,10,'Direccion u Oficina',1,1);
    foreach ($get_cp as $key) {
      $pdf->Cell(25,10,$key['cedula'],0);
      $pdf->Cell(60,10,$key['apellido'].' '.$key['nombre'],0);
      $pdf->Cell(60,10,$key['correo'],0);
      $pdf->Cell(45,10,$key['direccion'],0,1);
    }
    $pdf->Output();
    ob_end_flush();



  }elseif ($_POST['op'] == 'par') {

    //var_dump($get_cp);
    //var_dump($_POST['report']);
    ob_start();
    // Instanciation of inherited class
    $pdf = new PDF('Landscape');
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->SetFont('Arial','',12);
    $pdf->Cell(95,10,'curso',1,0,'C');
    $pdf->Cell(60,10,'contralor',1,0,'C');
    $pdf->Cell(60,10,'horas',1,0,'C');
    $pdf->Cell(45,10,'fecha',1,1,'C');
    $pdf->Cell(45,10,'culo',0,1,'C');
    $cp = new CP_Model();
    $get_cp = $cp->read();
    foreach ($get_cp as $key) {
      if ($_POST['report'] == $key['cedula']) {
        var_dump($key);
        $pdf->Cell(45,10,'culo22',1,1,'C');
        /*$pdf->Cell(80,10,$key['curso_name'],1,0,'C');
        $pdf->Cell(60,10,$key['curso_contralor'],1,0,'C');
        $pdf->Cell(60,10,$key['curso_horas'],1,0,'C');
        $pdf->Cell(45,10,$key['curso_fecha'],1,1,'C');*/
      }
    //$pdf->Output();
    //ob_end_flush();
    }
  }elseif ($_POST['op'] == 'ins') {

    var_dump($_POST['op']);
    //var_dump($_POST['report']);
    ob_start();
    // Instanciation of inherited class
    $pdf = new PDF('Landscape');
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->SetFont('Arial','',12);
    $pdf->Cell(95,10,'curso',1,0,'C');
    $pdf->Cell(60,10,'contralor',1,0,'C');
    $pdf->Cell(60,10,'horas',1,0,'C');
    $pdf->Cell(45,10,'fecha',1,1,'C');
    $pdf->Cell(45,10,'culo',0,1,'C');
    $cp = new CP_Model();
    $get_cp = $cp->read();
    foreach ($get_cp as $key) {
      if ($_POST['report'] == $key['cedula']) {
        $pdf->Cell(45,10,'culo22',1,1,'C');
        /*$pdf->Cell(80,10,$key['curso_name'],1,0,'C');
        $pdf->Cell(60,10,$key['curso_contralor'],1,0,'C');
        $pdf->Cell(60,10,$key['curso_horas'],1,0,'C');
        $pdf->Cell(45,10,$key['curso_fecha'],1,1,'C');*/
      }
    $pdf->Output();
    ob_end_flush();
    }
  }
}





$template = '
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
        <input type="hidden" name="op" value="cu"><br>
        <select name="report">';
        foreach ($get_cur as $key) {
          $template .= '<option value="'. $key['curso_id'] .'">'. $key['curso_name'] .'</option>';
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
        <input type="hidden" name="op" value="par"><br>
        <select name="report">';

        foreach ($get_par as $key) {
          $template .= '<option value="'. $key['cedula'] .'">'. $key['nombre'] .' '. $key['apellido'] .' '. $key['cedula'] .'</option>';
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
        <input type="hidden" name="op" value="ins"><br>
        <select name="report">';

        foreach ($get_ins as $key) {
          $template .= '<option value="'. $key['cedula'] .'">'. $key['nombre'] .' '. $key['apellido'] .' '. $key['cedula'] .'</option>';
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

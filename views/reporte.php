<?php
if ( isset($_POST['check2']) ) {

  if ($_POST['op'] == 'cu') {
    $cp = new CP_Model();
    $get_cp = $cp->read($_POST['rep']);
    $i = new CI_Model();
    $ci = $i->read($_POST['rep']);
    ob_start();
    // Instanciation of inherited class
    $pdf = new PDF('Landscape');
    $pdf->tittle2 = 'Reporte de curso';
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->SetFont('Arial','',12);
    $pdf->Cell(120,10,'Reporte del curso: '. utf8_decode($get_cp[0]['curso_name']). utf8_decode(' | ') . $get_cp[0]['curso_fecha'],0,1);
    $pdf->Cell(100,10,'Instructor: '.$ci[0]['apellido'].' '.$ci[0]['nombre'],0,1);
    $pdf->Cell(25,10,'cedula',1);
    $pdf->Cell(80,10,'Apellidos y Nombres',1);
    $pdf->Cell(80,10,'Correo',1);
    $pdf->Cell(90,10,'Direccion u Oficina',1,1);
    $par_totales = 0;
    foreach ($get_cp as $key) {

      $pdf->Cell(25,10,$key['cedula'],0);
      $pdf->Cell(80,10,utf8_decode($key['apellido']).' '.utf8_decode($key['nombre']),0);
      $pdf->Cell(80,10,utf8_decode($key['correo']),0);
      $pdf->Cell(90,10,utf8_decode($key['direccion']),0,1);
      $par_totales += 1;
    }
    $pdf->Cell(55,10,utf8_decode('Horas Academicas: ').$get_cp[0]['curso_horas'],'T',1);
    $pdf->Cell(60,10,'Participantes totales: '.$par_totales,0,1);
    $pdf->SetY(-35);
    $pdf->Output();
    ob_end_flush();



  } elseif ($_POST['op'] == 'par') {

    $cp = new CP_Model();
    $get_cp = $cp->read();
    $p = new ParticipantesModel();
    $p_data = $p->read($_POST['rep']);
    //var_dump($get_cp);
    //var_dump($_POST['report']);
    ob_start();
    // Instanciation of inherited class
    $pdf = new PDF('Landscape');
    $pdf->tittle2 = 'Reporte de Participante';
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->SetFont('Arial','',12);
    $pdf->Cell(100,10,'Reporte de: '.utf8_decode($p_data[0]['apellido']).' '.utf8_decode($p_data[0]['nombre']).' C.I: '.$p_data[0]['cedula'],0,1);
    $pdf->Cell(95,10,'curso',1,0,'C');
    $pdf->Cell(60,10,'contralor',1,0,'C');
    $pdf->Cell(60,10,'horas',1,0,'C');
    $pdf->Cell(45,10,'fecha',1,1,'C');
    $horas_totales = 0;
    foreach ($get_cp as $key) {

      if ($key['cedula'] == $_POST['rep']) {

         $pdf->Cell(95,10,utf8_decode($key['curso_name']),0,0,'C');
         $pdf->Cell(60,10,utf8_decode($key['curso_contralor']),0,0,'C');
         $pdf->Cell(60,10,$key['curso_horas'],0,0,'C');
         $pdf->Cell(45,10,$key['curso_fecha'],0,1,'C');
         $horas_totales += $key['curso_horas'];
      }

    }
    $pdf->Cell(172.5,10,'Horas totales:',0,0,'R');
    $pdf->Cell(25,10,$horas_totales,'T',1,'C');
    $pdf->Output();
    ob_end_flush();

  }elseif ($_POST['op'] == 'ins') {

    $ci = new CI_Model();
    $get_ci = $ci->read();
    $i = new InstructorModel();
    $i_data = $i->read($_POST['rep']);
    //var_dump($_POST['op']);
    //var_dump($_POST['report']);
    ob_start();
    // Instanciation of inherited class
    $pdf = new PDF('Landscape');
    $pdf->tittle2 = 'Reporte de instructor';
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->SetFont('Arial','',12);
    $pdf->Cell(100,10,'Reporte de: '.utf8_decode($i_data[0]['apellido']).' '.utf8_decode($i_data[0]['nombre']).' C.I: '.$i_data[0]['cedula'],0,1);
    $pdf->Cell(95,10,'curso',1,0,'C');
    $pdf->Cell(60,10,'contralor',1,0,'C');
    $pdf->Cell(60,10,'horas',1,0,'C');
    $pdf->Cell(50,10,'fecha',1,1,'C');
    $horas_totales = 0;
    foreach ($get_ci as $key) {

      if ($key['cedula'] == $_POST['rep']) {

        $pdf->Cell(95,10,utf8_decode($key['curso_name']),0,0,'C');
        $pdf->Cell(60,10,utf8_decode($key['curso_contralor']),0,0,'C');
        $pdf->Cell(60,10,$key['curso_horas'],0,0,'C');
        $pdf->Cell(50,10,$key['curso_fecha'],0,1,'C');
        $horas_totales += $key['curso_horas'];
      }
    $pdf->Cell(172.5,10,'Horas totales:',0,0,'R');
    $pdf->Cell(25,10,$horas_totales,'T',1,'C');
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
        <select name="rep">';
        foreach ($get_cur as $key) {
          $template .= '<option value="'. $key['curso_id'] .'">'. $key['curso_name'] .'</option>';
        }

    $template .= '
    </select>
    <input type="submit" name="check2" value="Enviar"><br>
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
        <select name="rep">';

        foreach ($get_par as $key) {
          $template .= '<option value="'. $key['cedula'] .'">'. $key['nombre'] .' '. $key['apellido'] .' '. $key['cedula'] .'</option>';
        }

    $template .= '
    </select>
    <input type="submit" name="check2" value="Enviar"><br>
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
        <select name="rep">';

        foreach ($get_ins as $key) {
          $template .= '<option value="'. $key['cedula'] .'">'. $key['nombre'] .' '. $key['apellido'] .' '. $key['cedula'] .'</option>';
        }

    $template .= '
    </select>
    <input type="submit" name="check2" value="Enviar"><br>
        </form>
        </td>
      </tr>
    </table>';

  }

}


$template .= '</div>';

printf($template);
?>

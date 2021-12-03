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
    $pdf->Output('D', utf8_decode($get_cp[0]['curso_name']) . '.pdf');
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
    $pdf->Output('D', utf8_decode($p_data[0]['nombre']) . ' ' . utf8_decode($p_data[0]['apellido']) .' C.I: '.$p_data[0]['cedula'] . '.pdf');
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
    $pdf->Output('D', utf8_decode($i_data[0]['nombre']) . ' ' . utf8_decode($i_data[0]['apellido']) .' C.I: '. $i_data[0]['cedula'] . '.pdf');
    ob_end_flush();
    }
  }elseif ($_POST['op'] == 'men'){
    $d4te = $_POST['sum1'].'-'.$_POST['sum2'];
    $cuu = new CursosModel();
    $cuu_search = $cuu->read_mes($d4te);
    $convert = array(
      "01" => "Enero",
      "02" => "Febrero",
      "03" => "Marzo",
      "04" => "Abril",
      "05" => "Mayo",
      "06" => "Junio",
      "07" => "Julio",
      "08" => "Agosto",
      "09" => "Septiembre",
      "10" => "Octubre",
      "11" => "Noviembre",
      "12" => "Diciembre"
    );
    $cc = $convert[$_POST['sum2']];

    ob_start();
    // Instanciation of inherited class
    $pdf = new PDF('Landscape');
    $pdf->tittle2 = 'Reporte de Mensual de cursos';
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->SetFont('Arial','',12);
    $pdf->Cell(80,10,'Reporte del mes de ' . $cc,0,1);
    $pdf->Cell(80,10,'Nombre Curso',1);
    $pdf->Cell(60,10,'instructor',1,0);
    $pdf->Cell(35,10,'Fecha',1);
    $pdf->Cell(25,10,utf8_decode('N° Part'),1,0);
    $pdf->Cell(25,10,'horas',1,0);
    $pdf->Cell(50,10,'Contralor',1,1);
    $total_c = 0;
    $total_h = 0;
    foreach ($cuu_search as $key) {

      $pdf->Cell(80,10,$key['curso_name'],0);
      $pdf->Cell(60,10,$key['apellido'].' '.$key['nombre'].' '.$key['cedula'],0,0);
      $pdf->Cell(35,10,$key['curso_fecha'],0);
      $pdf->Cell(25,10,'0',0,0);
      $pdf->Cell(25,10,$key['curso_horas'],0,0);
      $pdf->Cell(50,10,$key['curso_contralor'],0,1);
      $total_c += 1;
      $total_h += $key['curso_horas'];
    }
    $pdf->Cell(80,10,'Cursos totales del mes: '.$total_c,'T',1);
    $pdf->Cell(80,10,'Horas academicas totales: '.$total_h,0,1);
    $pdf->Output('D', 'ppp.pdf');
    ob_end_flush();

  }
}





$template = '
<div align="center">
<h3>Reporte</h3>
<form method="post">
<select name="report">

<option value="men">Reporte Mensual</option>

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

  }elseif ($_POST['report'] == 'men') {
    $template .= '
    <table>
      <tr>
        <td>
        <form method="post">
        <input type="hidden" name="op" value="men"><br>
        <select name="sum1">

          <option value="2025">2025</option>
          <option value="2024">2024</option>
          <option value="2023">2023</option>
          <option value="2022">2022</option>
          <option value="2021">2021</option>
          <option value="2020">2020</option>
          <option value="2019">2019</option>
          <option value="2018">2018</option>
          <option value="2017">2017</option>
          <option value="2016">2016</option>
          <option value="2015">2015</option>
          <option value="2014">2014</option>
          

        </select>
        <select name="sum2">

          <option value="01">Enero</option>
          <option value="02">Febrero</option>
          <option value="03">Marzo</option>
          <option value="04">Abril</option>
          <option value="05">Mayo</option>
          <option value="06">Junio</option>
          <option value="07">Julio</option>
          <option value="08">Agosto</option>
          <option value="09">Septiembre</option>
          <option value="10">Octubre</option>
          <option value="11">Noviembre</option>
          <option value="12">Diciembre</option>

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

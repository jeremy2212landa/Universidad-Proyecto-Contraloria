<div align="center">
<?php
$cursos = new CursosModel();
$instructor = new InstructorModel();
$participantes = new ParticipantesModel();
$cp = new CP_Model();
$ci = new CI_Model();
$cursos_datos = $cursos->read($_GET['c']);
$cp_datos = $cp->read($_GET['c']);
$ci_datos = $ci->read($_GET['c']);
//var_dump ($ci_datos[0]['ci_id']);
// var_dump ($cp_datos);
// $participante_dat = array(
//   'nombre_participante' => $_POST['nombre_p'],
//   'apellido_participante' => $_POST['apellido_p'],
//   'cedula_participante' => $_POST['cedula_p'],
//   'correo_participante' => $_POST['correo_p'],
//   'direccion_participante' => $_POST['direccion_p']
// );
//var_dump($participante_dat);
  print('<h2>Curso</h2>
  <table class="bordez">
    <tr>
      <td>' . $cursos_datos[0]['curso_id'] . '</td>
      <td>' . $cursos_datos[0]['curso_name'] . '</td>
      <td>
        <form method="post">
          <input type="hidden" name="r" value="edit_curso">
          <input type="hidden" name="c" value="' . $cursos_datos[0]['curso_id'] . '">
          <input type="submit" name="envio" value="Editar">
        </form>
        <form method="post">
          <input type="hidden" name="r" value="delete_curso">
          <input type="hidden" name="c" value="' . $cursos_datos[0]['curso_id'] . '">
          <input type="submit" name="delete" value="Eliminar">
        </form>
      </td>
    </tr>
    <tr>
      <td colspan="3">' . $cursos_datos[0]['curso_description'] . '</td>
    </tr>
    <tr>
      <td colspan="2">' . $cursos_datos[0]['curso_contralor'] . '</td>
      <td>' . $cursos_datos[0]['curso_fecha'] . '</td>
    </tr>
  </table><br><br><br>');

$template = '<h2>Instructor</h2>
<table class="bordez">
  <tr>
    <td>Nombre</td>
    <td>Apellido</td>
    <td>Cedula</td>
    <td>Correo</td>
    <td>Instituto</td>
    <td>Cargo</td>
    <td>Opciones</td>
  </tr>';

if (empty($ci_datos)) {
  $template .= '
    <tr>
      <form method="post">
        <td><input type="text" name="nombre_i" value="" placeholder="Nombre"></td>
        <td><input type="text" name="apellido_i" value="" placeholder="apellido"></td>
        <td><input type="text" name="cedula_i" value="" placeholder="cedula"></td>
        <td><input type="text" name="correo_i" value="" placeholder="correo"></td>
        <td><input type="text" name="instituto_i" value="" placeholder="Instituto"></td>
        <td><input type="text" name="cargo_i" value="" placeholder="cargo"></td>
        <td>
          <input type="hidden" name="op" value="set_instructor">
          <input type="hidden" name="r" value="info_curso">
          <input type="hidden" name="c" value="'. $_GET['c'] .'">
          <input type="submit" name="envio_instructor" value="Enviar">
        </td>
      </form>
    </tr>
  </table>';
}else if (isset($_POST['envio_instructor'])){
  $template .= '
  <tr>
  <form method="post">
    <td><input type="text" name="nombre_i" value="'. $ci_datos[0]['nombre'] .'" placeholder="Nombre"></td>
    <td><input type="text" name="apellido_i" value="'. $ci_datos[0]['apellido'] .'" placeholder="apellido"></td>
    <td><input type="text" name="cedula_i" value="'. $ci_datos[0]['cedula'] .'" placeholder="cedula"></td>
    <td><input type="text" name="correo_i" value="'. $ci_datos[0]['correo'] .'" placeholder="correo"></td>
    <td><input type="text" name="instituto_i" value="'. $ci_datos[0]['instituto'] .'" placeholder="Instituto"></td>
    <td><input type="text" name="cargo_i" value="'. $ci_datos[0]['cargo'] .'" placeholder="cargo"></td>
    <td>
      <input type="hidden" name="op" value="set_instructor">
      <input type="hidden" name="r" value="info_curso">
      <input type="hidden" name="c" value="'. $_GET['c'] .'">
      <input type="submit" name="envio_instructor" value="Enviar">
    </td>
  </form>
  </tr>
</table>';
}else {
  $template .= '
    <tr>
      <td>'. $ci_datos[0]['nombre'] .'</td>
      <td>'. $ci_datos[0]['apellido'] .'</td>
      <td>'. $ci_datos[0]['cedula'] .'</td>
      <td>'. $ci_datos[0]['correo'] .'</td>
      <td>'. $ci_datos[0]['instituto'] .'</td>
      <td>'. $ci_datos[0]['cargo'] .'</td>
      <td>
        <form method="post">
        <input type="hidden" name="r" value="info_curso">
        <input type="hidden" name="c" value="'. $_GET['c'] .'">
        <input type="submit" name="envio_instructor" value="Enviar">
        </form>
      </td>
    </tr>
  </table>';
}


if ($_POST['r'] == 'info_curso' && $_POST['op'] == 'set_instructor' && isset($_POST['envio_instructor'])) {

  $read_instructor = $instructor->read($_POST['cedula_i']);



  if (empty($read_instructor)) {

    if (!empty($ci_datos)) {
      $drop_ci = $ci->delete($ci_datos[0]['ci_id']);
    }

    $instructor_data = array(
      'nombre_instructor' => $_POST['nombre_i'],
      'apellido_instructor' => $_POST['apellido_i'],
      'cedula_instructor' => $_POST['cedula_i'],
      'correo_instructor' => $_POST['correo_i'],
      'instituto_instructor' => $_POST['instituto_i'],
      'cargo_instructor' => $_POST['cargo_i']);

      $set_instructor = $instructor->create($instructor_data);

      $set_ci = $ci->create($ci_data = array(
        'ci_curso' => $_POST['c'],
        'ci_instructor' => $_POST['cedula_i'])
      );

  }else {

    if (!empty($ci_datos)) {
      $drop_ci = $ci->delete($ci_datos[0]['ci_id']);
    }

    $instructor_data = array(
      'nombre_instructor' => $_POST['nombre_i'],
      'apellido_instructor' => $_POST['apellido_i'],
      'cedula_instructor' => $_POST['cedula_i'],
      'correo_instructor' => $_POST['correo_i'],
      'instituto_instructor' => $_POST['instituto_i'],
      'cargo_instructor' => $_POST['cargo_i']);

      $set_instructor = $instructor->update($instructor_data);

      $set_ci = $ci->create($ci_data = array(
        'ci_curso' => $_POST['c'],
        'ci_instructor' => $_POST['cedula_i'])
      );

      }



      header('Location: ./?r=cursos&c=' .$_POST['c']);
  }



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
          <input type="submit" name="edit_participante" value="Editar">
        </form>
      </td>
      <td>
        <form method="post">
          <input type="submit" name="edit_participante" value="Eliminar">
        </form>
      </td>
    </tr>';
  }
  $template .= '
  <tr>
    <td colspan="7">
      <form method="post">
      <input type="text" name="nombre_p" value="" placeholder="Nombre" required>
      <input type="text" name="apellido_p" value="" placeholder="Apellido" required>
      <input type="text" name="cedula_p" value="" placeholder="Cedula" required>
      <input type="text" name="correo_p" value="" placeholder="Correo" required>
      <input type="text" name="direccion_p" value="" placeholder="Direccion" required>
      <input type="hidden" name="r" value="info_curso">
      <input type="hidden" name="op" value="set_participante">
      <input type="hidden" name="c" value="'. $_GET['c'] .'">
      <input type="submit" name="envio_participante" value="añadir">
      </form>
    </td>
  </tr>
</table>';

if ($_POST['r'] == 'info_curso' && $_POST['op'] == 'set_participante' && isset($_POST['envio_participante'])) {

  $read_participante = $participantes->read($_POST['cedula_p']);
  $cp_data = array(
    'cp_curso' => $_POST['c'],
    'cp_participante' => $_POST['cedula_p']);

  $verify_rel_cp = $cp->verify($cp_data);

  $participante_dat = array(
    'nombre_participante' => $_POST['nombre_p'],
    'apellido_participante' => $_POST['apellido_p'],
    'cedula_participante' => $_POST['cedula_p'],
    'correo_participante' => $_POST['correo_p'],
    'direccion_participante' => $_POST['direccion_p']
  );



  if (empty($read_participante)){
    $set = $participantes->create($participante_dat);
  }else {
    $set = $participantes->update($participante_dat);
  }

  if (empty($verify_rel_cp)) {

    $set_cp = $cp->create( $set = array(
      'cp_curso' => $_POST['c'],
      'cp_participante' => ['cedula_p']));

  }

  header('Location: ./?r=cursos&c=' .$_POST['c']);

}

  printf($template);
?>

<?php
$participante = new ParticipantesModel();
$participantes_read = $participante->read($_GET['ci']);
  $template = '
  <div align="center">
    <h2>Participante</h2>
    <table class="bordez">
      <tr>
        <td>Nombre</td>
        <td>Apellido</td>
        <td>Correo</td>
        <td>Direccion</td>
        <td colspan="2">opciones</td>
      </tr>
      <tr>
      <form method="post">
        <td><input type="text" maxlength="30" name="nombre_p" value="'. $participantes_read[0]['nombre'] .'" required></td>
        <td><input type="text" maxlength="30" name="apellido_p" value="'. $participantes_read[0]['apellido'] .'" required></td>
        <td><input type="email" maxlength="30" name="correo_p" value="'. $participantes_read[0]['correo'] .'" required></td>
        <td>
        <select name="direccion_p" required>
          <option value="">Direcciones</option>
          <option value="Administración y Finanzas">DAF</option>
          <option value="Comunicación y Relaciones Públicas">DCRP</option>
          <option value="Consultoria Juridica">DCJ</option>
          <option value="Planificación Presupuesto y Control de Gestión">DPPCG</option>
          <option value="Talento Humano">DTH</option>
          <option value="Tecnología de Información y Comunicaciones">DTIC</option>
          <option value="Control de la Administración Central y Otro Poder">DCACOP</option>
          <option value="Control de la Administración Descentralizada">DCAD</option>
          <option value="Determinación de Responsabilidad Administrativa">DDRA</option>
        </select>
        </td>
        <td>
          <input type="hidden" name="cedula_p" value="'. $_GET['ci'] .'">
          <input type="hidden" name="r" value="participantes">
          <input type="hidden" name="op" value="updatep">
          <input type="hidden" name="c" value="'. $_GET['c'] .'">
          <input type="submit" name="update" value="actualizar">
        </td>
      </form>
      </tr>
    </table>
    </form>
  </div>';

  if (isset($_POST['r']) == 'participantes' && isset($_POST['op']) == 'updatep') {

    $pp = array(
      'nombre_participante' => $_POST['nombre_p'],
      'apellido_participante' => $_POST['apellido_p'],
      'cedula_participante' => $_POST['cedula_p'],
      'correo_participante' => $_POST['correo_p'],
      'direccion_participante' => $_POST['direccion_p']
    );

      $set = $participante->update($pp);

      header('Location: ./?r=cursos&c=' . $_POST['c']);
  }


  printf($template);
?>

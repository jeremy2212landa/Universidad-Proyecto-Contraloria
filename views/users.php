<?php
$user = new UsersModel();
$userscount = $user->read();

$template = '
<div align="center">
<h1 align="center">Control de Usuarios</h1>
  <table align="center">
    <tr>
      <td>Id</td>
      <td>Username</td>
      <td>Email</td>
      <td>Role</td>
      <td colspan ="2" align="center">Opciones</td>
    </tr>';

foreach ($userscount as $key) {

  $template .= '
  <tr>
    <td>' . $key['user_id'] . '</td>
    <td>' . $key['user_name'] . '</td>
    <td>' . $key['user_email'] . '</td>
    <td>' . $key['role'] . '</td>
    <td>
      <form method="post">
        <input type="hidden" name="r" value="edit_user">
        <input type="hidden" name="u" value="'. $key['user_id']. '">
        <input id="button" type="submit" name="editar" value="editar">
      </form></td>
    <td>
      <form method="post">
        <input type="hidden" name="r" value="delete_user">
        <input type="hidden" name="u" value="'. $key['user_id']. '">
        <input id="button" type="submit" name="Eliminar" value="Eliminar">
      </form></td>
  </tr>';

}

$template .= '
</table>';

if ($_SESSION['role'] == 'Admin'){

  $template .= '<form method="post">
  <input type="hidden" name="r" value="add_user">
  <input class="btn-n" type="submit" name="agregar" value="agregar">
</form>';

}


$template .= '</div>';

printf ($template);
?>

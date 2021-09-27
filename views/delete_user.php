<?php
  $users = new UsersModel();
  $delete_user = $users->delete($_POST['u']);
  print('
  <h1 align="center">Usuario Eliminado</h1><br>
  <a href="./?r=users">Volver</a>
  ');

?>

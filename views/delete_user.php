<?php
  $users = new UsersModel();
  

  if ($_SESSION['role'] == 'Admin'){
    print('
  <h1 align="center">Usuario Eliminado</h1><br>
  <a href="./?r=users">Volver</a>
  ');
  $delete_user = $users->delete($_POST['u']);
  } else {
    require_once('./views/error401.php');
  }
  

?>

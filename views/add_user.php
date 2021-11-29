<?php

$template = '
<div align="center">
  <h2>Anadir Usuario</h2>
  <form method="post">
    <input type="hidden" name="r" value="add_user">
    <input type="hidden" name="op" value="set">
    Username: <input type="text" maxlength="30" name="username" placeholder="Usuario" value="" required><br>
    Email: <input type="email" maxlength="30" name="email" placeholder="Correo" value="" required><br>
    password: <input type="password" maxlength="32" placeholder="Contraseña" name="pass" value="" required><br>
    Role <select name="role">
      <option value="Admin">Admin</option>
      <option value="User">User</option>
    </select><br>
    <input type="submit" name="Agregar" value="Agregar">
  </form>

</div>';

printf($template);

if ($_POST['r'] == 'add_user' && isset($_POST['op']) == 'set') {

  $user_data = array(
    'user_id' => 0,
    'user_name' => $_POST['username'],
    'user_email' => $_POST['email'],
    'user_pass' => $_POST['pass'],
    'role' => $_POST['role']);

  $users1 = new UsersModel();
  $usersadd = $users1->create($user_data);

  header('Location: ./?r=users');

}
?>

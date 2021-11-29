<?php
  $users = new UsersModel();
  $get_user = $users->read($_POST['u']);

  foreach ($get_user as $key) {

    $template = '
    <div class="" align="center">
      <h2>Anadir Usuario</h2>
      <form method="post">
        <input type="hidden" name="r" value="edit_user">
        <input type="hidden" name="op" value="set">
        <input type="hidden" name="id" value="' . $key['user_id'] . '">
        Username: <input type="text" maxlength="30" name="username" placeholder="username" value="' . $key['user_name'] . '" required><br>
        Email: <input type="email" maxlength="30" name="email" placeholder="email" value="' . $key['user_email'] . '" required><br>
        password: <input type="password" maxlength="32" placeholder="pass" name="pass" value="' . $key['user_pass'] . '" required><br>
        Role <select name="role" value="' . $key['role'] . '">
          <option value="Admin">Admin</option>
          <option value="User">User</option>
        </select><br>
        <input type="submit" name="Agregar" value="Agregar">
      </form>
    </div>';

  }

printf($template);


if ($_POST['r'] == 'edit_user' && isset($_POST['op']) == 'set') {

  $user_data = array(
    'user_id' => $_POST['id'],
    'user_name' => $_POST['username'],
    'user_email' => $_POST['email'],
    'user_pass' => $_POST['pass'],
    'role' => $_POST['role']);


  $usersadd = $users->update($user_data);

  header('Location: ./?r=users');
  
}
?>

<?php
  $template = '
  <div align="center">
    <h1>Eliminando curso</h1>
    <p>Estas seguro que quieres Completar esta accion?</p><br>
    <form method="post">
      <input type="hidden" name="c" value="'. $_POST['c'] .'">
      <input type="hidden" name="op" value="delete">
      <input type="hidden" name="r" value="delete_curso">
      <input type="submit" name="delete" value="Eliminar">
    </form>';

if ($_POST['r'] == 'delete_curso' && $_POST['op'] == 'delete') {
    $cp = new CP_Model();
    $ci = new CI_Model();
    $relcp = $cp->delete_relation($_POST['c']);
    $relci = $ci->delete_relation($_POST['c']);
    $cursomodel = new CursosModel();
    $delcurso = $cursomodel->delete($_POST['c']);

  header('Location: ./');
}
printf($template);
?>
</div>

<?php

$cursos = new CursosModel();
$cursos_datos = $cursos->read($_POST['c']);
$template = '';

?>
<div align="center">
  <h2>Titulo Curso</h2>
</div>
<div align="left">
  <form method="post">
    *Nombre Curso:<input type="text" name="" value=""><br>
    Descripcion Curso:<textarea name="curso_description" rows="8" cols="80"></textarea><br>
    Contralor:<input type="text" name="" value=""><br>
    Fecha:<input type="date" name="" value=""><br>
    <input type="submit" name="" value="Añadir">
  </form>
</div>

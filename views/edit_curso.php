<?php
$cursos = new CursosModel();
$cursos_datos = $cursos->read($_POST['c']);
var_dump($cursos_datos);
?>

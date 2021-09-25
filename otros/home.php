<?php
  require_once("../Model/obtenercurso.php");

  $cursos_reg = new cursos();
  $cursos_rows = $cursos_reg->get_cursos();

  require("../View/home.php");

?>

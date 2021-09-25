<?php

  require("../Model/obtenercurso.php");
  require("../Model/obtenerinstructor.php");
  require("../Model/obtenerparticipante.php");

  $obtener_curso = new cursos();
  $obtener_instructor = new instructor();
  $obtener_participante = new participante();

  if (isset($_GET["curso"])){
    $registro_curso = $obtener_curso->get_cursos_uniqe($_GET["curso"]);
    $registro_instructor = $obtener_instructor->get_instructores_select($_GET["curso"]);
    $registro_participante = $obtener_participante->get_participantes_tabla($_GET["curso"]);
    require("../View/crearcurso.php");
  }else{
    require("../View/crearcursovacio.php");
  }



?>

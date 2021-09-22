<?php
require_once("../Model/configuracion.php");
echo "hola1";
 $database = new conexion();
 $query = $database->db_open();
 echo "hola2 <br><br>";
 // // $database->query("SELECT * FROM cursos");
 // var_dump($query);

?>

<?php
print '
<!DOCTYPE html>
<html lang="es">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8">
	<title>Gestion de Cursos CEBM</title>
	<meta name="description" content="Proyecto Para la gestion de cursos de parte de estudiantes de la UPTAMCA">
	<link rel="shortcut icon" type="image/png" href="./public/img/favicon.png">
	<link href="./public/normalize.css" rel="stylesheet" type="text/css">
	<link href="./public/css.css" rel="stylesheet" type="text/css">
</head>
<body class="container body">';


  if ($_SESSION['ok']) {

    print '<!-- Inicio de la Barra de navegacion -->
    <nav class="nav-home">

			<div class="nav-item1">
				<a href="./">
	        <div>
						<img class="icon" src="./public/img/CEBM.png">
					</div>
				</a>
			</div>

			<div>
				<form method="post" action="./?r=report">
					<input class="btn-n" type="submit" name="" value="Reportes">
				</form>
			</div>

			<div>
				<a class="btn-header" href="./?r=users">Users</a>
				<a class="btn-header" href="./?r=salir">Salir</a>
			</div>

    </nav>
    <!-- Fin de la Barra de navegacion -->';

  }else {

    print '<!-- Inicio de la Barra puta desaparece de navegacion -->
    <nav class="nav-unlog">
			<h3>Sistema de Gestion de Cursos CEBM</h3>
        <!--<div>
					<img class="icon" src="./public/img/CEBM.png">
				</div>-->
    </nav>
    <!-- Fin de la Barra de navegacion -->';

  }

?>

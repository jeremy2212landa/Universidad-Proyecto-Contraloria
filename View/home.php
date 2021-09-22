<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <LINK REL=StyleSheet HREF="../css/home.css" TYPE="text/css" MEDIA=screen>
    <title>home</title>
</head>
<body>

  <!-- navbar -->
    <?php require_once("../View/navbar.html"); ?>
  <!-- navbar -->
  <style>
  .card-1 {
    background-color: black;
    margin: 5px 30px;
    padding: 15px;
    border-radius: 10px;
  }
  .card-head{
    display: flex;
    justify-content: space-between;
  }
  .card-1 h1{
    font-size: 20px;
  }
  .card-1 h2{
    font-size: 20px;
    text-align: right;
  }
  .card-foot{
    margin: 5px -15px -15px -15px;
    border-bottom-right-radius: 10px;
    border-bottom-left-radius: 10px;
    padding: 3px 25px 7px 0px;
    text-align: right;
    background-color: rgba(255, 255, 255, .4);
  }
  </style>

	<div class="total">
	<section>
    <h2>Cursos</h2>
    <?php foreach ($cursos_rows as $registro) {
      echo "<div class='card-1'>
              <div class='card-head'>
                <h1>" . $registro["nombre.curso"] . "</h1>
                <h2>
                  <a href='crearcurso.php?curso=" . $registro["id"] . "'>@</a>
                  <a href='eliminarcurso.php'>X</a>
                </h2>
              </div></br>
              <p>" . $registro["descripcion.curso"] . "</p></br>
              <div class='card-foot'>" . $registro["fecha"] . "</br>
              <span>contralor: </span>" . $registro["contralor"] . "</div>
            </div>";
    }?>

  </section>
	<aside>
    <div class="crear_curso">
      <a href="crearcurso.php"><strong>Crear Curso</strong></a>
<!--


-->
    </div>
  </aside>
</div>
</body>
</html>

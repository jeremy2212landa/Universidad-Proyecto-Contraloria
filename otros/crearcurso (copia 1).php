<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <LINK REL=StyleSheet HREF="../css/crearcurso.css" TYPE="text/css" MEDIA=screen>
    <title>Crear Curso</title>
    <style>
    .card-1 {
      background-color: black;
      margin: 5px 30px;
      padding: 15px;
      border-radius: 10px;
      width: 100%;
    }
    .card-2 {
      background-color: black;
      margin: 5px 30px;
      padding: 15px;
      border-radius: 10px;
      width: 35%;
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
    .divider{
      display: flex;
      justify-content: space-between;
    }
    </style>
</head>
<body>

  <!-- navbar -->
    <?php require_once("../View/navbar.html"); ?>
  <!-- navbar -->
  <section class="divider">

    <?php foreach ($registro_curso as $reg_c) {
      echo "<div class='card-1'>
              <div class='card-head'>
                <h1>" . $reg_c["nombre.curso"] . "</h1>
                <h2><a href='crearcurso.php?curso=" . $reg_c["id"] . "'>@</a></h2>
              </div></br>";
        echo "<p>" . $reg_c["descripcion.curso"] . "</p></br>";
        echo "<div class='card-foot'>".$reg_c["fecha"]."</br>";
        echo "<span>contralor: </span>".$reg_c["contralor"]."</div></div></br></br>";
    }?>
    <?php foreach ($registro_instructor as $reg_i) {
      echo "<div class='card-2'>
              <div class='card-head'>
                <h1>" . $reg_i["nombre"] . " " . $reg_i["apellido"] . "</h1>
                <h2><a>@</a></h2>
              </div></br>";
        echo "<p>" . $reg_i["correo"] . "</p></br>";
        echo "<div><!--class='card-foot'-->" . $reg_i["instituto"] . "</br>";
        echo "<span>cargo: </span>".$reg_i["cargo"]."</div></div></br></br>";
    }?>

  </section>

  <style media="screen">

  .tabla{
    width: 100%;
    margin: 25px auto;
    width: 80%;
    height: 100%;
  }

  </style>


<section class="tabla">

  <?php
    if (isset($_GET["curso"])) {
      echo "<table align='center'>
        <tr>
          <td>n#</td>
          <td>Nombre</td>
          <td>Apellido</td>
          <td>Cedula</td>
          <td>Correo</td>
          <td>Directiva</td>
          <td>edit</td>
          <td><strong>X</strong></td>
        </tr>";
    }
   ?>


     <?php
     $i=1;
     foreach ($registro_participante as $table) {

      echo "<tr>
              <td>" . $i . "</td>
              <td>" . $table["nombre"] . "</td>
              <td>" . $table["apellido"] . "</td>
              <td>" . $table["cedula"] . "</td>
              <td>" . $table["correo"] . "</td>
              <td>" . $table["direccion"] . "</td>
              <td>editar</td>
              <td>X</td>
            </tr>";
        $i++;
        }

      ?>
  </section>


</body>
</html>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <LINK REL=StyleSheet HREF="../css/crearcurso.css" TYPE="text/css" MEDIA=screen>
    <title>Crear Curso Nuevo</title>

    <style>

    table {
      margin: auto;
      color: black;
    }
    #envio{
      color: black;
    }
    .color{
      color: black;
    }
    </style>

</head>
<body>
  <!-- navbar -->
    <?php require_once("../View/navbar.html"); ?>
  <!-- navbar -->

  <section align="center" class="divider">
    <form class="" action="<?php $_SERVER["self"] ?>" method="post">
      <table>

        <tr>
          <td colspan="2" align="center">
            Crear curso
          </td>
        </tr>

        <tr>
          <td>
            Nombre Curso:
          </td>
          <td>
            <input class="color" type="text" name="nombre_curso" required>
          </td>
        </tr>

        <tr>
          <td>
            Descripcion Curso:
          </td>
          <td>
            <textarea class="color" cols="50" name="descripcion_curso"></textarea>
          </td>
        </tr>

        <tr>
          <td>
            Contralor:
          </td>
          <td>
            <input class="color" type="text" name="contralor" value="">
          </td>
        </tr>
        <tr>
          <td>
            Fecha:
          </td>
          <td>
            <input class="color" type="datetime" name="fecha"  value="<?php echo date('Y-m-d'); ?>" required>
          </td>
        </tr>

        <tr>
          <td colspan="2" class="color" align="center">
            <input type="button" id="envio" name="envio" value="envio">
          </td>
        </tr>

      </table>

    </form>
  </section>


</body>
</html>

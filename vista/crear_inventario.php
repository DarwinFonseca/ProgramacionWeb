<?php
require_once '../modelo/conexion.php';
$db = new conexion();
$db->Conectar();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Agregar al Inventario</title>
    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  </head>
  <body>
    <div class="container">


    <h1>Agregar al Inventario</h1>
    <form action="../controlador/control.php" method="POST">
            <p>
                    <label>Id del Inventario:</label> <br />
                    <input type="text" name="id_inventario" placeholder="Auto-Generado" disabled id="id_inventario"/>
                    <!--?php
                    $db->SelectInventario();
                    ?-->

            </p>
            <p>
                    <label>Código Único:</label> <br />
                    <input type="text" name="codigo_unico" id="codigo_unico" />
            </p>
            <p>
                    <label>Id del Bien:</label> <br />
                    <!--input type="text" name="id_bienes" id="id_bienes"/-->
                    <?php
                    $db->SelectBienes();
                    ?>
            </p>
            <p>
                    <label>Ubicación:</label> <br />
                    <input type="text" name="ubicacion" id="ubicacion"/>
            </p>
            <p>
                    <label>Fecha de Ingreso:</label> <br />
                    <input type="date" placeholder="Ej: 1990-01-01" name="fecha_ingreso" id="fecha_ingreso"/>
            </p>
            <p>
                    <label>Id del Responsable:</label> <br />
                    <!--input type="text" name="id_responsable" id="id_responsable"/-->
                    <?php
                    $db->SelectResponsable();
                    ?>
            </p>
            <p>
                    <input type="submit" value="Crear Inventario" id="btnCrearInventario" name="btnCrearInventario" />
            </p>
    </form>
</div>
  </body>
</html>

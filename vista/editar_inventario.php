<?php
require_once '../modelo/conexion.php';
$db = new conexion();
$db->Conectar();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <meta charset="utf-8">
    <title>Actualizar Inventario</title>
  </head>
  <body>
    <div class="container">


    <h1>Actualizar Inventario</h1>
    <form action="../controlador/control.php" method="POST">
            <p>
                    <label>Id del Inventario:</label> <br />
                    <input type="text" name="mostrar_id_inventario" placeholder="Auto-Generado" disabled id="mostrar_id_inventario" value="<?php echo $row['id_inventario']; ?>"/>
                    <input type="hidden" name="id_inventario"   id="id_inventario" value="<?php echo $row['id_inventario']; ?>"/>
            </p>
            <p>
                    <label>Código Único:</label> <br />
                    <input type="text" name="codigo_unico" id="codigo_unico" value="<?php echo $row['codigo_unico']; ?>"/>
            </p>
            <p>
                    <label>Id del Bien:</label> <br />
                    <!--input type="text" name="id_bienes" id="id_bienes" value="<?php echo $row['id_bienes']; ?>"/-->
                    <?php
                    $db->SelectBienes();
                    ?>
            </p>
            <p>
                    <label>Ubicación:</label> <br />
                    <input type="text" name="ubicacion" id="ubicacion" value="<?php echo $row['ubicacion']; ?>"/>
            </p>
            <p>
                    <label>Fecha de Ingreso:</label> <br />
                    <input type="date" placeholder="Ej: 1990-01-01" name="fecha_ingreso" id="fecha_ingreso" value="<?php echo $row['fecha_ingreso']; ?>"/>
            </p>
            <p>
                    <label>Id del Responsable:</label> <br />
                    <!--input type="text" name="id_responsable" id="id_responsable" value="<?php echo $row['id_responsable']; ?>"/-->
                    <?php
                    $db->SelectResponsable();
                    ?>
            </p>
            <input type="submit" value="Actualizar Inventario" id="btnActualizarInventario" name="btnActualizarInventario" />
            <p>
            </p>
    </form>
</div>
  </body>
</html>

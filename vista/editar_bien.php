<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<title>Editar Bien</title>
  </head>
  <body>
    <div class="container">

    <h1>Editar un Bien</h1>
    <form action="../controlador/control.php" method="POST">
            <p>
                    <label>Id del bien:</label> <br />
                    <input type="text" name="muestra_id_bienes" disabled placeholder="Auto-Generado" id="muestra_id_bienes" value="<?php echo $row['id_bienes']; ?>" />
                    <input type="hidden" name="id_bienes" id="id_bienes" value="<?php echo $row['id_bienes']; ?>" />
            </p>
            <p>
                    <label>Descripción:</label> <br />
                    <input type="text" name="descripcion" id="descripcion" value="<?php echo $row['descripcion']; ?>" />
            </p>
            <p>
                    <label>Tipo:</label> <br />
                    <input type="text" name="tipo" id="tipo" value="<?php echo $row['tipo']; ?>"/>
            </p>
            <p>
                    <input type="submit" value="Actualizar Bien" id="btnActualizarBien" name="btnActualizarBien" />
            </p>
    </form>
</div>
  </body>
</html>

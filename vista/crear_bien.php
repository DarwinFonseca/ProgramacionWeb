<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Crear Bien</title>
      <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  </head>
  <body>

<div class="container">
    <h1>Crear un Bien</h1>
    <form action="../controlador/control.php" method="POST">
            <p>
                    <label>Id del bien:</label> <br />
                    <input type="text" name="id_bienes" placeholder="Auto-Generado" disabled id="id_bienes"/>
            </p>
            <p>
                    <label>Descripción:</label> <br />
                    <input type="text" name="descripcion" id="descripcion" />
            </p>
            <p>
                    <label>Tipo:</label> <br />
                    <input type="text" name="tipo" id="tipo"/>
            </p>
            <p>
                    <input type="submit" value="Crear Bien" id="btnCrearBien" name="btnCrearBien" />
            </p>
    </form>
</div>
  </body>
</html>

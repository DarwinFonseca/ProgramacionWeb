<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Crear Proveedor</title>
    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
  <body>
    <div class="container">


    <h1>Crear un Proveedor</h1>
    <form action="../controlador/control.php" method="POST">
            <p>
                    <label>Id del Proveedor:</label> <br />
                    <input type="text" name="id_proveedor" placeholder="Auto-Generado" disabled id="id_bienes"/>
            </p>
            <p>
                    <label>N° de Orden:</label> <br />
                    <input type="text" name="nro_orden" id="nro_orden" />
            </p>
            <p>
                    <label>RUC:</label> <br />
                    <input type="text" name="ruc" id="ruc"/>
            </p>
            <p>
                    <label>Razón Social:</label> <br />
                    <input type="text" name="razon_social" id="razon_social"/>
            </p>
            <p>
                    <label>Fecha de Orden:</label> <br />
                    <input type="datetime-local" placeholder="Ej: 1990-01-01 00:00:00" name="fecha_orden" id="fecha_orden"/>
            </p>
            <p>
                    <label>Fecha de Entrega:</label> <br />
                    <input type="date" placeholder="Ej: 1990-01-01" name="fecha_entrega" id="fecha_entrega"/>
            </p>
            <p>
                    <label>Monto Total:</label> <br />
                    <input type="text" name="monto_total" id="monto_total"/>
            </p>
            <p>
                    <input type="submit" value="Crear Proveedor" id="btnCrearProveedor" name="btnCrearProveedor" />
            </p>
    </form>
</div>
  </body>
</html>

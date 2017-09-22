<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<meta charset="utf-8">
    <title>Actualizar Proveedor</title>
  </head>
  <body>
    <div class="container">

    <h1>Actualizar un Proveedor</h1>
    <form action="../controlador/control.php" method="POST">
            <p>
                    <label>Id del Proveedor:</label> <br />
                    <input type="text" name="mostrar_id_proveedor" placeholder="Auto-Generado" disabled id="mostrar_id_bienes"/>
                    <input type="hidden" name="id_proveedor" placeholder="Auto-Generado"  id="id_bienes" value="<?=$row['id_proveedor']?>"/>
            </p>
            <p>
                    <label>N° de Orden:</label> <br />
                    <input type="text" name="nro_orden" id="nro_orden" value="<?=$row['nro_orden']?>"/>
            </p>
            <p>
                    <label>RUC:</label> <br />
                    <input type="text" name="ruc" id="ruc" value="<?=$row['ruc']?>"/>
            </p>
            <p>
                    <label>Razón Social:</label> <br />
                    <input type="text" name="razon_social" id="razon_social" value="<?=$row['razon_social']?>"/>
            </p>
            <p>
                    <label>Fecha de Orden:</label> <br />
                    <input type="datetime" placeholder="Ej: 1990-01-01 00:00:00" name="fecha_orden" id="fecha_orden" value="<?=$row['fecha_orden']?>"/>
            </p>
            <p>
                    <label>Fecha de Entrega:</label> <br />
                    <input type="date" placeholder="Ej: 1990-01-01" name="fecha_entrega" id="fecha_entrega" value="<?=$row['fecha_entrega']?>"/>
            </p>
            <p>
                    <label>Monto Total:</label> <br />
                    <input type="text" name="monto_total" id="monto_total" value="<?=$row['monto_total']?>"/>
            </p>
            <p>
                    <input type="submit" value="Actualizar Proveedor" id="btnActualizarProveedor" name="btnActualizarProveedor" />
            </p>
    </form>
</div>
  </body>
</html>

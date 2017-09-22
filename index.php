<!DOCTYPE html>
<?php
    session_start(); // al volver al index si existe una session, esta sera destruida, existen formas de conservarlas como con un if(session_start()!= NULL). Pero por el momento para el ejemplo no es valido.
    session_destroy();  // Se destruye la session existente de esta forma no permite el duplicado.
?>

<html lang="es">
    <head>
      <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <title>Iniciar sesión</title>
</head>

    <body>

<div class="container">
            <h1>Interfaz de control por personal.</h1>
            <form action="controlador/control.php" method="POST">
              <div class="form-group">
              <p>
                      <label>Id de usuario:</label> <br />
                      <input class="form-control" type="text" placeholder="ID del Responsable" name="id_responsable" />
              </p>
              <p>
                      <label>Número de documento de Identidad:</label> <br />
                      <input type="password" class="form-control" placeholder="DNI" name="dni" />
              </p>
                    <p>
                            <input class="btn" type="submit" value="Iniciar sesión" id="btnIniciar" name="btnIniciar" />
                    </p><br>
<!--                    También puedes <a href="registro.php">registrarte</a>  -->
</div>
            </form>
          </div>
    </body>
</html>

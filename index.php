<!DOCTYPE html>
<?php
    session_start(); // al volver al index si existe una session, esta sera destruida, existen formas de conservarlas como con un if(session_start()!= NULL). Pero por el momento para el ejemplo no es valido.
    session_destroy();  // Se destruye la session existente de esta forma no permite el duplicado.
?>

<html lang="es">
    <head>
      <meta charset="utf-8">
            <title>Iniciar sesión</title>
    </head>

    <body>
            <h1>Iniciar sesión</h1>
            <form action="controlador/control.php" method="POST">
              <p>
                      <label>Correo:</label> <br />
                      <input type="text" name="correo" />
              </p>
              <p>
                      <label>Password:</label> <br />
                      <input type="password" name="password" />
              </p>
                    <p>
                            <input type="submit" value="Iniciar sesión" id="btnIniciar" name="btnIniciar" />
                    </p><br>
<!--                    También puedes <a href="registro.php">registrarte</a>  -->
            </form>
    </body>
</html>

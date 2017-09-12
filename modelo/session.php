<?php
    /* Empezamos la sesión */
    session_start();

    //require_once '../controlador/redireccionar.php' ;
    /* Creamos la sesión */
    $_SESSION['correo'] = $_POST['correo'];
    $_SESSION['password'] = $_POST['password'];

    //echo $_SESSION['correo'] . " - " . $_SESSION['password'];

    /* Si no hay una sesión creada, redireccionar al index. */
    if(empty($_SESSION['correo']) || empty($_SESSION['password'])) {
        header('Location: ../index.php');
    }else {
    header('Location: ../vista/contenido.php');
  }




?>

<!DOCTYPE html>
<html lang="es">
    <head>
            <title>Creamos y mostramos la sesión</title>
    </head>

    <body>
        <div class="c1">
            <h2>Mostramos los datos guardados</h2>
            <section>
                <p>
                    Tu nombre de usuario es <?=$_SESSION['correo'];?>
                    <br>
                    Tu contraseña es <?=$_SESSION['password'];?>
                </p>
            </section>
        </div>

        <div class="c2">
            <section>
                <p>
                  <a href="../index.php">Eliminar sesión</a> <!-- de esta forma se crea la nueva session, sin necesidad de crear otro script en php. -->
                </p>
            </section>
        </div>
    </body>
</html>

<!DOCTYPE html>
<?php
    session_start(); // al volver al index si existe una session, esta sera destruida, existen formas de conservarlas como con un if(session_start()!= NULL). Pero por el momento para el ejemplo no es valido.
    session_destroy();  // Se destruye la session existente de esta forma no permite el duplicado.
    include_once('modelo/conexion.php');
    if(!isset($_SESSION['id_cargo'])){
      header('Location: ../index.php');
    }
?>

<html lang="es">
    <head>
      <meta charset="utf-8">
            <title>Crear una sesión</title>
    </head>

    <body>
            <h1>Creación de una sesión</h1>
            <form action="controlador/control.php" method="POST">
                    <p>
                            <label>Nombre:</label> <br />
                            <input type="text" name="nombre" id="nombre"/>
                    </p>
                    <p>
                            <label>Apelido:</label> <br />
                            <input type="text" name="apellido" id="apellido" />
                    </p>
                    <p>
                            <label>Correo:</label> <br />
                            <input type="text" name="correo" id="correo"/>
                    </p>
                    <p>
                            <label>Password:</label> <br />
                            <input type="password" name="password" id="password" />
                    </p>
                    <p>
                            <label>Género:</label> <br />
                              <select name="genero" id="genero">
                                <option value="M" selected>Masculino</option>
                                <option value="F">Femenino</option>
                              </select>
                    </p>
                    <p>
                            <label>Atributos:</label> <br />
                            <select name="rol" id="rol">
                              <option value="1" selected>L</option>
                              <option value="2">L, CU</option>
                              <option value="3">L, CU, EU</option>
                              <option value="4">L, CU, EU, E</option>
                            </select>
                    </p>

                    <p>
                            <input type="submit" value="Crear sesión" id="btnRegistrar" name="btnRegistrar" />
                    </p>
            </form>
    </body>
</html>

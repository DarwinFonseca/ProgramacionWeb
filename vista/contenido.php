<!DOCTYPE html>
<?php
   session_start(); // al volver al index si existe una session, esta sera destruida, existen formas de conservarlas como con un if(session_start()!= NULL). Pero por el momento para el ejemplo no es valido.
//   session_destroy();  // Se destruye la session existente de esta forma no permite el duplicado.
if(!isset($_SESSION['id_cargo'])){
  header('Location: ../index.php');
}
?>
<html lang="es">
    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
            <title>Bienvenido</title>

    </head>

    <body>
      <div class="container">
            <h1>Bienvenido <?=$_SESSION['nombre'];?> </h1>
              <p>
                Su cargo es tipo <?=$_SESSION['id_cargo'];?>
              </p>
              <a href="../index.php">Cerrar sesión</a> <!-- de esta forma se crea la nueva session, sin necesidad de crear otro script en php. --><br><br>
<!--Crea la tabla y trae los valores de la base de datos -->
              <div class="panel-body">
                <?php
                //trae el código para editar los usuarios según el r01
                  require_once '../controlador/links.php';
                  $vinculos2 = new links();
                  $vinculos2->MostrarTablas();
                 ?>
                 <!-- /.table-responsive -->
              </div>
              <br>
<!--?php
//trae el código para editar los usuarios según el r01
  require_once '../controlador/links.php';
  $vinculos = new links();
  $vinculos->MostrarLinks();
 ?-->
 </div>
    </body>
</html>

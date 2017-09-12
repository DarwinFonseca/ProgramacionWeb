<!DOCTYPE html>
<?php
   session_start(); // al volver al index si existe una session, esta sera destruida, existen formas de conservarlas como con un if(session_start()!= NULL). Pero por el momento para el ejemplo no es valido.
//   session_destroy();  // Se destruye la session existente de esta forma no permite el duplicado.
if(!isset($_SESSION['rol'])){
  header('Location: ../index.php');
}
?>
<html lang="es">
    <head>
      <meta charset="utf-8">
            <title>Bienvenido</title>
    </head>

    <body>
            <h1>Bienvenido</h1>
              <p>
                Hola usuario de Privilegios tipo <?=$_SESSION['rol'];?>
              </p>
              <a href="../index.php">Cerrar sesión</a> <!-- de esta forma se crea la nueva session, sin necesidad de crear otro script en php. --><br><br>
<!--Crea la tabla y trae los valores de la base de datos -->
              <div class="panel-body">
                  <table width="90%" align="center" class="table table-striped table-bordered table-hover" id="dataTables-example">
                      <thead>
                          <tr>
                              <th>Id</th>
                              <th>Nombre(s)</th>
                              <th>Apellido(s)</th>
                              <th>Correo</th>
                              <th>Password</th>
                              <th>Género</th>
                              <th>Rol</th>
                          </tr>
                      </thead>
                      <tbody>
                          <?php
                          require_once '../modelo/conexion.php';
                          $db = new conexion();
                          $db->Conectar();
                          $db->ConsultarTabla();
                          ?>
                      </tbody>
                  </table>
                  <!-- /.table-responsive -->
              </div>
              <br>
<?php
//trae el código para editar los usuarios según el r01
  require_once '../controlador/links.php';
  $vinculos = new links();
  $vinculos->MostrarLinks();
 ?>
    </body>
</html>

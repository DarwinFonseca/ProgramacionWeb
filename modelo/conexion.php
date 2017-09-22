<?php

class conexion {

  private $usuario;
  private $contrasena;
  private $servidor;
  private $nomDB;
  private $link;

    function conexion() {
        $this->usuario = "root";
        $this->contrasena = "";
        $this->servidor = "localhost";
        $this->nomDB = "darwin";
        $this->link = "";
    }

    function Conectar() {
        $this->link = mysql_connect($this->servidor, $this->usuario, $this->contrasena);
        mysql_select_db($this->nomDB, $this->link) or die(mysql_error());
    }


    function EliminarUsuario($id_usuario) {
        $query = "DELETE FROM `usuarios` WHERE `usuarios`.`id` = ".$id_usuario;
        $result = mysql_query($query);
        header('Location: ../index.php');
    }

    function ActualizarUsuario($fila = array()){
      $query = "UPDATE `usuarios` SET `nombre` = '".$fila[1]."', `apellido` = '".$fila[2]."', `correo` = '".$fila[3]."', `password` = '".$fila[4]."', `genero` = '".$fila[5]."', `rol` = '".$fila[6]."' WHERE `usuarios`.`id` = ".$fila[0];
      mysql_query($query);
      header('Location: ../index.php');
    }

    function EditarUsuario($id_usuario) {
          session_destroy();
          session_start();
          $query = "SELECT * FROM `usuarios` WHERE `usuarios`.`id` = ".$id_usuario;
          $result = mysql_query($query);
          echo "El ID del usuario a editar es el ". $id_usuario . ".";

          while ($row = mysql_fetch_array($result)) {
              $_SESSION['id']     = $row['id'];
              $_SESSION['nombre'] = $row['nombre'];
              $_SESSION['apellido'] = $row['apellido'];
              $_SESSION['correo'] = $row['correo'];
              $_SESSION['password'] = $row['password'];
              $_SESSION['genero'] = $row['genero'];
              $_SESSION['rol']  = $row['rol'];
            }

/*                        echo "session";
                        echo "<br>" .            $_SESSION["id"];
                        echo "<br>" .            $_SESSION["nombre"] . "</td>";
                        echo "<br>" .            $_SESSION["apellido"] . "</td>";
                        echo "<br>" .            $_SESSION["correo"] . "</td>";
                        echo "<br>" .            $_SESSION["password"] . "</td>";
                        echo "<br>" .            $_SESSION["genero"] . "</td>";
                        echo "<br>" .            $_SESSION["rol"] . "</td></tr>";
*/
header('location: ../vista/editar.php');
    }

    function ConsultarTabla($tabla) {
        $query = "SELECT * FROM ". $tabla;
        $result = mysql_query($query);
switch ($tabla) {
  case 'inventario':
  echo <<< HTML
    <table width="90%" align="center" class="table table-striped table-bordered table-hover" id="dataTables-example"><thead><tr>
    <th>ID Inventario</th><th>Código Único</th><th>ID Bienes</th><th>Ubicación</th><th>Fecha de Ingreso</th><th>ID del Responsable</th>
    </tr></thead><tbody align="center">
HTML;
  while ($row = mysql_fetch_array($result)) {
      echo "<tr><td>" . $row["id_inventario"] . "</td><td>" . $row["codigo_unico"] . "</td><td>" . $row["id_bienes"] . "</td><td>" . $row["ubicacion"] . "</td><td>" . $row["fecha_ingreso"] . "</td><td>" . $row["id_responsable"] . "</td></tr>";
  }
    echo "</tbody></table>";
    break;

  case 'proveedor':
  echo <<< HTML
  <table width="90%" align="center" class="table table-striped table-bordered table-hover" id="dataTables-example"><thead><tr>
  <th>ID Proveedor</th><th>N° de Orden</th><th>RUC</th><th>Razón Social</th><th>Fecha de la Orden</th><th>Fecha de Entrega</th><th>Monto Total</th>
  </tr></thead><tbody align="center">
HTML;
  while ($row = mysql_fetch_array($result)) {
      echo "<tr><td>" . $row["id_proveedor"] . "</td><td>" . $row["nro_orden"] . "</td><td>" . $row["ruc"] . "</td><td>" . $row["razon_social"] . "</td><td>" . $row["fecha_orden"] . "</td><td>" . $row["fecha_entrega"] . "</td><td>" . $row["monto_total"] . "</td></tr>";
  }
    echo "</tbody></table>";
    break;

    case 'bienes':
      echo <<< HTML
      <table width="90%" align="center" class="table table-striped table-bordered table-hover" id="dataTables-example"><thead><tr>
      <th>ID del Bienes</th><th>Descripción</th><th>Tipo de Bien</th>
      </tr></thead><tbody align="center">
HTML;
      while ($row = mysql_fetch_array($result)) {
        echo "<tr><td>" . $row["id_bienes"] . "</td><td>" . $row["descripcion"] . "</td><td>" . $row["tipo"] . "</td></tr>";
      }
        echo "</tbody></table>";
      break;

    case 'bienes':
      echo <<< HTML
      <table width="90%" align="center" class="table table-striped table-bordered table-hover" id="dataTables-example"><thead><tr>
      <th>ID de los Bienes</th><th>Descripción</th><th>Tipo de Bien</th>
      </tr></thead><tbody align="center">
HTML;
      while ($row = mysql_fetch_array($result)) {
          echo "<tr><td>" . $row["id_bienes"] . "</td><td>" . $row["descripcion"] . "</td><td>" . $row["tipo"] . "</td></tr>";
      }
      echo "</tbody></table>";
      break;
    default:
      header('Location: ../index.php');
      break;
}
    }

    public function LogIn($validado, $id_responsable, $dni) {

      if ($validado=='1') {
        //echo "<br>entro al Script LOGIN<br>";
        $consulta_mysql = 'SELECT * FROM responsable WHERE id_responsable LIKE  "' .$id_responsable. '" AND dni LIKE "' .$dni. '"';
        //echo $consulta_mysql;
        $resultado_consulta_mysql = mysql_query($consulta_mysql);
        while ($row = mysql_fetch_array($resultado_consulta_mysql)) {
            $_SESSION['id_responsable']     = $row['id_responsable'];
            $_SESSION['dni'] = $row['dni'];
            $_SESSION['nombre'] = $row['nombre'];
            $_SESSION['id_cargo'] = $row['id_cargo'];
          }
/*
            echo "<br>" .            $_SESSION["id_responsable"];
            echo "<br>" .            $_SESSION["dni"] ;
            echo "<br>" .            $_SESSION["nombre"];
            echo "<br>" .            $_SESSION["id_cargo"];
*/
            //session_start();
            header ('Location: ../vista/contenido.php');
      }else {
        header('Location: ../index.php');
      }
    }

    function ValidarLogin($id_responsable, $dni){
      $validado=0;
      //echo "entro al Script VALIDAR <br>";
      $consulta_mysql = 'SELECT * FROM responsable WHERE id_responsable LIKE  "' .$id_responsable. '" AND dni LIKE "' .$dni. '"';
      //echo $consulta_mysql;
      $resultado_consulta_mysql = mysql_query($consulta_mysql);
      $row = mysql_fetch_array($resultado_consulta_mysql);
          if (empty($row)) {
//                echo "<br>¡ No se encontraron resultados !";
          }else {
//            echo "<br>¡ Se encontraron resultados !";
            $validado=1;
          }
          $this->LogIn($validado, $id_responsable, $dni);
    }

    function InsertarBienes($fila = array()) {
        $ValoresFila = "";
        while (list($key, $val) = each($fila)) {
            $ValoresFila = $ValoresFila . "'" . $val . "', ";
        }
        $ValoresFila = substr($ValoresFila, 0, -2);
        //echo "insert into usuarios values (" . $ValoresFila . "); <br>";
        mysql_query("insert into bienes values (" . $ValoresFila . ");")or die('<br>La consulta fallo<br><br> ' . mysql_error());
        //mysqli_query($this->link, "insert into " . $tabla . " values (" . $ValoresFila . ");")or die('La consulta falló ' . mysqli_error($this->link));
        echo "Registro exitoso...!!!";
    }

    function EditarBien($id_bienes) {
          $query = "SELECT * FROM `bienes` WHERE `id_bienes` = ".$id_bienes;
          //echo " ".$query;
          $result = mysql_query($query);
          echo "<br>El ID del bien a editar es el ". $id_bienes . ".";
          $row = mysql_fetch_array($result);
          //          echo "<br>".$row['id_bienes']."<br>".$row['descripcion']."<br>".$row['tipo'];
          require '../vista/editar_bien.php';
    }

    function ActualizarBien($fila = array()){
      $query = "UPDATE `bienes` SET `descripcion` = '".$fila[1]."', `tipo` = '".$fila[2]."' WHERE `id_bienes` = ".$fila[0];
      mysql_query($query);
      header('Location: ../vista/contenido.php');
    }

    function EliminarBien($id_bienes) {
        $query = "DELETE FROM `bienes` WHERE `id_bienes` = ".$id_bienes;
        $result = mysql_query($query);
        header('Location: ../vista/contenido.php');
    }

//OPCIONES PARA TABLA PROVEEDORES
    function InsertarProveedor($fila = array()) {
        $ValoresFila = "";
        while (list($key, $val) = each($fila)) {
            $ValoresFila = $ValoresFila . "'" . $val . "', ";
        }
        $ValoresFila = substr($ValoresFila, 0, -2);
        //echo "insert into usuarios values (" . $ValoresFila . "); <br>";
        mysql_query("insert into proveedor values (" . $ValoresFila . ");")or die('<br>La consulta fallo<br><br> ' . mysql_error());
        //mysqli_query($this->link, "insert into " . $tabla . " values (" . $ValoresFila . ");")or die('La consulta falló ' . mysqli_error($this->link));
        echo "Registro exitoso...!!!";
    }

    function EditarProveedor($id_proveedor) {
          $query = "SELECT * FROM `proveedor` WHERE `id_proveedor` = ".$id_proveedor;
          //echo " ".$query;
          $result = mysql_query($query);
          echo "<br>El ID del proveedor a editar es el ". $id_proveedor . ".";
          $row = mysql_fetch_array($result);
          //          echo "<br>".$row['id_proveedor']."<br>".$row['descripcion']."<br>".$row['tipo'];
          require '../vista/editar_proveedor.php';
    }

    function ActualizarProveedor($fila = array()){
      $query = "UPDATE `proveedor` SET `nro_orden` = '".$fila[1]."',`ruc` = '".$fila[2]."',`razon_social` = '".$fila[3]."',`fecha_orden` = '".$fila[4]."',`monto_total` = '".$fila[5]."', `fecha_entrega` = '".$fila[6]."' WHERE `id_proveedor` = ".$fila[0];
      mysql_query($query);
      header('Location: ../vista/contenido.php');
    }

    function EliminarProveedor($id_proveedor) {
        $query = "DELETE FROM `proveedor` WHERE `id_proveedor` = ".$id_proveedor;
        $result = mysql_query($query);
        header('Location: ../vista/contenido.php');
    }

    //OPCIONES PARA TABLA INVENTARIO
        function InsertarInventario($fila = array()) {
            $ValoresFila = "";
            while (list($key, $val) = each($fila)) {
                $ValoresFila = $ValoresFila . "'" . $val . "', ";
            }
            $ValoresFila = substr($ValoresFila, 0, -2);
            //echo "insert into usuarios values (" . $ValoresFila . "); <br>";
            mysql_query("insert into inventario values (" . $ValoresFila . ");")or die('<br>La consulta fallo<br><br> ' . mysql_error());
            //mysqli_query($this->link, "insert into " . $tabla . " values (" . $ValoresFila . ");")or die('La consulta falló ' . mysqli_error($this->link));
            echo "Registro exitoso...!!!";
        }

        function EditarInventario($id_inventario) {
              $query = "SELECT * FROM `inventario` WHERE `id_inventario` = ".$id_inventario;
              //echo " ".$query;
              $result = mysql_query($query);
              echo "<br>El ID del inventario a editar es el ". $id_inventario . ".";
              $row = mysql_fetch_array($result);
              //          echo "<br>".$row['id_inventario']."<br>".$row['descripcion']."<br>".$row['tipo'];
              require '../vista/editar_inventario.php';
        }

        function ActualizarInventario($fila = array()){
          //$query = "UPDATE `inventario` SET `nro_orden` = '".$fila[1]."',`ruc` = '".$fila[2]."',`razon_social` = '".$fila[3]."',`fecha_orden` = '".$fila[4]."',`monto_total` = '".$fila[5]."', `fecha_entrega` = '".$fila[6]."' WHERE `id_inventario` = ".$fila[0];
          $query = "UPDATE `inventario` SET `codigo_unico` = '".$fila[1]."',`id_bienes` = '".$fila[2]."',`ubicacion` = '".$fila[3]."',`fecha_ingreso` = '".$fila[4]."',`id_responsable` = '".$fila[5]."' WHERE `id_inventario` = ".$fila[0];
          //echo "sd: ". $query;
          mysql_query($query);
          header  ('Location: ../vista/contenido.php');
        }

        function EliminarInventario($id_inventario) {
            $query = "DELETE FROM `inventario` WHERE `id_inventario` = ".$id_inventario;
            $result = mysql_query($query);
            header('Location: ../vista/contenido.php');
        }
        function SelectInventario() {
            // Consultar la base de datos
            $consulta_mysql = 'select * from inventario';
            $resultado_consulta_mysql = mysql_query($consulta_mysql);

            echo "<select name='id_inventario'>";
            while ($fila = mysql_fetch_array($resultado_consulta_mysql)) {
                echo "<option value='" . $fila['id_inventario'] . "'>" . $fila['id_inventario'] . "</option>";
            }
            echo "</select>";
        }

        function SelectBienes() {
            // Consultar la base de datos
            $consulta_mysql = 'select * from bienes';
            $resultado_consulta_mysql = mysql_query($consulta_mysql);

            echo "<select name='id_bienes'>";
            while ($fila = mysql_fetch_array($resultado_consulta_mysql)) {
                echo "<option value='" . $fila['id_bienes'] . "'>" . $fila['id_bienes'] . "</option>";
            }
            echo "</select>";
        }

        function SelectResponsable() {
            // Consultar la base de datos
            $consulta_mysql = 'select * from responsable';
            $resultado_consulta_mysql = mysql_query($consulta_mysql);

            echo "<select name='id_responsable'>";
            while ($fila = mysql_fetch_array($resultado_consulta_mysql)) {
                echo "<option value='" . $fila['id_responsable'] . "'>" . $fila['id_responsable'] . "</option>";
            }
            echo "</select>";
        }


}
?>

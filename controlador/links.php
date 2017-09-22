<?php

class links{

  private $CrearBien;
  private $CrearProveedor;
  private $CrearInventario;
  private $EditarBien;
  private $EditarProveedor;
  private $EditarInventario;
  private $EliminarBien;
  private $EliminarProveedor;
  private $EliminarInventario;
  private $LabelBien;
  private $LabelProveedor;
  private $LabelInventario;

function links(){

  $this->CrearBien="<a href='../vista/crear_bien.php'>Crear Bien</a>";
  $this->CrearProveedor="<a href='../vista/crear_proveedor.php'>Crear Proveedor</a>";
  $this->CrearInventario="<a href='../vista/Crear_inventario.php'>Agregar al Inventario</a>";
  $this->LabelBien="<label>Id del Bien:</label><input type='text' name='id_bienes' />";
  $this->LabelProveedor="<label>Id del Proveedor:</label><input type='text' name='id_proveedor' />";
  $this->LabelInventario="<label>Id del Inventario:</label><input type='text' name='id_inventario' />";
  $this->EditarBien="<input type='submit' value='Editar Bien' id='btnEditarBien' name='btnEditarBien' />";
  $this->EditarProveedor="<input type='submit' value='Editar Proveedor' id='btnEditarProveedor' name='btnEditarProveedor' />";
  $this->EditarInventario="<input type='submit' value='Editar Inventario' id='btnEditarInventario' name='btnEditarInventario' />";
  $this->EliminarBien="<input type='submit' value='Eliminar Bien' id='btnEliminarBien' name='btnEliminarBien' />";
  $this->EliminarProveedor="<input type='submit' value='Eliminar Proveedor' id='btnEliminarProveedor' name='btnEliminarProveedor' />";
  $this->EliminarInventario="<input type='submit' value='Eliminar Inventario' id='btnEliminarInventarior' name='btnEliminarInventario' />";

}

function MostrarLinks($tabla){

echo "<form action='../controlador/control.php' method='POST'><p>";

        if (isset($_SESSION['id_cargo'])) {
          switch ($_SESSION['id_cargo']) {
            case '1':
              echo "Sólo puede ver los datos del inventario.";
              break;
              //caso 2 Lectura, Creacion: Proveedores,  bienes.
            case '2':
                        switch ($tabla) {
                          case 'bienes':
                            # code...
                            echo $this->CrearBien;
                            break;
                          case 'proveedor':
                              # code...
                              echo $this->CrearProveedor;
                            break;
                          }
              break;
              //Lectura, Creacion, Modificacion: inventario, Proveedor, Bienes
            case '3':
                        switch ($tabla) {
                          case 'bienes':
                            # code...
                            echo $this->CrearBien ." ". $this->LabelBien ." ". $this->EditarBien;
                            break;
                          case 'inventario':
                            # code...
                            echo $this->CrearInventario ." ". $this->LabelInventario ." ". $this->EditarInventario;
                            break;
                          case 'proveedor':
                              # code...
                            echo $this->CrearProveedor ." ". $this->LabelProveedor ." ". $this->EditarProveedor;
                              break;
                          }
              break;
              //Lectura, Creacion, Modificacion, Eliminacion: Sobre todos los elementos de la BD's
            case '4':
                        switch ($tabla) {
                          case 'bienes':
                            # code...
                            echo $this->CrearBien ." ". $this->LabelBien ." ". $this->EditarBien ." ". $this->EliminarBien;
                            break;
                          case 'inventario':
                            # code...
                            echo $this->CrearInventario ." ". $this->LabelInventario ." ". $this->EditarInventario." ". $this->EliminarInventario;
                            break;
                          case 'proveedor':
                              # code...
                            echo $this->CrearProveedor ." ". $this->LabelProveedor ." ". $this->EditarProveedor." ". $this->EliminarProveedor;
                              break;
                          }
              break;
          }
        }
echo "</p><br></form>";


  }

function MostrarTablas(){

  require_once '../modelo/conexion.php';
  $db = new conexion();
  $db->Conectar();

  echo "<form action='../controlador/control.php' method='POST'><p>";

  if (isset($_SESSION['id_cargo'])) {
    switch ($_SESSION['id_cargo']) {
      case '1':
        # code...
        echo "<br><br><h2><p align='center'>Tabla de Inventario</p></h2>";
        $db->ConsultarTabla("inventario");
        $this->MostrarLinks("inventario");
        break;
      case '2':
          # code...
          echo "<br><br><h2><p align='center'>Tabla de Proveedores</p></h2>";
          $db->ConsultarTabla("proveedor");
          $this->MostrarLinks("proveedor");
          echo "<br><br><h2><p align='center'>Tabla de Bienes</p></h2>";
          $db->ConsultarTabla("bienes");
          $this->MostrarLinks("bienes");
        break;
      case '3':
            # code...
            echo "<br><br><h2><p align='center'>Tabla del Inventario</p></h2>";
            $db->ConsultarTabla("inventario");
            $this->MostrarLinks("inventario");
            echo "<br><br><h2><p align='center'>Tabla de Proveedores</p></h2>";
            $db->ConsultarTabla("proveedor");
            $this->MostrarLinks("proveedor");
            echo "<br><br><h2><p align='center'>Tabla de Bienes</p></h2>";
            $db->ConsultarTabla("bienes");
            $this->MostrarLinks("bienes");
        break;
      case '4':
            echo "<br><br><h2><p align='center'>Tabla del Inventario</p></h2>";
            $db->ConsultarTabla("inventario");
            $this->MostrarLinks("inventario");
            echo "<br><br><h2><p align='center'>Tabla de Proveedores</p></h2>";
            $db->ConsultarTabla("proveedor");
            $this->MostrarLinks("proveedor");
            echo "<br><br><h2><p align='center'>Tabla de Bienes</p></h2>";
            $db->ConsultarTabla("bienes");
            $this->MostrarLinks("bienes");
        break;
      }
  }
  echo "</p><br></form>";

    }

}


?>

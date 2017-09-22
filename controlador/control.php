<?php
session_start();
//Si se crea una sesion...
if (isset($_POST['btnRegistrar'])) {
    require '../modelo/conexion.php';
    $db = new conexion();
    $db->Conectar();
    $db->Insertar(array(null, $_POST['nombre'], $_POST['apellido'], $_POST['correo'],$_POST['password'], $_POST['genero'], $_POST['rol']),"usuarios");
    header('Location: ../index.php');
}

//Si se inicia una sesion...
if (isset($_POST['btnIniciar'])) {
    require '../modelo/conexion.php';
    $db = new conexion();
    $db->Conectar();
    $db->ValidarLogin($_POST['id_responsable'], $_POST['dni']);
//    header('Location: ../vista/contenido.php');
}

//Eliminar sesion
if (isset($_POST['btnEliminar'])) {
  if ($_POST['id_usuario']=="") {
    header('Location: ../vista/contenido.php');
  }else{
    require '../modelo/conexion.php';
    $db = new conexion();
    $db->Conectar();
    $db->EliminarUsuario($_POST['id_usuario']);
//    header('Location: ../vista/contenido.php');
  }
}

//Editar sesion
if (isset($_POST['btnEditar'])) {
  if ($_POST['id_usuario']=="") {
    header('Location: ../vista/contenido.php');
  }else{
    require '../modelo/conexion.php';
    $db = new conexion();
    $db->Conectar();
    $db->EditarUsuario($_POST['id_usuario']);
    //header('Location: ../vista/editar.php');
  }
}
//Actualizar sesion
if (isset($_POST['btnActualizar'])) {
    require '../modelo/conexion.php';
    $db = new conexion();
    $db->Conectar();
    $db->ActualizarUsuario(array($_SESSION['id'], $_POST['nombre'], $_POST['apellido'], $_POST['correo'],$_POST['password'], $_POST['genero'], $_POST['rol']));
    //header('Location: ../vista/editar.php');
}

if (isset($_POST['btnCrearBien'])) {
    require '../modelo/conexion.php';

    $db = new conexion();
    $db->Conectar();
    $db->InsertarBienes(array(null, $_POST['descripcion'], $_POST['tipo']));

    header('Location: ../vista/contenido.php');
}
//Editar Bienes
if (isset($_POST['btnEditarBien'])) {
  if ($_POST['id_bienes']=="") {
    header('Location: ../vista/contenido.php');
  }else{
    require '../modelo/conexion.php';
    $db = new conexion();
    $db->Conectar();
    $db->EditarBien($_POST['id_bienes']);
    //header('Location: ../vista/editar.php');
  }
}

  //Actualizar Bienes
  if (isset($_POST['btnActualizarBien'])) {
    if ($_POST['id_bienes']=="") {
      header ('Location: ../vista/contenido.php');
    }else{
      require '../modelo/conexion.php';
      $db = new conexion();
      $db->Conectar();
      $db->ActualizarBien(array($_POST['id_bienes'], $_POST['descripcion'], $_POST['tipo']));
      //header('Location: ../vista/editar.php');
    }
}

//Eliminar Bien
if (isset($_POST['btnEliminarBien'])) {
  if ($_POST['id_bienes']=="") {
    header('Location: ../vista/contenido.php');
  }else{
    require '../modelo/conexion.php';
    $db = new conexion();
    $db->Conectar();
    $db->EliminarBien($_POST['id_bienes']);
//    header('Location: ../vista/contenido.php');
  }
}


if (isset($_POST['btnCrearInventario'])) {
    require '../modelo/conexion.php';

    $db = new conexion();
    $db->Conectar();
    $db->InsertarInventario(array(null, $_POST['codigo_unico'],$_POST['id_bienes'],$_POST['ubicacion'],$_POST['fecha_ingreso'], $_POST['id_responsable']));
    header('Location: ../vista/contenido.php');
}
//Editar Inventario
if (isset($_POST['btnEditarInventario'])) {
  if ($_POST['id_inventario']=="") {
    header('Location: ../vista/contenido.php');
  }else{
    require '../modelo/conexion.php';
    $db = new conexion();
    $db->Conectar();
    $db->EditarInventario($_POST['id_inventario']);
    //header('Location: ../vista/editar.php');
  }
}

  //Actualizar Inventario
  if (isset($_POST['btnActualizarInventario'])) {
    if ($_POST['id_inventario']=="") {
      header ('Location: ../vista/contenido.php');
    }else{
      require '../modelo/conexion.php';
      $db = new conexion();
      $db->Conectar();
      $db->ActualizarInventario(array($_POST['id_inventario'], $_POST['codigo_unico'], $_POST['id_bienes'], $_POST['ubicacion'], $_POST['fecha_ingreso'], $_POST['id_responsable']));
      //header('Location: ../vista/editar.php');
    }
}

//Eliminar Bien
if (isset($_POST['btnEliminarInventario'])) {
  if ($_POST['id_inventario']=="") {
    header('Location: ../vista/contenido.php');
  }else{
    require '../modelo/conexion.php';
    $db = new conexion();
    $db->Conectar();
    $db->EliminarInventario($_POST['id_inventario']);
//    header('Location: ../vista/contenido.php');
  }
}

//Crear Proveedor
if (isset($_POST['btnCrearProveedor'])) {
    require '../modelo/conexion.php';

    $db = new conexion();
    $db->Conectar();
    $db->InsertarProveedor(array(null, $_POST['nro_orden'],$_POST['ruc'],$_POST['razon_social'],$_POST['fecha_orden'], $_POST['monto_total'],$_POST['fecha_entrega']));
    header('Location: ../vista/contenido.php');
}
//Editar Proveedor
if (isset($_POST['btnEditarProveedor'])) {
  if ($_POST['id_proveedor']=="") {
    header('Location: ../vista/contenido.php');
  }else{
    require '../modelo/conexion.php';
    $db = new conexion();
    $db->Conectar();
    $db->EditarProveedor($_POST['id_proveedor']);
    //header('Location: ../vista/editar.php');
  }
}

  //Actualizar Proveedor
  if (isset($_POST['btnActualizarProveedor'])) {
    if ($_POST['id_proveedor']=="") {
      header ('Location: ../vista/contenido.php');
    }else{
      require '../modelo/conexion.php';
      $db = new conexion();
      $db->Conectar();
      $db->ActualizarProveedor(array($_POST['id_proveedor'], $_POST['nro_orden'],$_POST['ruc'],$_POST['razon_social'],$_POST['fecha_orden'], $_POST['monto_total'],$_POST['fecha_entrega']));
      //header('Location: ../vista/editar.php');
    }
}

//Eliminar Bien
if (isset($_POST['btnEliminarProveedor'])) {
  if ($_POST['id_proveedor']=="") {
    header('Location: ../vista/contenido.php');
  }else{
    require '../modelo/conexion.php';
    $db = new conexion();
    $db->Conectar();
    $db->EliminarProveedor($_POST['id_proveedor']);
//    header('Location: ../vista/contenido.php');
  }
}
?>

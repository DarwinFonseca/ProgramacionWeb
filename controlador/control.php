<?php
session_start();
//Si se crea una sesion...
if (isset($_POST['btnRegistrar'])) {
    require '../modelo/conexion.php';

    $db = new conexion();
    $db->Conectar();
    $db->Insertar(array(null, $_POST['nombre'], $_POST['apellido'], $_POST['correo'],$_POST['password'], $_POST['genero'], $_POST['rol']));

    header('Location: ../index.php');
}

//Si se inicia una sesion...
if (isset($_POST['btnIniciar'])) {
    require '../modelo/conexion.php';
    $db = new conexion();
    $db->Conectar();
    $db->ValidarLogin($_POST['correo'], $_POST['password']);
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
//Editar sesion
if (isset($_POST['btnActualizar'])) {
    require '../modelo/conexion.php';
    $db = new conexion();
    $db->Conectar();
    $db->ActualizarUsuario(array($_SESSION['id'], $_POST['nombre'], $_POST['apellido'], $_POST['correo'],$_POST['password'], $_POST['genero'], $_POST['rol']));
    //header('Location: ../vista/editar.php');
}

?>

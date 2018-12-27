<?php
require_once 'includes/redireccion.php';

if (isset($_POST)) {
  require_once 'includes/conexion.php';

  $titulo = isset($_POST['titulo']) ? trim(mysqli_real_escape_string($db, $_POST['titulo'])) : false;
  $descripcion = isset($_POST['descripcion']) ? trim(mysqli_real_escape_string($db, $_POST['descripcion'])) : false;
  $categoria = isset($_POST['categoria']) ? trim(mysqli_real_escape_string($db, $_POST['categoria'])) : false;
  $usuario_id = $_SESSION['usuario']['ID'];
  
  // Array de errores
  $errores = array();
  
  if (!empty($titulo) && !is_numeric($titulo)) {
    $titulo_validado = true;
  } else {
    $titulo_validado = false;
    $errores['titulo'] = "El titulo no es valido";
  }
  
  if (!empty($descripcion) && !is_numeric($descripcion)) {
    $descripcion_validado = true;
  } else {
    $descripcion_validado = false;
    $errores['descripcion'] = "El descripcion no es valido";
  }
  
  if (!empty($categoria)) {
    $categoria_validado = true;
  } else {
    $categoria_validado = false;
    $errores['categoria'] = "El categoria no es valido";
  }
  
  if (count($errores) == 0 && $titulo_validado && $descripcion_validado && $categoria_validado) {
    if (isset($_GET['editar'])) {
      $entrada_id = $_GET['editar'];
      $sql = "UPDATE entradas SET titulo = '$titulo', descripcion = '$descripcion', categoria_id = '$categoria' WHERE id = '$entrada_id' AND usuario_id = '$usuario_id';";
    } else {
      $sql = "INSERT INTO entradas VALUES(NULL, '$usuario_id', '$categoria', '$titulo', '$descripcion', CURDATE());";
    }
    
    $guardar = mysqli_query($db, $sql);
    header("Location: index.php");
  } else {
    $_SESSION['errores_entradas'] = $errores;
    if (isset($_GET['editar'])) {
      header("Location: editar-entrada.php?editar=".$_GET['editar']);
    } else {
      header("Location: crear-entrada.php");
    }
  }
}

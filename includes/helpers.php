<?php

function mostrarError($errores, $campo) {
  $alerta = '';
  if (isset($errores[$campo]) && !empty($campo)) {
    $alerta = "<div class='alerta alerta-error'>".$errores[$campo]."</div>";
  }

  return $alerta;
}

function borrarErrores() {
  if (isset($_SESSION['errores'])) {
    $_SESSION['errores'] = null;
  }
  
  if (isset($_SESSION['completado'])) {
    $_SESSION['completado'] = null;
  }

  if (isset($_SESSION['errores_entradas'])) {
    $_SESSION['errores_entradas'] = null;
  }

  // $borrado = session_unset();

  return "listo";
}

function conseguirCategorias($db) {
  $sql = "SELECT * FROM categorias ORDER BY id ASC;";
  $categorias = mysqli_query($db, $sql);
  $result = array();

  if ($categorias && mysqli_num_rows($categorias) >= 1) {
    $result = $categorias;
  }

  return $result;
}

function conseguirCategoria($db, $id) {
  $sql = "SELECT * FROM categorias WHERE id = $id;";
  $categorias = mysqli_query($db, $sql);
  $result = array();

  if ($categorias && mysqli_num_rows($categorias) >= 1) {
    $result = mysqli_fetch_assoc($categorias);
  }

  return $result;
}

function conseguirEntradas($db, $limit = null, $categoria = null, $busqueda = null) {
  $sql = "SELECT e.*, c.nombre as 'categoria' FROM entradas e INNER JOIN categorias c ON e.categoria_id = c.id ORDER BY e.ID DESC;";
  
  if ($limit != null) {
    $sql = "SELECT e.*, c.nombre as 'categoria' FROM entradas e INNER JOIN categorias c ON e.categoria_id = c.id ORDER BY e.ID DESC LIMIT 4;";
  }

  if (!empty($categoria)) {
    $sql = "SELECT e.*, c.nombre as 'categoria' FROM entradas e INNER JOIN categorias c ON e.categoria_id = c.id WHERE e.categoria_id = $categoria ORDER BY e.ID DESC;";
  }

  if ($busqueda != null) {
    $sql = "SELECT e.*, c.nombre as 'categoria' FROM entradas e INNER JOIN categorias c ON e.categoria_id = c.id WHERE e.titulo LIKE '%$busqueda%' ORDER BY e.ID DESC;";
  }
  
  $entradas = mysqli_query($db, $sql);
  $result = array();

  if ($entradas && mysqli_num_rows($entradas) >= 1) {
    $result = $entradas;
  }

  return $result;
}

function conseguirEntrada($db, $id) {
  $sql = "SELECT e.*, c.nombre AS 'categoria', CONCAT(u.nombre, ' ', u.apellido) as 'usuario' FROM entradas e INNER JOIN categorias c ON e.categoria_id = c.id INNER JOIN usuarios u ON e.usuario_id = u.id WHERE e.id = '$id';";
  $entrada = mysqli_query($db, $sql);
  $result = array();

  if ($entrada && mysqli_num_rows($entrada) >= 1) {
    $result = mysqli_fetch_assoc($entrada);
  }

  return $result;
}


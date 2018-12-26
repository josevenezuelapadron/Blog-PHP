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

function conseguirUltimasEntradas($db) {
  $sql = "SELECT e.*, c.nombre as 'categoria' FROM entradas e INNER JOIN categorias c ON e.categoria_id = c.id ORDER BY e.ID DESC LIMIT 4;";
  $entradas = mysqli_query($db, $sql);
  $result = array();

  if ($entradas && mysqli_num_rows($entradas) >= 1) {
    $result = $entradas;
  }

  return $result;
}

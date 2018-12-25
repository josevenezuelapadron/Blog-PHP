<?php
  require_once 'includes/cabecera.php';
  require_once 'includes/lateral.php'; 
  require_once 'includes/redireccion.php';
?>

<div id="principal">
  <h1>Crear categoria</h1>
  <p>Añade nuevas categorias para que los usuarios puedan usarlas para crear sus entradas</p>
  <br>

  <form action="guardar-categoria.php" method="POST">
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre">

    <input type="submit" value="Crear categoria">
  </form>
</div>

<?php require_once 'includes/pie.php'; ?>
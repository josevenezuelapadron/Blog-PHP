<?php
  require_once 'includes/cabecera.php';
  require_once 'includes/lateral.php';

  $entrada = conseguirEntrada($db, $_GET['id']);

  if (!isset($entrada['ID'])) {
    header("Location: index.php");
  }
?>

<!-- Caja principal -->
<div id="principal">
  <h1><?php echo $entrada['TITULO']; ?></h1>
  <a href="categoria.php?id=<?php echo $entrada['CATEGORIA_ID']; ?>">
    <h2><?php echo $entrada['categoria']; ?></h2>
  </a>
  <h4><?php echo $entrada['FECHA']; ?></h4>

  <p><?php echo $entrada['DESCRIPCION']; ?></p>
</div>

<?php require_once 'includes/pie.php'; ?>
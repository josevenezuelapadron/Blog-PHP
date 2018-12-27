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
  <h1><?= $entrada['TITULO']; ?></h1>
  <a href="categoria.php?id=<?= $entrada['CATEGORIA_ID']; ?>">
    <h2><?= $entrada['categoria']; ?></h2>
  </a>
  <h4><?= $entrada['FECHA']; ?> | <?= $entrada['usuario']; ?></h4>

  <p><?= $entrada['DESCRIPCION']; ?></p>

  <br>

  <?php if(isset($_SESSION['usuario']) && $_SESSION['usuario']['ID'] == $entrada['USUARIO_ID']): ?>
    <a href="editar-entrada.php?id=<?= $entrada['ID']; ?>" class="boton boton-verde">Editar entrada</a>
    <a href="borrar-entrada.php?id=<?= $entrada['ID']; ?>" class="boton boton-rojo">Borrar entrada</a>
  <?php endif; ?>
</div>

<?php require_once 'includes/pie.php'; ?>
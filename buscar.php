<?php
  if (!isset($_POST['busqueda'])) {
    header("Location: index.php");
  }

  require_once 'includes/cabecera.php';
  require_once 'includes/lateral.php';
?>

<!-- Caja principal -->
<div id="principal">
  <h1>Busqueda: <?= $_POST['busqueda']; ?></h1>

  <?php
    $entradas = conseguirEntradas($db, null, null, $_POST['busqueda']);
    if(!empty($entradas)):
      while($entrada = mysqli_fetch_assoc($entradas)):
  ?>
        <article class="entrada">
          <a href="entrada.php?id=<?php echo $entrada['ID']; ?>">
            <h2><?php echo $entrada['TITULO']; ?></h2>
            <span class="fecha"><?php echo $entrada['categoria']." | ".$entrada['FECHA']; ?></span>
            <p><?php echo substr($entrada['DESCRIPCION'], 0, 180)."..."; ?></p>
          </a>
        </article>
  <?php  
      endwhile;
    else:
  ?>
    <br>
    <div class="alerta alerta-error">No hay entradas en esta categoria</div>
    <?php endif; ?>
</div>

<?php require_once 'includes/pie.php'; ?>
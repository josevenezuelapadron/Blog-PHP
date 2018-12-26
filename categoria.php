<?php
  require_once 'includes/cabecera.php';
  require_once 'includes/lateral.php';

  $categoria = conseguirCategoria($db, $_GET['id']);

  if (!isset($categoria['ID'])) {
    header("Location: index.php");
  }
?>

<!-- Caja principal -->
<div id="principal">
  <h1>Categoria: <?php echo $categoria['NOMBRE']; ?></h1>

  <?php
    $entradas = conseguirEntradas($db, null, $_GET['id']);
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
<?php
  require_once 'includes/cabecera.php';
  require_once 'includes/lateral.php';
?>

<!-- Caja principal -->
<div id="principal">
  <h1>Ultimas entradas</h1>

  <?php
    $entradas = conseguirUltimasEntradas($db);
    if(!empty($entradas)):
      while($entrada = mysqli_fetch_assoc($entradas)):
  ?>
        <article class="entrada">
          <a href="">
            <h2><?php echo $entrada['TITULO']; ?></h2>
            <span class="fecha"><?php echo $entrada['categoria']." | ".$entrada['FECHA']; ?></span>
            <p><?php echo substr($entrada['DESCRIPCION'], 0, 180)."..."; ?></p>
          </a>
        </article>
  <?php  
      endwhile;
    endif;
  ?>

  <div id="ver-todas">
    <a href="">Ver todas las entradas</a>
  </div>
</div>

<?php require_once 'includes/pie.php'; ?>
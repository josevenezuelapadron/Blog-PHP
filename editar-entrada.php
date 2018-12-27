<?php
  require_once 'includes/cabecera.php';
  require_once 'includes/lateral.php';
  require_once 'includes/redireccion.php';

  $entrada = conseguirEntrada($db, $_GET['id']);

  if (!isset($entrada['ID'])) {
    header("Location: index.php");
  }
?>

<!-- Caja principal -->
<div id="principal">
  <h1>Editar entrada</h1>
  <p>Edita tu entrada: <b><?= $entrada['TITULO']; ?></b></p>
  <br>

  <form action="guardar-entrada.php?editar=<?= $entrada['ID']; ?>" method="POST">
    <label for="titulo">Título:</label>
    <input required type="text" name="titulo" value="<?= $entrada['TITULO']; ?>">
    <?php echo isset($_SESSION['errores_entradas']) ? mostrarError($_SESSION['errores_entradas'], 'titulo') : ''; ?>

    <label for="descripcion">Descripción:</label>
    <input required type="text" name="descripcion" value="<?= $entrada['DESCRIPCION']; ?>">
    <?php echo isset($_SESSION['errores_entradas']) ? mostrarError($_SESSION['errores_entradas'], 'descripcion') : ''; ?>

    <label for="categoria">Categoria:</label>
    <select required name="categoria">
      <?php
        $categorias = conseguirCategorias($db);
        if(!empty($categorias)):
          while($categoria = mysqli_fetch_assoc($categorias)):
      ?>
            <option value="<?php echo $categoria['ID']; ?>"  <?= ($categoria['ID'] == $entrada['CATEGORIA_ID']) ? 'selected="selected"' : ''; ?>><?php echo $categoria['NOMBRE']; ?></option>
      <?php
          endwhile;
        endif;
      ?>
    </select>
    <?php echo isset($_SESSION['errores_entradas']) ? mostrarError($_SESSION['errores_entradas'], 'categoria') : ''; ?>

    <input type="submit" value="Editar entrada">
  </form>
  <?php borrarErrores(); ?>
</div>

<?php require_once 'includes/pie.php'; ?>
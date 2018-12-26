<?php
  require_once 'includes/cabecera.php';
  require_once 'includes/lateral.php'; 
  require_once 'includes/redireccion.php';
?>

<div id="principal">
  <h1>Crear entrada</h1>
  <p>Añade nuevas entradas al blog para que los usuarios puedan leerlas</p>
  <br>

  <form action="guardar-entrada.php" method="POST">
    <label for="titulo">Título:</label>
    <input required type="text" name="titulo">
    <?php echo isset($_SESSION['errores_entradas']) ? mostrarError($_SESSION['errores_entradas'], 'titulo') : ''; ?>

    <label for="descripcion">Descripción:</label>
    <input required type="text" name="descripcion">
    <?php echo isset($_SESSION['errores_entradas']) ? mostrarError($_SESSION['errores_entradas'], 'descripcion') : ''; ?>

    <label for="categoria">Categoria:</label>
    <select required name="categoria">
      <?php
        $categorias = conseguirCategorias($db);
        if(!empty($categorias)):
          while($categoria = mysqli_fetch_assoc($categorias)):
      ?>
            <option value="<?php echo $categoria['ID']; ?>"><?php echo $categoria['NOMBRE']; ?></option>
      <?php
          endwhile;
        endif;
      ?>
    </select>
    <?php echo isset($_SESSION['errores_entradas']) ? mostrarError($_SESSION['errores_entradas'], 'categoria') : ''; ?>

    <input type="submit" value="Crear entrada">
  </form>
  <?php borrarErrores(); ?>
</div>

<?php require_once 'includes/pie.php'; ?>
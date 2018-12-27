<?php
  require_once 'includes/cabecera.php';
  require_once 'includes/lateral.php'; 
  require_once 'includes/redireccion.php';
?>

<div id="principal">
  <h1>Mis datos</h1>
  <p>Añade nuevas entradas al blog para que los usuarios puedan leerlas</p>
  <br>

  <?php
    if (isset($_SESSION['completado'])) {
      echo "<div class='alerta alerta-exito'>".$_SESSION['completado']."</div>";
    } elseif (isset($_SESSION['errores']['general'])) {
      echo "<div class='alerta alerta-error'>".$_SESSION['errores']['general']."</div>";
    }
  ?>

  <form action="acciones/actualizar-usuario.php" method="POST">
    <label for="nombre">Nombre</label>
    <input type="text" name="nombre" value="<?php echo $_SESSION['usuario']['NOMBRE']; ?>">
    <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'nombre') : ''; ?>

    <label for="apellido">Apellido</label>
    <input type="text" name="apellido" value="<?php echo $_SESSION['usuario']['APELLIDO']; ?>">
    <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'apellido') : ''; ?>

    <label for="email">Email</label>
    <input type="email" name="email" value="<?php echo $_SESSION['usuario']['EMAIL']; ?>">
    <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'email') : ''; ?>

    <input type="submit" name="submit" value="Actualizar datos">
  </form>
  <?php borrarErrores(); ?>
</div>

<?php require_once 'includes/pie.php'; ?>
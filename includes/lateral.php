<?php require_once 'includes/helpers.php'; ?>

<!-- Barra lateral -->
<aside id="sidebar">
  <div id="login" class="bloque">
    <h3>Identificate</h3>
    <form action="login.php" method="POST">
      <label for="email">Email</label>
      <input type="email" name="email">

      <label for="password">Contraseña</label>
      <input type="password" name="password">

      <input type="submit" value="Iniciar sesión">
    </form>
  </div>

  <div id="register" class="bloque">
    <h3>Registrate</h3>
    <?php
      if (isset($_SESSION['completado'])) {
        echo "<div class='alerta alerta-exito'>".$_SESSION['completado']."</div>";
      } elseif (isset($_SESSION['errores']['general'])) {
        echo "<div class='alerta alerta-error'>".$_SESSION['errores']['general']."</div>";
      }
    ?>
    <form action="registro.php" method="POST">
      <label for="nombre">Nombre</label>
      <input type="text" name="nombre">
      <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'nombre') : ''; ?>

      <label for="apellido">Apellido</label>
      <input type="text" name="apellido">
      <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'apellido') : ''; ?>

      <label for="email">Email</label>
      <input type="email" name="email">
      <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'email') : ''; ?>

      <label for="password">Contraseña</label>
      <input type="password" name="password">
      <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'password') : ''; ?>

      <input type="submit" name="submit" value="Registrarse">
    </form>
    <?php borrarErrores(); ?>
  </div>
</aside>
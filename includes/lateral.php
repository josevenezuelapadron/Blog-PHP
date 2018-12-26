<!-- Barra lateral -->
<aside id="sidebar">
  <?php
    if (isset($_SESSION['usuario'])):
  ?>

    <div id="usuario-logueado" class="bloque">
      <h3>Bienvenido, <?php echo $_SESSION['usuario']['NOMBRE'].' '.$_SESSION['usuario']['APELLIDO']; ?></h3>
      <a href="crear-entrada.php" class="boton boton-verde">Crear entrada</a>
      <a href="crear-categoria.php" class="boton">Crear categoria</a>
      <a href="mis-datos.php" class="boton boton-naranja">Mis datos</a>
      <a href="cerrar.php" class="boton boton-rojo">Cerrar sesión</a>
    </div>
      
  <?php
    endif
  ?>
  <?php if(!isset($_SESSION['usuario'])): ?>
  <div id="login" class="bloque">
    <h3>Identificate</h3>

    <?php
      if (isset($_SESSION['error_login'])):
    ?>

      <div class="alerta alerta-error">
        <h3><?php echo $_SESSION['error_login']; ?></h3>
      </div>
        
    <?php
      endif;
    ?>

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
  <?php endif; ?>
</aside>
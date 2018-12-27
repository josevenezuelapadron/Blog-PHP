<?php
require_once 'conexion.php';
require_once 'helpers.php';
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog PHP</title>
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="shortcut icon" href="https://cdn.iconscout.com/icon/free/png-256/php-28-226043.png" type="image/x-icon">
  </head>
  <body>
    <!-- Cabecera -->
    <header id="cabecera">
      <!-- Logo -->
      <div id="logo">
        <a href="index.php">Blog PHP <img src="https://cdn.iconscout.com/icon/free/png-256/php-28-226043.png" alt="Icono" width="40" height="40"></a>
      </div>

      <!-- Menu -->
      <?php
        $categorias = conseguirCategorias($db);
        if(!empty($categorias)):
      ?>
      <nav id="menu">
        <ul>
          <li><a href="index.php">Inicio</a></li>
          <?php while($categoria = mysqli_fetch_assoc($categorias)): ?>
            <li><a href="categoria.php?id=<?php echo $categoria['ID']; ?>"><?php echo $categoria['NOMBRE']; ?></a></li>
          <?php
            endwhile;
            endif;
          ?>
          <li><a href="https://github.com/josevenezuelapadron" target="_blank">Sobre mi</a></li>
          <li><a href="https://twitter.com/jose_padron712" target="_blank">Contacto</a></li>
        </ul>
      </nav>
    </header>

    <div id="contenedor">
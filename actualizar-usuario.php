<?php
  require_once 'includes/conexion.php';
  require_once 'includes/redireccion.php';

  if (isset($_POST)) {
    $nombre = isset($_POST['nombre']) ? trim(mysqli_real_escape_string($db, $_POST['nombre'])) : false;
    $apellido = isset($_POST['apellido']) ? trim(mysqli_real_escape_string($db, $_POST['apellido'])) : false;
    $email = isset($_POST['email']) ? trim(mysqli_real_escape_string($db, $_POST['email'])) : false;

    // Array de errores
    $errores = array();

    if (!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/", $nombre)) {
      $nombre_validado = true;
    } else {
      $nombre_validado = false;
      $errores['nombre'] = "El nombre no es valido";
    }

    if (!empty($apellido) && !is_numeric($apellido) && !preg_match("/[0-9]/", $apellido)) {
      $apellido_validado = true;
    } else {
      $apellido_validado = false;
      $errores['apellido'] = "El apellido no es valido";
    }

    if (!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $email_validado = true;
    } else {
      $email_validado = false;
      $errores['email'] = "El email no es valido";
    }

    $actualizar_usuario = false;
    if (count($errores) == 0) {
      $usuario = $_SESSION['usuario'];

      // Comprobar si el email ya existe
      $sql = "SELECT id, email FROM usuarios WHERE email = '$email';";
      $isset_email = mysqli_query($db, $sql);
      $isset_user = mysqli_fetch_assoc($isset_email);
      
      if($isset_user['id'] == $usuario['ID'] || empty($isset_user)){
        // Si no hay errores, actualizamos el usuario en la table de la base de datos
        $sql = "UPDATE usuarios SET nombre = '$nombre', apellido = '$apellido', email = '$email' WHERE id = ".$usuario['ID'].";";
        $guardar = mysqli_query($db, $sql);

        if ($guardar) {
          $_SESSION['usuario']['NOMBRE'] = $nombre;
          $_SESSION['usuario']['APELLIDO'] = $apellido;
          $_SESSION['usuario']['EMAIL'] = $email;

          $_SESSION['completado'] = "Tus datos se han actualizado con exito";
          $actualizar_usuario = true;
        } else {
          $_SESSION['errores']['general'] = "Fallo al actualizar tus datos";
        }
      } else {
        $_SESSION['errores']['general'] = "El email introducido ya está en uso";
      }
    } else {
      $_SESSION['errores'] = $errores;
    }
  }
  header('Location: mis-datos.php');
?>
<?php

// Conexión
$db = mysqli_connect("127.0.0.1:56251", "azure", "6#vWHD_$", "php-blog");

mysqli_query($db, "SET NAMES 'utf8'");

if (!isset($_SESSION)) {
  session_start();
}

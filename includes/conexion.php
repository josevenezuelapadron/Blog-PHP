<?php

// Conexión
$db = mysqli_connect("localhost", "root", "", "php-blog");

mysqli_query($db, "SET NAMES 'utf8'");

session_start();
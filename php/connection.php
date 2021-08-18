<?php 

$host = "localhost";
$user = "root";
$password = "";
$db = "produccion_lotes";

$connection = new mysqli($host, $user, $password, $db);

mysqli_set_charset( $connection, 'utf8' );

if ($connection -> connect_errno) {
  echo "Ocurrió un error al conectar con la base de datos: " . $connection -> connect_error;
  exit();
}

?>
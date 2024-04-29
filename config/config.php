<?php
  $dbHost = "localhost";
  $dbUsername = "root";
  $dbPassword = "Arroz123@";
  $dbName = "dbvehicle";

  $conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

  if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

?>
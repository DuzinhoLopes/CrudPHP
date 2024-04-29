<?php

include_once "./config.php";

if(isset($_GET['id'])) {
  $id_veiculo = $_GET['id'];
  $sql = "SELECT * FROM vehicle WHERE idvehicle = $id_veiculo";
  $result = mysqli_query($conn, $sql);

  print_r($result);

  if(mysqli_num_rows($result) > 0) {
    $sqlDelete =  "DELETE FROM vehicle WHERE idvehicle=$id_veiculo";
    $resultDelete = mysqli_query($conn, $sqlDelete);
  }
  
}

header('Location: ../logado.php?success=Veículo deletado!');


?>
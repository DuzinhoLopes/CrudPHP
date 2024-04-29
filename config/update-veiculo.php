<?php
include_once "./config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $modelo = $_POST['modelo'];
  $ano = $_POST['ano'];
  $valor = $_POST['valor'];
  $cor = $_POST['cor'];
  $id_veiculo = $_POST['id_veiculo'];
  $iduser = $_POST['iduser'];

  $sqlUpdate = "UPDATE vehicle SET model='$modelo', year='$ano', value='$valor', color='$cor', user_iduser='$iduser'
  WHERE idvehicle='$id_veiculo'";

  $result = mysqli_query($conn, $sqlUpdate);
}

  header("Location: ../logado.php?success=Update realizado com sucesso!");


?>
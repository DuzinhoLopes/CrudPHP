<?php

include_once "config.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){

    if(isset($_POST['modelo']) && isset($_POST['ano']) && isset($_POST['valor']) && isset($_POST['cor']) && isset($_POST['idusuario'])) {

        $modelo = mysqli_real_escape_string($conn, $_POST['modelo']);
        $ano = mysqli_real_escape_string($conn, $_POST['ano']);
        $valor = mysqli_real_escape_string($conn, $_POST['valor']);
        $cor = mysqli_real_escape_string($conn, $_POST['cor']);
        $idusuario = mysqli_real_escape_string($conn, $_POST['idusuario']);

        $result = mysqli_query($conn, "INSERT INTO vehicle (model, year, value, color, user_iduser) VALUES ('$modelo', '$ano', '$valor', '$cor', '$idusuario')");

        if($result) {
           header("Location: ../cadastro-veiculos.php?success=Veículo cadastrado com sucesso!");
            exit();
        } else {
            header("Location: ../cadastro-veiculos.php?error=" . urlencode("Erro ao cadastrar o veículo: " . mysqli_error($conn)));
            exit();
        }
    } else {
      header("Location: ../cadastro-veiculos.php?error=Por favor, preencha todos os campos do formulário.");
      exit();
    }
}
?>
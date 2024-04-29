<?php

include_once "config.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Verifique se todos os campos foram enviados
    if(isset($_POST['modelo']) && isset($_POST['ano']) && isset($_POST['valor']) && isset($_POST['cor']) && isset($_POST['idusuario'])) {

        // Obtenha os valores dos campos do formulário
        $modelo = mysqli_real_escape_string($conn, $_POST['modelo']);
        $ano = mysqli_real_escape_string($conn, $_POST['ano']);
        $valor = mysqli_real_escape_string($conn, $_POST['valor']);
        $cor = mysqli_real_escape_string($conn, $_POST['cor']);
        $idusuario = mysqli_real_escape_string($conn, $_POST['idusuario']);

        // Execute a consulta de inserção
        $result = mysqli_query($conn, "INSERT INTO vehicle (model, year, value, color, user_iduser) VALUES ('$modelo', '$ano', '$valor', '$cor', '$idusuario')");

        // Verifique se a consulta foi bem-sucedida
        if($result) {
            // Se bem-sucedido, redirecione para a página de cadastro de veículos com uma mensagem de sucesso
            header("Location: ../cadastro-veiculos.php?success=Veículo cadastrado com sucesso!");
            exit();
        } else {
            // Se houver erro, redirecione para a página de cadastro de veículos com uma mensagem de erro
            header("Location: ../cadastro-veiculos.php?error=" . urlencode("Erro ao cadastrar o veículo: " . mysqli_error($conn)));
            exit();
        }
    } else {
      header("Location: ../cadastro-veiculos.php?error=Por favor, preencha todos os campos do formulário.");
      exit();
    }
}
?>
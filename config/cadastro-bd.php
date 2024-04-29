<?php

include_once "config.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $nome = $_POST['user'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $query_user = "SELECT * FROM user WHERE name = '$nome'";
    $result_user = mysqli_query($conn, $query_user);
    if(mysqli_num_rows($result_user) > 0) {
        $error_message = urlencode("Erro ao registrar usuário: Nome de usuário já existe.");
        header("Location: ../cadastro-user.php?error=$error_message");
        exit();
    }

    $query_email = "SELECT * FROM user WHERE email = '$email'";
    $result_email = mysqli_query($conn, $query_email);
    if(mysqli_num_rows($result_email) > 0) {
        $error_message = urlencode("Erro ao registrar usuário: E-mail já está em uso.");
        header("Location: ../cadastro-user.php?error=$error_message");
        exit();
    }

    $result_insert = mysqli_query($conn, "INSERT INTO user (name, email, password) VALUES ('$nome', '$email', '$hashed_password')");

    if ($result_insert) {
        header("Location: ../login.php");
        exit();
    } else {
        echo "Erro ao registrar usuário: " . mysqli_error($conn);
    }
} else {
    header("Location: ../cadastro-user.php");
    exit();
}

?>
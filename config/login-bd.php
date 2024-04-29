<?php

include_once "config.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM user WHERE email = '$email'";
    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);
        
        if(password_verify($password, $user['password'])) {
            session_start();
            $_SESSION["id_user"] = $user;
            header("Location: ../logado.php");
            exit();
        } else {
            $error_message = "E-mail ou senha incorretos.";
        }
    } else {
        $error_message = "E-mail ou senha incorretos.";
    }

    header("Location: ../login.php?error=" . urlencode($error_message));
    exit();
}

?>
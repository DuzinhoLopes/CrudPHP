<?php 
  include_once("navBar.php");
  include_once("../config/login-bd.php");
  session_start();
?>

<!DOCTYPE html>
  <html lang='pt-BR'>
  
  <head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
  
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css' integrity='sha512-jnSuA4Ss2PkkikSOLtYs8BlYIeeIK1h99ty4YfvRPAlzr377vr3CXDb7sb7eEEBYjDtcYj+AjBH3FLv5uSJuXg==' crossorigin='anonymous' referrerpolicy='no-referrer' />
  
    <link rel='stylesheet' href='./assets/style.css' />
  
    <title>Veículos</title>
  </head>

  <body>

  <?php
              if(isset($_SESSION['id_user'])){
                userLogged();                
              }else{
                noUserLogged();
              } 
            ?>

<?php


<?php

function userLogged()
{
  echo "
      <header>
        <nav class='navbar navbar-expand-lg navbar-dark bg-dark'>
          <div class='container-fluid'>
            <a class='navbar-brand' href='./logado.php'>Veículos</a>
            <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarNav' aria-controls='navbarNav' aria-expanded='false' aria-label='Toggle navigation'>
              <span class='navbar-toggler-icon'></span>
            </button>
            <div class='collapse navbar-collapse' id='navbarNav'>
              <ul class='navbar-nav mr-auto'>
                <li class='nav-item'>
                  <a class='nav-link' href='./cadastro-veiculos.php'>Cadastrar Veículos</a>
                </li>
              </ul>              
              <ul class='navbar-nav ml-auto'>
                <li class='nav-item'>
                  <a class='nav-link' href='./config/logout.php'>Sair</a>
                </li>
              </ul>
            </div>
          </div>
        </nav>
      </header>";
}

function noUserLogged()
{
  echo "
    <header>
      <nav class='navbar navbar-expand-lg navbar-dark bg-dark'>
        <div class='container-fluid'>
          <a class='navbar-brand' href='./index.php'>Veículos</a>
          <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarNav' aria-controls='navbarNav' aria-expanded='false' aria-label='Toggle navigation'>
            <span class='navbar-toggler-icon'></span>
          </button>
          <div class='collapse navbar-collapse' id='navbarNav'>
            <ul class='navbar-nav mr-auto'>
            </ul>
            <ul class='navbar-nav ml-auto'>
              <li class='nav-item'>
                <a class='nav-link' href='./login.php'>Login</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>";
}

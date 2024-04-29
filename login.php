<?php include_once("./components/header.php") ?>

<section class="login-section login">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card">
          <div class="card-header">
            Login
          </div>
          <div class="card-body">
            <?php
            // Verifica se há uma mensagem de erro na URL
            if(isset($_GET['error'])) {
                $error_message = urldecode($_GET['error']);
                echo "<div id='auth-error' class='alert alert-danger'>$error_message</div>";
            }
            ?>
            <form action="./config/login-bd.php" method="POST">
              <div class="mb-3">
                <label for="email" class="form-label">E-mail</label>
                <input type="email" class="form-control" id="email" name="email" required>
              </div>
              <div class="mb-3">
                <label for="password" class="form-label">Senha</label>
                <input type="password" class="form-control" id="password" name="password" required>
              </div>
              <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button type="submit" class="btn btn-primary me-md-2">Acessar</button>
                <a href="./cadastro-user.php" class="btn btn-outline-primary">Cadastro</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<script>    
    setTimeout(function() {
        var userError = document.getElementById('auth-error');        
        if (userError) {
            userError.style.display = 'none';
        }
    }, 5000); 
</script>

<?php include_once "./components/footer.php"?>
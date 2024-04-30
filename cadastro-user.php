<?php include_once("./components/header.php") ?>

<section class="login-section login">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card">
          <div class="card-header">
            Cadastro
          </div>
          <div class="card-body">
            <form action="./config/cadastro-bd.php" method="POST">
              <div class="mb-3">
                <label for="user" class="form-label">Nome</label>
                <input type="text" class="form-control" id="user" name="user" required>
                <?php
                if(isset($_GET['error']) && strpos($_GET['error'], "Nome de usuário") !== false) {
                    echo "<span id='user-error' class='text-danger'>Nome de usuário já existe.</span>";
                }
                ?>
              </div>
              <div class="mb-3">
                <label for="email" class="form-label">E-mail</label>
                <input type="email" class="form-control" id="email" name="email" required>
                <?php
                if(isset($_GET['error']) && strpos($_GET['error'], "E-mail") !== false) {
                    echo "<span id='email-error' class='text-danger'>E-mail já está em uso.</span>";
                }
                ?>
              </div>
              <div class="mb-3">
                <label for="password" class="form-label">Senha</label>
                <input type="password" class="form-control" id="password" name="password" required>
              </div>
              <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button type="submit" class="btn btn-primary me-md-2">Cadastrar</button>
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
        var userError = document.getElementById('user-error');
        var emailError = document.getElementById('email-error');
        
        if (userError) {
            userError.style.display = 'none';
        }
        
        if (emailError) {
            emailError.style.display = 'none';
        }
    }, 5000); 
</script>

<?php include_once "./components/footer.php" ?>
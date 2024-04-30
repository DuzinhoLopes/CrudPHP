<?php
include_once "config.php";

session_start();

if (!isset($_SESSION["id_user"]) == true) {
  unset($_SESSION["email"]);
  header("Location: ./index.php");
  exit();
}
$logado = $_SESSION["id_user"];
?>

<?php include_once("./components/header.php"); ?>

<section class="container mt-4 veiculos">
  <?php
  if (isset($_GET['error'])) {
    $error_message = $_GET['error'];
    echo "<div id='error-message' class='alert alert-danger'>$error_message</div>";
  } elseif (isset($_GET['success'])) {
    $success_message = $_GET['success'];
    echo "<div id='success-message' class='alert alert-success'>$success_message</div>";
  }
  ?>
  <h2>Editar Veículo</h2>
  <form action="./config/veiculos-bd.php" method="POST">
    <div class="mb-3">
      <label for="modelo" class="form-label">Modelo</label>
      <input type="text" class="form-control" id="modelo" name="modelo" required>
    </div>
    <div class="mb-3">
      <label for="ano" class="form-label">Ano</label>
      <input type="number" class="form-control" id="ano" name="ano" required>
    </div>
    <div class="mb-3">
      <label for="valor" class="form-label">Valor</label>
      <input type="text" class="form-control" id="valor" name="valor" required>
    </div>
    <div class="mb-3">
      <label for="cor" class="form-label">Cor</label>
      <input type="text" class="form-control" id="cor" name="cor" required>
    </div>
    <input type="hidden" name="idusuario" value="<?php echo $logado['iduser']; ?>">
    <button type="submit" class="btn btn-primary">Enviar</button>
  </form>
</section>

<script>    
    setTimeout(function() {
        var userError = document.getElementById('error-message');
        var emailError = document.getElementById('success-message');
        if (userError) {
            userError.style.display = 'none';
        }
        
        if (emailError) {
            emailError.style.display = 'none';
        }
    }, 5000); 
</script>

<?php include_once("./components/footer.php"); ?>
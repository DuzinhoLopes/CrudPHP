<?php
include_once "./config/config.php";

session_start();

if (!isset($_SESSION["id_user"]) == true) {
  unset($_SESSION["email"]);
  header("Location: ./index.php");
  exit();
}
$logado = $_SESSION["id_user"];

if(isset($_GET['id'])) {
  $id_veiculo = $_GET['id'];
  $sql = "SELECT * FROM vehicle WHERE idvehicle = $id_veiculo";
  $result = mysqli_query($conn, $sql);

  if(mysqli_num_rows($result) > 0) {
    // Obter os dados do veículo
    $veiculo = mysqli_fetch_assoc($result);
    $modelo = $veiculo['model'];
    $ano = $veiculo['year'];
    $valor = $veiculo['value'];
    $cor = $veiculo['color'];
  } else {
    header("Location: ./logado.php?");
    exit();
  }
} else {
  header("Location: ./logado.php?");
  exit();
}
?>

<?php include_once("./components/header.php"); ?>

<section class="container mt-4 veiculos">
    <h2>Editar Veículo</h2>
  <form action="./config/update-veiculo.php" method="POST">
    <div class="mb-3">
      <label for="modelo" class="form-label">Modelo</label>
      <input type="text" class="form-control" id="modelo" name="modelo" value="<?php echo $modelo; ?>" required>
    </div>
    <div class="mb-3">
      <label for="ano" class="form-label">Ano</label>
      <input type="number" class="form-control" id="ano" name="ano" value="<?php echo $ano; ?>" required>
    </div>
    <div class="mb-3">
      <label for="valor" class="form-label">Valor</label>
      <input type="text" class="form-control" id="valor" name="valor" value="<?php echo $valor; ?>" required>
    </div>
    <div class="mb-3">
      <label for="cor" class="form-label">Cor</label>
      <input type="text" class="form-control" id="cor" name="cor" value="<?php echo $cor; ?>" required>
    </div>
    <input type="hidden" name="id_veiculo" value="<?php echo $id_veiculo; ?>">
    <input type="hidden" name="iduser" value="<?php echo $logado['iduser']; ?>">

    <button type="submit" class="btn btn-primary">Salvar Alterações</button>
  </form>
</section>

<?php include_once("./components/footer.php"); ?>
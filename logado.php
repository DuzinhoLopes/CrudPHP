<?php

include_once "./config/config.php";

session_start();

if (!isset($_SESSION["id_user"]) == true) {
  unset($_SESSION["email"]);
  header("Location: ./index.php");
  exit();
}
$logado = $_SESSION["id_user"];


$sql = "SELECT vehicle.*, user.name AS user_name 
FROM vehicle 
INNER JOIN user ON vehicle.user_iduser = user.iduser
ORDER BY vehicle.idvehicle DESC";
$result = mysqli_query($conn, $sql);

?>


<?php include_once("./components/header.php") ?>


<?php
  if (isset($_GET['success'])) {
    $success_message = $_GET['success'];
    echo "<div id='success-message' class='alert alert-success update-success'>$success_message</div>";
  }
  ?>

<section class="container mt-4">
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Veículo</th>
        <th>Ano</th>
        <th>Valor</th>
        <th>Cor</th>
        <th>Cadastrado/Editado por</th>
        <th>Ações</th>
      </tr>
    </thead>
    <tbody>
      <?php
      while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['model'] . "</td>";
        echo "<td>" . $row['year'] . "</td>";
        echo "<td>" . $row['value'] . "</td>";
        echo "<td>" . $row['color'] . "</td>";
        echo "<td>" . $row['user_name'] . "</td>";
        echo "<td>";
        echo "<a class='btn btn-primary btn-sm' href='./edit-veiculos.php?id={$row['idvehicle']}'>Editar</a>";
        echo "<a class='btn btn-danger btn-sm' href='./config/delete-veiculos.php?id={$row['idvehicle']}'>Excluir</a>";
        echo "</td>";
        echo "</tr>";
      }
      ?>
    </tbody>
  </table>
</section>

<script>
var alertContainer = document.querySelector('.update-success');

if (alertContainer) {
  setTimeout(function() {
    alertContainer.remove();
  }, 5000);
}
</script>

<?php include_once("./components/footer.php") ?>
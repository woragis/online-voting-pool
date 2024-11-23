<?php
$pageTitle = "Post";
define('ALLOW_INCLUDE', true);
include './includes/header.php';
?>

<section class="pool-page">
  <h1 class="title">Postagem</h1>
  <a href="home.php">
    <button id="back-button">Voltar a Pagina Inicial</button>
  </a>
  <?php
  if (isset($_GET["id"])) {
    include "./includes/pool_read.php";
  } else {
    echo "<section class=page-in-information-state>";
    echo "<h1>Id da votacao nao foi fornecido</h1>";
    echo "</section>";
  }
  ?>
</section>

<?php
include './includes/footer.php';
?>
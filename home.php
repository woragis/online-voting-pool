<?php
$pageTitle = "Home";
define('ALLOW_INCLUDE', true);
include './includes/header.php';
?>

<section class="home">
  <?php
  include './includes/vote_pool_create.php';
  include './includes/pools_read.php';
  ?>
</section>

<?php
include './includes/footer.php';
?>
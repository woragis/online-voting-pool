<?php
if (!defined('ALLOW_INCLUDE')) {
  die('Direct access not allowed!');
}
?>

<section class="pools">
  <h1 class="pools-title">Suas Votacoes</h1>
  <section>
    <?php
    include "./includes/auth.php";
    $sql = "SELECT * FROM pools WHERE author = $userId";
    include 'db.php';
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      echo "<ul class=pools-profile-container>";
      while ($row = $result->fetch_assoc()) {
        $fields_sql = "SELECT * FROM fields WHERE pool_id = $row[id]";
        $author_sql = "SELECT * FROM users WHERE id = $row[author]";
        $authorName = $conn->query($author_sql)->fetch_assoc()['name'];
        $poolId = $row['id'];
        echo "
          <li class='pool'>
          <a href=pool.php?id=$poolId>
            <h1 class='title'>" . $row['title'] . "</h1>
            </a>
            ";
        $pool_fields_result = $conn->query($fields_sql);
        if ($pool_fields_result->num_rows > 0) {
          include "./includes/auth.php";
          echo "<ul>";
          if ($isLoggedIn) {
            while ($pool_field_row = $pool_fields_result->fetch_assoc()) {
              echo "
          <div class=vote-div onclick=vote(" . $pool_field_row['id'] . "," . $poolId . "," . $userId . ")>
          <h3>$pool_field_row[name]</h3>
          <p><strong>$pool_field_row[votes]</strong></p>
          </div>
          ";
            }
          } else {
            while ($pool_field_row = $pool_fields_result->fetch_assoc()) {
              echo "
          <div class=vote-div>
          <h3>$pool_field_row[name]</h3>
          <p><strong>$pool_field_row[votes]</strong></p>
          </div>
          ";
            }
          }
          echo "</ul>";
        }
        echo "
          <a href=pool.php?id=$row[id]>
            <p class='author'><strong>Enquete criada por:</strong> " . $authorName . "</p>
            <p class='created-date'><em>Postado em: " . $row['created_at'] . "</em></p>
            </a>
          </li>";
      }
      echo "</ul>";
    } else {
      echo "<section class=page-in-information-state>";
      echo "<h1>Nenhuma Votacao Encontrada.</h1>";
      echo "</section>";
    }
    ?>
  </section>

</section>
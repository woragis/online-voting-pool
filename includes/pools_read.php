<?php
if (!defined('ALLOW_INCLUDE')) {
  die('Direct access not allowed!');
}
?>

<section class="pools">
  <h1 class="pools-title">Votacoes</h1>
  <section>
    <?php
    $sql = "SELECT * FROM voting_pool ORDER BY created_at DESC LIMIT 20";
    include 'db.php';
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      echo "<ul class=pools-container>";
      while ($row = $result->fetch_assoc()) {
        $fields_sql = "SELECT * FROM voting_field WHERE pool_id = $row[id]";
        $author_sql = "SELECT * FROM users WHERE id = $row[author]";
        $authorName = $conn->query($author_sql)->fetch_assoc()['name'];
        echo "
          <li class='pool'>
            <p class='author'><strong>Autor:</strong> " . $authorName . "</p>
            <h1 class='title'>" . $row['title'] . "</h1>";
        $pool_fields_result = $conn->query($fields_sql);
        if ($pool_fields_result->num_rows > 0) {
          echo "<ul>";
          while ($pool_field_row = $pool_fields_result->fetch_assoc()) {
            echo "
          <div class=vote-div>
          <h3>$pool_field_row[name]</h3>
          <p><strong>$pool_field_row[votes]</strong></p>
          </div>
          ";
          }
          echo "</ul>";
        }
        echo "
            <p class='created-date'><strong><em>Postado em: " . $row['created_at'] . "</em></strong></p>
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
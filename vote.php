<?php
define('ALLOW_INCLUDE', true);
// Verifica se os dados foram recebidos via POST
if (isset($_POST['field_id']) && isset($_POST['pool_id']) && isset($_POST['user_id'])) {
  include 'db.php';
  $field_id = $_POST['field_id'];
  $user_id = $_POST['user_id'];
  $pool_id = $_POST['pool_id'];

  $test_if_user_already_voted = "SELECT EXISTS(
    SELECT 1
    FROM votes
    WHERE user_id = '$user_id' AND pool_id = '$pool_id'
  ) AS user_exists;";

  $user_exists_result = $conn->query($test_if_user_already_voted);
  $user_exists = $user_exists_result->fetch_assoc();

  if (!$user_exists['user_exists']) {
    $update_field = "UPDATE fields SET votes = votes + 1 WHERE id = '$field_id';";
    $create_vote = "INSERT INTO votes (user_id, pool_id, field_id) VALUES ('$user_id', '$pool_id', '$field_id');";
    $field_update_result = $conn->query($update_field);
    $create_vote_result = $conn->query($create_vote);

    if ($field_update_result && $create_vote_result) {
      echo "Dados Salvos";
    } else {
      echo "Erro ao salvar os dados.";
    }
  } else {
    echo "Usuario ja votou";
  }
} else {
  echo "Erro: Dados não recebidos.";
}

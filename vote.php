<?php
define('ALLOW_INCLUDE', true);
// Verifica se os dados foram recebidos via POST
if (isset($_POST['field_id']) && isset($_POST['pool_id']) && isset($_POST['user_id'])) {
  include 'db.php';
  $field_id = $_POST['field_id'];
  $user_id = $_POST['user_id'];
  $pool_id = $_POST['pool_id'];

  "Testar se a votacao ainda esta aberta";
  // prevent user increments votes
  $test_if_user_already_voted = "SELECT EXISTS(
    SELECT 1
    FROM votes
    WHERE user_id = '$user_id' AND field_id = '$field_id'
  ) AS user_exists;";

  $test_if_user_already_voted = "SELECT field_id
    FROM votes
    WHERE user_id = '$user_id' AND field_id = '$field_id'
    LIMIT 1;";

  $user_exists_result = $conn->query($test_if_user_already_voted);
  $user_exists = $user_exists_result->fetch_assoc();
  $user_exists_result->num_rows > 0;

  $get_vote_field_id = "SELECT field_id FROM votes
    WHERE user_id = '$user_id' AND pool_id = '$pool_id'
    LIMIT 1;";

  $result = $conn->query($get_vote_field_id);

  // User has already voted
  if ($result->num_rows > 0) {
    // User has already voted
    $existing_vote = $result->fetch_assoc();
    $existing_field_id = $existing_vote['field_id'];

    if ($existing_field_id != $field_id) {
      "field_id era diferente";
      "Por isso o voto sora trocado";
      $update_existing_vote =
        "UPDATE fields SET votes = votes - 1 WHERE id = '$existing_field_id';";
      $update_new_vote = "UPDATE fields SET votes = votes + 1 WHERE id = '$field_id';";
      $update_vote = "UPDATE votes SET field_id = '$field_id' WHERE user_id = '$user_id' AND pool_id = '$pool_id';";
      "Executar Queries";
      $conn->query($update_existing_vote);
      $conn->query($update_new_vote);
      $conn->query($update_vote);
      echo "Voto Atualizado";
    } else {
      "field_id igual";
      "Por isso o voto sora excluido";
      $delete_field_votes =
        "UPDATE fields SET votes = votes - 1 WHERE id = '$field_id';";
      $delete_vote = "DELETE FROM votes WHERE user_id = '$user_id' AND pool_id = '$pool_id';";
      "Executar Queries";
      $conn->query($delete_field_votes);
      $conn->query($delete_vote);
      echo "Voto Deletado";
    }
  } else {
    "Situacao em que usuario nunca votou nessa enquete";
    $increment_vote = "UPDATE fields SET votes = votes + 1 WHERE id = '$field_id';";
    $insert_new_vote = "INSERT INTO votes (user_id, field_id, pool_id) VALUES ('$user_id', '$field_id', '$pool_id');";
    "Executar Queries";
    $conn->query($increment_vote);
    $conn->query($insert_new_vote);
    echo "Voto Inserido";
  }
} else {
  echo "Erro: Dados não recebidos.";
}

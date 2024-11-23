<?php
if (!defined('ALLOW_INCLUDE')) {
  die('Direct access not allowed!');
}

?>
<?php
// Iniciar a sessão e incluir o arquivo de conexão com o banco
include './db.php';

// Verificar se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Sanitizar e pegar os dados do formulário
  $title = htmlspecialchars(trim($_POST['title']));
  $description = htmlspecialchars(trim($_POST['description']));
  $author = $_SESSION['user_id'];

  // Verificar se os campos não estão vazios
  if (!empty($title) && !empty($description)) {
    // Preparar a query para inserir o post no banco de dados
    $pool_sql = "INSERT INTO voting_pool (author, title, description) VALUES ('$author', '$title', '$description')";

    if ($conn->query($pool_sql) === TRUE) {
      $pool_id = $conn->insert_id; // Função para obter o ID do último registro inserido
      $field_0_name = $_POST['field-0-text'];
      $field_1_name = $_POST['field-1-text'];
      $field_2_name = $_POST['field-2-text'];

      $field_0_sql = "INSERT INTO voting_field (pool_id, name) VALUES ('$pool_id', '$field_0_name');";
      $field_1_sql = "INSERT INTO voting_field (pool_id, name) VALUES ('$pool_id', '$field_1_name');";
      $field_2_sql = "INSERT INTO voting_field (pool_id, name) VALUES ('$pool_id', '$field_2_name');";
      $conn->query($field_0_sql);
      $conn->query($field_1_sql);
      $conn->query($field_2_sql);

      // Redirecionar para a página do post, passando o ID via URL
    } else {
      echo "Erro ao criar post: " . $conn->error;
    }
  } else {
    echo "Por favor, preencha todos os campos!";
  }
}
?>
<form method="POST" class="form new-pool-form">
  <h1>Criar Votacao</h1>
  <input type="text" id="title" name="title" placeholder="Titulo" required />
  <textarea id="description" name="description" placeholder="Mensagem" rows="5" required></textarea>
  <hr>
  <h2>Opcoes de Votacao</h2>
  <div class="vote-field">
    <input type="file" name="field-0-image" id="field-0-image">
    <input type="text" id="field-0-text" name="field-0-text" placeholder="Field 0 Text" required />
  </div>
  <div class="vote-field">
    <input type="file" name="field-1-image" id="field-1-image">
    <input type="text" id="field-1-text" name="field-1-text" placeholder="Field 1 Text" required />
  </div>
  <div class="vote-field">
    <input type="file" name="field-2-image" id="field-2-image">
    <input type="text" id="field-2-text" name="field-2-text" placeholder="Field 2 Text" required />
  </div>
  <button type="submit">Criar</button>
</form>
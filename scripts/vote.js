function vote() {
  var xhr = new HXLHttpRequest();
  // Cria um objeto XMLHttpRequest
  var xhr = new XMLHttpRequest();

  // Configura a requisição AJAX
  xhr.open("POST", "processar.php", true); // 'processar.php' será o arquivo PHP que irá processar a requisição

  // Definindo o tipo de dados que será enviado
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

  // Enviando a requisição com os dados, se necessário (exemplo: id)
  xhr.send("acao=cliqueNaDiv");

  // Função chamada quando a resposta do servidor for recebida
  xhr.onload = function () {
    if (xhr.status == 200) {
      alert("Ação executada com sucesso: " + xhr.responseText);
    } else {
      alert("Erro ao executar a ação.");
    }
  };
}

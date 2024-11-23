function vote(field_id, pool_id, user_id) {
  /*
  console.log("Field id: '" + field_id + "'");
  console.log("Pool id: '" + pool_id + "'");
  console.log("User id: '" + user_id + "'");
  */

  var xhr = new XMLHttpRequest();
  xhr.open("POST", "vote.php", true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhr.send(
    "field_id=" + field_id + "&pool_id=" + pool_id + "&user_id=" + user_id
  );

  xhr.onload = function () {
    if (xhr.status == 200) {
      alert("Voto enviado com sucesso: " + xhr.responseText);
      location.reload();
    } else {
      alert("Erro ao salvar voto.");
    }
  };
}

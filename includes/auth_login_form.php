<?php
if (!defined('ALLOW_INCLUDE')) {
  die('Direct access not allowed!');
}
?>

<form method="POST" class="form">
  <h1>Login</h1>
  <input type="email" name="email" placeholder="Email" required autocomplete="email">
  <input type="password" name="password" placeholder="Password" required autocomplete="off">
  <button type="submit">Login</button>
  <div class="form-helper-buttons">
    <p class="authentication-toggler">
      Nao tem uma conta ainda?
      <a href="register.php">Registre-se Aqui</a>
    </p>
  </div>
</form>
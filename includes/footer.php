<?php
if (!defined('ALLOW_INCLUDE')) {
  die('Direct access not allowed!');
}

$footerLinks = [
  "Home" => "home.php",
  "About" => "about.php",
];
$socialMediaLinks = [
  "Mikael" => "",
  "Guilherme" => "",
  "Ricardo" => "",
  "Joao" => "",
  "Fernando" => "",
];
?>
<footer class="footer-section">
  <section class="social-media">
    <h3>Time</h3>
    <ul>
      <?php
      foreach ($socialMediaLinks as $title => $link) {
        echo "<a href='$link'><li>$title</li></a>";
      }
      ?>
    </ul>
  </section>
  <div class="copy">
    <hr>
    <p>Todos os Direitos Reservados aos Programadores - 2024 &copy;</p>
    <hr>
  </div>
</footer>

<?php
include "./scripts/scripts.php";
?>

</body>

</html>
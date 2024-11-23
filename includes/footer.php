<?php
if (!defined('ALLOW_INCLUDE')) {
  die('Direct access not allowed!');
}

$footerLinks = [
  "Home" => "home.php",
  "About" => "about.php",
];
$socialMediaLinks = [
  "Jezreel" => "https://github.com/woragis",
  "Vini" => "https://github.com/Vinii225",
  "Carlos" => "https://github.com/carlos_humberto",
  "Roberio" => "https://github.com/roberinho",
  "Daniel" => "https://github.com/daniel_onix_fala_merda",
  "Arthur" => "https://github.com/arthur",
];
?>
<footer class="footer-section">
  <section class="social-media">
    <h3>Time do Github</h3>
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
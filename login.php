<?php
$title = 'Login';
require 'shared/header.php';
?>
  <h2>Login</h2>
  <?php
  if (!empty($_GET['invalid'])) {
    echo '<h4>INVALID LOGIN</h4>';
  }
  ?>
  <h5>Please enter your credentials.</h5>
  <form method="post" action="validateInput.php">
    <fieldset>
      <label for="username">Username:</label>
      <input name="username" id="username" required type="email" placeholder="email@email.com" />
    </fieldset>
    <fieldset>
      <label for="password">Password:</label>
      <input type="password" name="password" id="password" required />
    </fieldset>
    <button >Login</button>
  </form>
</main>
</body>
</html>
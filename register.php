<?php
    $title = 'Register';
    require('shared/header.php');
?>

<h2>User Registration</h2>
    <h5>Passwords must be a minimum of 8 characters,including 1 digit, 1 upper-case letter, and 1 lower-case letter.</h5>
<?php
  if(!empty($_GET['duplicate'])){
    echo'<h6 class="err">Username already exists</h6>';
  }
?>
  <form method="post" action="save-registration.php">
    <fieldset>
        <label for="username">Username: *</label>
        <input name="username" id="username" required type="email" placeholder="email@email.com" />
    </fieldset>

    <fieldset>
        <label for="password">Password: *</label>
        <input type="password" name="password" id="password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" />
    </fieldset>

    <fieldset>
        <label for="confirm">Confirm Password: *</label>
        <input type="password" name="confirm" id="confirm" required onkeyup="return comparePasswords();"
        pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" />
        <br>
        <span id="passwordError"></span>

    </fieldset>

    <button class="offset-button" onclick="comparePasswords();" >Register</button>

  </form>
  <script>
      //compare passwords
      function comparePasswords() {
        let password = document.getElementById('password').value;
        let confirm = document.getElementById('confirm').value;
        let passwordError = document.getElementById('passwordError');

        if (password != confirm) {
          passwordError.innerText = 'Passwords do not match';
          return false;
        }
        else {
          passwordError.innerText = '';
          return true;
        }
      }
    </script>


</body>
</html>
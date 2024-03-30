<?php 
include('shared/auth.php');
$title = 'Edit Show';
include('adminShared/header.php'); 

try {
  $userId = $_GET['userId'];
  include('shared/db.php');
  if (is_string($userId)) {
      // set up query to fetch show data  
      $sql = "SELECT * FROM user where userId = :userId";

      $cmd = $db->prepare($sql);
      $cmd->bindParam(':userId', $userId, PDO::PARAM_INT);
      $cmd->execute();
      $user = $cmd->fetch();
  }  
}catch (Exception $error) {
  header('location:error.php');
  exit();
}
?>

<h2>Edit Admin Details</h2>
<form method="post" action="update-admin.php">
    <fieldset>
        <label for="username">Username: *</label>
        <input name="username" id="username" required value="<?php echo $user['username']; ?>" />
    </fieldset>
    
     
    <fieldset>
      <label for="password">New Password:</label>
      
      <input type="password" name="password" id="password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"/>
    </fieldset>
    <fieldset>
      <label for="password">Confirm New Password:</label>
      
      <input type="password" name="confirm" id="confirm" onkeyup="return comparePasswords();"
        pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required />
        <br>
        <span id="passwordError"></span>
    </fieldset>

    
    <button onclick="return comparePasswords();">Submit</button>
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

</form>

</body>
</html>
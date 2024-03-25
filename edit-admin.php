<?php 
include('shared/auth.php');
$title = 'Edit Show';
include('adminShared/header.php'); 


$username = $_GET['username'];

// init vars
$username = null;


// if showId is numeric, fetch show from db
if (is_string($pageId)) {

    // connect
    include('shared/db.php');

    // run query & populate show properties for display
    $sql = "SELECT * FROM user WHERE username = :username";
    $cmd = $db->prepare($sql);
    $cmd->bindParam(':pageId', $pageId, PDO::PARAM_INT);
    $cmd->execute();
    $user = $cmd->fetch();  
    
  
    $username = $user['pageName'];
    $content = $page['content'];
   
}

?>

<h2>Edit Admin Details</h2>
<form method="post" action="update-admin.php">
    <fieldset>
        <label for="username">Title: *</label>
        <input name="username" id="username" required value="<?php echo $username; ?>" />
    </fieldset>
    <fieldset>
      <label for="password">Current Password:</label>
      
      <input type="password" name="password" id="password" required />
    </fieldset>

    <input type="hidden" name="pageId" id="pageId" value="<?php echo $pageId; ?>" />
    <button>Submit</button>
</form>
</main>
</body>
</html>
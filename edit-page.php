<?php 
include('shared/auth.php');
$title = 'Edit Show';
include('adminShared/header.php'); 


$pageId = $_GET['pageId'];

// init vars
$pageName = null;
$content = null;


// if showId is numeric, fetch show from db
if (is_numeric($pageId)) {
    try{
    // connect
    include('shared/db.php');

    // run query & retrieve results
    $sql = "SELECT * FROM pageInformation WHERE pageId = :pageId";
    $cmd = $db->prepare($sql);
    $cmd->bindParam(':pageId', $pageId, PDO::PARAM_INT);
    $cmd->execute();
    $page = $cmd->fetch();  
    
  
    $pageName = $page['pageName'];
    $content = $page['content'];
    
    $db = null;
    }catch (Exception $error) {
        header('location:error.php');
        exit();
    }
}

?>

<h2>Edit Page Details</h2>
<form method="post" action="update-page.php">
    <fieldset>
        <label for="pageName">Title: *</label>
        <input name="pageName" id="pageName" required value="<?php echo $pageName; ?>" />
    </fieldset>
    <fieldset>
        <label for="content">Content: *</label>
        <textarea name="content" id="content" required><?php echo $content;?></textarea>
    </fieldset>

    <input type="hidden" name="pageId" id="pageId" value="<?php echo $pageId; ?>" />
    <button>Submit</button>
</form>
</main>
</body>
</html>
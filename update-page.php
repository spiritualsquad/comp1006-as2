<?php
include('shared/auth.php');
$title = 'Saving Show Updates...';
include('adminShared/header.php');
echo '<section>';
// capture form inputs into vars
$pageId = $_POST['pageId'];  
$pageName = $_POST['pageName'];
$content = $_POST['content'];

$validInput = true;

// input validation before save
if (empty($pageId)) {
    echo 'Name is required<br />';
    $validInput = false;
}

if (empty($content)){
    echo 'Content is required<br />';
    $validInput = false;
}




if ($validInput == true) {
    try{
    // connect to db 
    include('shared/db.php');

    // set up SQL UPDATE command
    $sql = "UPDATE pageInformation SET pageName = :pageName, content = :content WHERE pageId = :pageId";

       

    // link db connection w/SQL command we want to run
    $cmd = $db->prepare($sql);

    // map each input to a column in the shows table
    $cmd->bindParam(':pageName', $pageName, PDO::PARAM_STR, 50);
    $cmd->bindParam(':content', $content, PDO::PARAM_STR,500);
    
    $cmd->bindParam(':pageId', $pageId, PDO::PARAM_INT);

    // execute the update (which saves to the db)
    $cmd->execute();

    // disconnect
    $db = null;

    
    header('location:pages.php');
    }catch(Exception $err){
        header('location:error.php');
        exit();
    }
}
?>
</section>
</main>
</body>
</html>
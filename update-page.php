<?php
include('shared/auth.php');
$title = 'Saving Show Updates...';
include('adminShared/header.php');

// capture form inputs into vars
$pageId = $_POST['pageId'];  // id value from hidden input on form
$pageName = $_POST['pageName'];
$content = $_POST['content'];

$validInput = true;

// input validation before save
if (empty($pageId)) {
    echo 'Name is required<br />';
    $validInput = false;
}

if (empty($content)){
    echo 'Release Year is required<br />';
    $validInput = false;
}




if ($validInput == true) {
    // connect to db using the PDO (PHP Data Objects Library)
    include('shared/db.php');

    // set up SQL UPDATE command
    $sql = "UPDATE pageInformation SET pageName = :pageName, content = :content WHERE pageId = :pageId";

       

    // link db connection w/SQL command we want to run
    $cmd = $db->prepare($sql);

    // map each input to a column in the shows table
    $cmd->bindParam(':pageName', $pageName, PDO::PARAM_STR, 255);
    $cmd->bindParam(':content', $content, PDO::PARAM_STR,255);
    
    $cmd->bindParam(':pageId', $pageId, PDO::PARAM_INT);

    // execute the update (which saves to the db)
    $cmd->execute();

    // disconnect
    $db = null;

    // show msg to user
    header('location:pages.php');
}
?>
</main>
</body>
</html>
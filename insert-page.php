<?php
include('shared/auth.php');
$title = 'Saving New Show...';
include('adminShared/header.php');
echo'<section>';
// capture form inputs into vars
$pageName = $_POST['pageName'];

$content = $_POST['content'];

$validInput = true;

// input validation before save
if (empty($pageName)) {
    echo 'Name is required<br />';
    $validInput = false;
}

if (empty($content)) {
    echo 'Release Year is required<br />';
    $validInput = false;
}


if ($validInput == true) {
    try{
    // connect to db 
    include('shared/db.php');

    //prepare select and run query
    $sql = "INSERT INTO pageInformation (pageName, content) 
    VALUES (:pageName, :content)";
    $cmd = $db->prepare($sql);
    $cmd->bindParam(':pageName', $pageName, PDO::PARAM_STR, 50);
    $cmd->bindParam(':content', $content, PDO::PARAM_STR, 500);
    $cmd->execute();

    // disconnect
    $db = null;
    header('location:pages.php');
    }catch (Exception $error) {
        header('location:error.php');
        exit();
    }
    
} 
?>
</section>
</body>
</html>
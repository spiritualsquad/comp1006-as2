<?php
include('shared/auth.php');
$title = 'Saving New Show...';
include('adminShared/header.php');
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
    // connect to db using the PDO (PHP Data Objects Library)
    include('shared/db.php');


    $sql = "INSERT INTO pageInformation (pageName, content) 
    VALUES (:pageName, :content)";

   
    $cmd = $db->prepare($sql);

    // map each input to a column in the shows table
    $cmd->bindParam(':pageName', $pageName, PDO::PARAM_STR, 255);
    $cmd->bindParam(':content', $content, PDO::PARAM_STR, 255);
    

    // execute the INSERT (which saves to the db)
    $cmd->execute();

    // disconnect
    $db = null;
    header('location:pages.php');
    
} 
?>
</main>
</body>
</html>
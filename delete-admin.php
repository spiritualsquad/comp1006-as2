<?php
include('shared/auth.php');
// read the showId from the url parameter using $_GET   
$userId = $_GET['userId'];
try{
    // connect to db
    include('shared/db.php');

    // prepare SQL DELETE to delete the user
    $sql = "DELETE FROM user WHERE userId = :userId";
    $cmd = $db->prepare($sql);
    $cmd->bindParam(':userId', $userId, PDO::PARAM_INT);

    // execute the delete
    $cmd->execute();

    // disconnect
    $db = null;
}catch (Exception $error) {
    header('location:error.php');
    exit();
}

    // redirect back to admins
    header('location:admins.php');

?>
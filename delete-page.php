<?php
include('shared/auth.php');
// read the showId from the url parameter using $_GET   
$pageId = $_GET['pageId'];

if (is_numeric($pageId)) {
    try{
        // connect to db
        include('shared/db.php');

        // prepare SQL DELETE
        $sql = "DELETE FROM pageInformation WHERE pageId = :pageId";
        $cmd = $db->prepare($sql);
        $cmd->bindParam(':pageId', $pageId, PDO::PARAM_INT);

        // execute the delete
        $cmd->execute();

        // disconnect
        $db = null;
    }catch (Exception $error) {
        header('location:error.php');
        exit();
    }

    // redirect back to updated shows.php (eventually)
    header('location:pages.php');
}
?>
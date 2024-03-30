<?php 
    $title = 'Home';
    include('shared/header.php'); 
    try{
        //connect to database
        include('shared/db.php');
        //initally the page id is not there
        $pageId = isset($_GET['pageId']) ? $_GET['pageId'] : null;
        // set up query to fetch show data
        $sql = "SELECT * FROM pageInformation WHERE pageId=:pageId";
        $cmd = $db->prepare($sql);
        $cmd->bindParam(':pageId', $pageId, PDO::PARAM_INT);
        $cmd->execute();
        $pages = $cmd->fetchAll();
    foreach ($pages as $page){
                
            echo'<h2>'.ucfirst($page['pageName']).'</h2>';
            echo'<p>'.ucfirst($page['content']).'</p>';
        }
        //disconnect
        $db = null;
}catch (Exception $error) {
    header('location:error.php');
    exit();
}
?>
    
</main>
</body>
</html>
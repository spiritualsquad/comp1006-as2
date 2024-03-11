<?php 
    $title = 'Home';
    include('shared/header.php'); 
    include('shared/db.php');
    $pageId = $_GET['pageId'];
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
    
?>
    
</main>
</body>
</html>
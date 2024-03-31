
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="shared/style.css">
    <title>
        <?php 
            //title changes as the file changes
            echo $title; 
        ?>
    </title>
    
</head>
<body> 
    <header>
        <a href="index.php" class="logo">
            <img src="img/logo.jpg" alt="">
        </a>
        <nav class="navbar">
        <?php
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            } 
        try {    
            include('shared/db.php');
            // set up query to fetch show data
            $sql = "SELECT * FROM pageInformation ORDER BY pageId";
            $cmd = $db->prepare($sql);
            // run query & store results in var pages
            $cmd->execute();
            $pages = $cmd->fetchAll();
            //Logo
            //Navigation menu
            foreach ($pages as $page){
               
                echo'<a href="index.php?pageId='.$page['pageId'].'">'.ucfirst($page['pageName']).'</a> ';
            }
            $db =null;
        }catch (Exception $error) {
            
            header('location:error.php');
            exit();
        }
            echo '<a href="register.php">Register</a>';
            //if logded in
            if (!empty($_SESSION['username'])) {
                echo '
                  <a href="adminSite.php">Control Panel</a>';
                } else{//if not logged in
                    echo '
                    <a href="login.php">Login</a>';
                }
        
        ?>
        </nav>
        
        
    </header>
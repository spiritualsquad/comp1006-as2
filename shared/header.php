<!-- This site is common header for all fields-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="common/style.css">
    <title>
        <?php 
            //title changes as the file changes
            echo $title; 
        ?>
    </title>
    
</head>
<body> 
    <header>
        <a href="index.html" class="logo">
            <img src="img/logo.jpg" alt="">
        </a>
        <nav class="navbar">
        <?php
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            } 
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
            echo '<a href="login.php">Login</a>
            <a href="register.php">Register</a>';
            if (!empty($_SESSION['username'])) {
                echo '
                  <a class="navbar-link" href="adminSite.php">Control Panel</a>';
                } 
        
        ?>
        </nav>
        
        <!--List of links-->
    </header>
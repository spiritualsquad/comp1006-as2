<!-- This site is common header for all fields-->
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
            
            if(!empty($_SESSION['username'])){
                echo'<a href="admins.php">Administrators</a>
                <a href="pages.php">Pages</a>
                <a href="logo.php">Logo</a>
                <a href="index.php">Public Site</a>
                <a href="logout.php">Log Out</a>';
            }
        ?>
        </nav>
        
        
    </header>
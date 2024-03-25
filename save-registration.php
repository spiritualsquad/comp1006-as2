<?php
// capture form inputs
$username = $_POST['username'];
$password =$_POST['password'];
$confirm =$_POST['confirm'];
$ok = true;
//validate inputs
if(empty($username)){
    echo'Username is required<br/>';
    $ok = false;
}
if(strlen($password)<8){
    echo '8-Char Password is required<br /.';
    $ok = false;
}
if($password !=$confirm){
    echo 'Passwords must match<br/>';
    $ok = false;
}
if($ok){
    // hash the password
    $passwordHash =password_hash($password,PASSWORD_DEFAULT);
    // connect to db check for username duplicate & insert new user
    include('shared/db.php');

    //duplicate user check
    $sql ="SELECT * FROM user WHERE username =:username";
    $cmd =$db->prepare($sql);
    $cmd->bindParam(':username',$username, PDO::PARAM_STR,50);
    $cmd->execute();
    $users =$cmd->fetchAll();

    if(!empty($users)){
        $db=null;
        header('location:register.php?duplicate=true');
        exit();
    }
    $sql ="INSERT INTO user(username,password) VALUES (:username,:password)";
    $cmd = $db->prepare($sql);
    $cmd->bindParam(':username',$username,PDO::PARAM_STR,50);
    $cmd->bindParam(':password',$passwordHash,PDO::PARAM_STR,255);
    $cmd->execute();
    //disconnect
    $db = null;
    //confirmation
    echo 'Saved';
    //redirect to login
    header('location:login.php');
}
?>
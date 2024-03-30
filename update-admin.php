<?php
// capture form inputs
$username = $_POST['username'];
$password =$_POST['password'];
$confirm =$_POST['confirm'];
$validPassword = true;
//validate inputs
if(empty($username)){
    echo'Username is required<br/>';
    $validPassword = false;
}
if(strlen($password)<8){
    echo '8-Char Password is required<br /.';
   $validPassword = false;
}
if($password !=$confirm){
    echo 'Passwords must match<br/>';
   $validPassword = false;
}
if($validPassword){
    // hash the password
    $passwordHash =password_hash($password,PASSWORD_DEFAULT);
    // connect to db check for username duplicate & insert new user
    include('shared/db.php');

    

    $sql ="UPDATE user SET username = :username, password = :password WHERE username = :username";
    $cmd = $db->prepare($sql);
    $cmd->bindParam(':username',$username,PDO::PARAM_STR,16);
    $cmd->bindParam(':password',$passwordHash,PDO::PARAM_STR,255);
    $cmd->execute();
    //disconnect
    $db = null;
    //confirmation
    echo 'Saved';
    //redirect to login
    header('location:admins.php');
}
?>
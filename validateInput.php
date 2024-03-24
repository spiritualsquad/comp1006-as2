<?php
//capture form inputs
$username =$_POST['username'];
$password =$_POST['password'];


//connect
include('shared/db.php');
$sql ="SELECT * FROM users WHERE username =:username";
$cmd=$db->prepare($sql);
$cmd->bindParam(':username',$username,PDO::PARAM_STR,50);
$cmd->execute();
$user = $cmd->fetch();

//look for this username
if(empty($user)){
    $db = null;
    header('location:login.php?invalid=true');
}
//if we find a user with this username check hashed password
if(!password_verify($password,$user['password'])){
    $db = null;
    header('location:login.php?invalid=true');
}
else{
    session_start();//access the current session on the server 
    $_SESSION['username']=$username;
    $db = null;
    header('location:index.php');
}
/// invalid = login valid =  shows.php
//disconnect

?>
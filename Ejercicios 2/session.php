<?php
    include "config.php";
    session_start();

    $user_check = $_SESSION['login_user'];
    $session_query = mysqli_query($db, "select username from admin where username = '$user_check'");
    $row = mysqli_fetch_array($session_query,MYSQLI_ASSOC);
    $login_session = $row['username'];
    if(!isset($_SESSION['login_user']))
    {
        header("location:login.php");
    }
?>

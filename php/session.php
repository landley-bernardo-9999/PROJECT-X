<?php
    inlcude('config.php');
    session_start();

    $user_check = $_SESSION['login_user'];
    $ses_sql = mysqli_query($db, "SELECT username from admin where username = '$usercheck' ");
    $row  = mysqli_fetch_array($ses_sql, MYSQLI_ASSOC);
    $login_session = $row['username'];

    if(!isset($_SESSION['login_user'])){
        header("location:login.php");
    }


?>
<?php
    include 'config.php';

    $myusername = $_POST['username'];
    $mypassword = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username = '$myusername' AND password = '$mypassword' ";
    $result = $conn->query($sql);

    if(!$row = $result->fetch_assoc()){
        echo "Your username or password is incorrect!";
    }else{
        echo "You are logged in!";
    }

?>
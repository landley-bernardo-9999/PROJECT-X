<?php
    include 'config.php';

    $myusername = $_POST['username'];
    $mypassword = $_POST['password'];

    $sql = "SELECT * FROM employees WHERE username = '$myusername' AND pass = '$mypassword' ";
    $result = $conn->query($sql);

    if(!$row = $result->fetch_assoc()){
        echo "Your email or password is incorrect!";
      
    }else{
        echo "Login successfully!";
    }

?>
<?php
    include 'config.php';

    $myusername = $_POST['username'];
    $mypassword = $_POST['password'];

    $query = "SELECT * FROM employees WHERE username = '$myusername' AND pass = '$mypassword' ";
    $result = mysqli_query($conn,$query);

    if(!$row = $result->fetch_assoc()){
        echo "<script>alert('The username or password you entered is incorrect!');</script>";
      
    }else{
        echo "<script>alert('Login Sucessfully!');</script>";
    }

?>
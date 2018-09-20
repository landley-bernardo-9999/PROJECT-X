<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!--Custom CSS-->
    <link rel="stylesheet" href="../../custom-css/forgot-pass.css">

    <!--Font awesome links-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    
    <title>Forgot Password</title>

    <!--Database's configuration MySQL-->

  </head>
  <body>
         <?php
            include_once "../config.php";
            session_start();

             if(!$conn)
            {
                die("Connection failed: ".mysqli_connect_error());
            }
            if(isset($_POST['submit']))
            {
                $newPass = mysqli_real_escape_string($conn, $_POST['newPass']);
                $sessionUsername  = $_SESSION['userName'];
                $query = "UPDATE info SET pass = '$newPass' WHERE userName = '$sessionUsername'";
                
            }
            else
            {

            }       
?>
    <!--Resetting the password-->
    <div class="container">
        <form action="../pages/reset-pass.php" method="POST">  
          <h1><i class="fas fa-lock"></i>&nbspForgot Password</h1>
          <br>
          <!--Re-enter the new password-->
            <div class="form-group">
                <input name="newPass" type="text" class="form-control" aria-describedby="emailHelp" placeholder= "Enter your new password.">
            </div>

          <!---Submit Button-->
            <button type="submit" style="display:block" name="submit" id="submit" class="btn btn-primary">Proceed</button>
            <br>
            <a id="retype-username" href="forgot-pass.php" style="display:block" class="btn btn-primary btn-md" role="button">Retype Username</a>
            <br>
            <a href="../../index.php" style="display:block" class="btn btn-primary btn-md" role="button">Back to Login Page</a>
          </form>
	</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    
    <!--Show and hide the result div-->
  
  </body>
</html>   
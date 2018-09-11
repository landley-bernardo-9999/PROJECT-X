<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!--Custom CSS-->
    <link rel="stylesheet" href="../custom-css/sign-up.css">     

    <title>Sign Up</title>

    <!--database's configuration MYSQL-->
    <?php
        include_once 'config.php';
    ?>

  </head>
  <body>
     
    <!--Adding values to the database using PHP-->
      <?php
       if (!$conn) 
        {
          die("Connection failed: " . mysqli_connect_error());
        }
            if(isset($_POST['submit']))
            {
                $firstName = $_POST['firstName'];
                $lastName = $_POST['lastName'];
                $birthDate = $_POST['birthDate'];
                $username = $_POST['username'];
                $pass = $_POST['pass'];
                $encryptPass = md5($pass);//ecncrypt the password using MD5.
                $repeatPass = $_POST['repeatPass'];
                $city = $_POST['city'];
                $country = $_POST['country'];
                $zip = $_POST['zip'];
                $mobileNumber = $_POST['mobileNumber'];

                $query = "SELECT * FROM employees WHERE username = '$username' ";

                $sql = mysqli_query($conn, $query);

                //confirm the password.
                if($pass!=$repeatPass)
                {
                  echo "<script>alert('Password does not match!');</script>";
                }
                
                else
                {
                  //avoid duplicate in username.
                  if(mysqli_num_rows($sql) > 0 )
                {
                  echo "<script>alert('username already exists!');</script>";
                }

                else{ 
                  //adding record to the databases
                  $query = "INSERT INTO employees (firstName, lastName, birthDate, username, pass, mobileNumber, city, country, zip)
                    VALUE('$firstName','$lastName','$birthDate','$username','$encryptPass',' $mobileNumber','$city','$country','$zip')";
                                        
                    $result=mysqli_query($conn,$query);

                      if($result==1)
                      {
                        echo "<script>alert('A new employee has been added sucessfully!');</script>";
                      }

                      else
                      {
                        echo "<script>alert('This employee cant be added to the database. Please try again or contact your IT personnel.');</script>";
                      }

                    }
                 }
                
              }//end of submit button
            mysqli_close($conn); //close the database connection.
      ?>

        <form action="sign-up-emp.php" method="POST">
          <h1>Sign Up Employee</h1>
          <br>
                <div class="form-row">
              <!--Employee's First Name-->
                  <div class="col-md-12 mb-3">
                    <input name="firstName" type="text" class="form-control" placeholder="First name" required>
                  </div>
              <!--Employee's Last Name-->
                  <div class="col-md-12 mb-3">
                    <input name="lastName" type="text" class="form-control" placeholder="Last name" required>
                  </div>
              <!--Birthdate-->
                  <label for="validationDefault03">Date of Birth</label>
                  <div class="col-md-12 mb-3">
                    <input name="birthDate" type="date" class="form-control" placeholder="Date of Birth">
                  </div>
              <!--Username-->
                  <div class="col-md-12 mb-3">
                      <input name="username" type="text" class="form-control" placeholder="Username" aria-describedby="inputGroupPrepend2" required>
                  </div>
              <!--Passsword-->
                  <div class="col-md-12 mb-3">
                      <input name="pass" type="password" minlength="8" class="form-control"  placeholder="Password (at least 8 characters)" aria-describedby="inputGroupPrepend2" required>
                  </div>
              <!--Re-enter password-->
                   <div class="col-md-12 mb-3">
                      <input name="repeatPass" type="password" minlength="8" class="form-control" placeholder="Please confirm your password." aria-describedby="inputGroupPrepend2" required>
                  </div>
              <!--Mobile number-->    
                    <div class="col-md-12 mb-3">
                      <input name="mobileNumber" type="text" minlength="11" maxlengtj="11" class="form-control"  placeholder="Mobile number" aria-describedby="inputGroupPrepend2" required>
                      </div>
                    </div>
                </div>
              <!--Address-->
                <div class="form-row">
                    <label for="validationDefault03">Address</label>
              <!--City-->
                  <div class="col-md-12 mb-3">
                    <input name="city" type="text" class="form-control"  placeholder="City" required>
                  </div>
              <!--Country-->
                  <div class="col-md-12 mb-3">
                    <input name="country" type="text" class="form-control"  placeholder="Country" required>
                  </div>
              <!--Zip-->
                  <div class="col-md-12 mb-3">
                    <input name="zip" type="text" class="form-control" placeholder="Zip" required>
                  </div>
                </div>

                <div class="form-group">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" required>
                    <label class="form-check-label" for="invalidCheck2">
                      Agree to terms and conditions
                    </label>
                  </div>
                </div>
                <button name="submit" class="btn btn-primary" type="submit">Submit</button>
              </form>
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>   
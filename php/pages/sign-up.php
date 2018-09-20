<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!--Custom CSS-->
    <link rel="stylesheet" href="../../custom-css/sign-up.css">     

    <title>Sign Up</title>

    <!--database's configuration MYSQL-->
    <?php
        include_once '../config.php';
    ?>

  </head>
  <body>
     
    <!--Adding values to the database using PHP-->
      <?php
        if (!$conn) {
          die("Connection failed: " .mysqli_connect_error());
        }
            if(isset($_POST['submit']))
            {
                $type = mysqli_real_escape_string($conn,$_POST['type']); //access type of user
                $firstName = mysqli_real_escape_string($conn, $_POST['firstName']); //access first name
                $lastName = mysqli_real_escape_string($conn, $_POST['lastName']);  //access last name
                $userName = mysqli_real_escape_string($conn, $_POST['userName']); //access username
                $pass = mysqli_real_escape_string($conn, $_POST['pass']); //access password
                $encryptedPass = md5($pass);
                $confirmPass = (mysqli_real_escape_string($conn,$_POST['confirmPass'])); //access confirm password
                $img = $_POST['img']; //access img
                $gender = $_POST['gender']; //access gender
                $birthDate = $_POST['birthDate']; // access birthdate
                $mobileNumber = mysqli_real_escape_string($conn, $_POST['mobileNumber']);  //access mmobile number
                $emailAddress = mysqli_real_escape_string($conn, $_POST['emailAddress']);  // access email address
                $city = mysqli_real_escape_string($conn, $_POST['city']);  //access city

                //Check for username's availability.
                $query = "SELECT * FROM info WHERE userName = '$userName' ";
                $result = mysqli_query($conn, $query);
                if(mysqli_num_rows($result) > 0)
                {
                  echo "<script>alert('Username is no longer available!');</script>";
                }

                else
                { 
                  //Check for email address' availability.
                  $query = "SELECT * FROM info WHERE emailAddress = '$emailAddress' ";
                  $result = mysqli_query($conn, $query);
                  if(mysqli_num_rows($result) > 0)
                  {
                    echo "<script>alert('Email already exists!');</script>";
                  }
                  else
                  {
                    //Check for the password's consistency.
                    if($pass!=$confirmPass)
                    {
                      echo "<script>alert('Password does not match!');</script>";
                    }
                    else
                    {
                         //insert the record to the database
                      $query = "INSERT INTO info (type, firstName, lastName, userName, pass, img, gender, birthDate, mobileNumber, emailAddress, city )
                      VALUE ('$type','$firstName','$lastName','$userName','$encryptedPass','$img','$gender','$birthDate','$mobileNumber','$emailAddress','$city') ";                      
                      $result=mysqli_query($conn,$query);
                      if(!$result)
                      {
                        echo "Failure to add user. Please try again or contact your IT department." + mysqli_error($conn);
                      }
                      else
                      {
                        echo "<script>alert('A new user has been added to the database!');</script>";
                        mysqli_close($conn); //close the database's connection.
                      }
                    }
                  }
                }
                
            }//end of submit button
      ?>      
            <!--Redirect the to the same php file.-->
            <div class="container-fluid" id="login-link">
              <a class="btn btn-primary" href="../../index.php" role="button">Login</a>
            </div>

        <form action="../pages/sign-up.php" method="POST"> 
          <h1>Sign Up</h1>
          <br>
            <div class="form-row">            <!--Start div form-->

            <!--TYPE FORM-->
             <div class="col-md-12 mb-3">       
                    <select name="type" class="form-control">
                        <option selected>Type of User</option>
                        <option>Resident</option>
                        <option>Owner</option>  
                        <option>Employee</option>
                        <option>Contact Person</option>  
                    </select>
            </div>                            
            
            <!--FIRST NAME-->
              <div class="col-md-12 mb-3">    
                    <input name="firstName" type="text" class="form-control" placeholder="First name" required>
              </div>                          
           
            <!--LAST NAME-->
              <div class="col-md-12 mb-3">
                    <input name="lastName" type="text" class="form-control" placeholder="Last name" required>
              </div>
              
            <!--USER NAME-->
              <div class="col-md-12 mb-3">
                    <input name="userName" type="text" class="form-control" placeholder="Username" aria-describedby="inputGroupPrepend2" required>
              </div>
            
            <!--PASSWORD-->
              <div class="col-md-12 mb-3">
                    <input name="pass" type="password" minlength="8" class="form-control"  placeholder="Password (at least 8 characters)" aria-describedby="inputGroupPrepend2" required>
              </div>

            <!--CONFIRM PASSWORD-->
                   <div class="col-md-12 mb-3">
                      <input name="confirmPass" type="password" minlength="8" class="form-control" placeholder="Please confirm your password." aria-describedby="inputGroupPrepend2" required>
                  </div>

            <!--UPLOAD IMAGE-->
              <label for="">Upload image</label>
                  <div class="col-md-12 mb-3">
                    <input name="img" type="file" >
                 </div>

            <!--GENDER-->
             <div class="col-md-12 mb-3">    
                    <select name="gender" id="inputGender" class="form-control">
                        <option selected>Gender</option>
                        <option>Male</option>
                        <option>Female</option>    
                    </select>
            </div>
           
            <!--DATE OF BIRTH-->
              <label for="validationDefault03">Date of Birth</label>
                  <div class="col-md-12 mb-3">
                    <input name="birthDate" type="date" class="form-control" id="exampleInputBDO1" placeholder="Date of Birth">
                  </div>

            <!--MOBILE NUMBER-->
                  <div class="col-md-12 mb-3">    
                        <input name="mobileNumber" type="text" minlength="11" maxlength="11" class="form-control" placeholder="Mobile number" aria-describedby="inputGroupPrepend2" required>
                  </div>
             
            <!--EMAIL ADDRESS-->
                  <div class="col-md-12 mb-3">    
                        <input name="emailAddress" type="email" class="form-control" placeholder="Email address" aria-describedby="inputGroupPrepend2" required>
                  </div>
  
           <!--CITY-->
                  <div class="col-md-12 mb-3">
                        <input name="city" type="text" class="form-control" placeholder="City" required>
                  </div>
          </div>
            <!--TERMS AND CONDITIONS-->
                </div>
                <div class="form-group">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="invalidCheck2" required>
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
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
        if (!$conn) {
          die("Connection failed: " . mysqli_connect_error());
        }
            if(isset($_POST['submit']))
            {
                $contactPerson = $_POST['contactPerson'];
                $rel = $_POST['rel'];
                $contactPersonMobileNumber = $_POST['contactPersonMobileNumber'];


                $query = "INSERT INTO residents (firstName, lastName, rel, mobileNumber)
                  VALUES('$firstName','$rel','$contactPersonMobileNumber') ";    
                    
                $result=mysqli_query($conn,$query);

                if($result==1){
                  echo "<script>alert('A new resident has been added sucessfully!');</script>";
                }

                else{
                  echo "<script>alert('This resident cant be added to the database. Please try again or contact your IT personnel.');</script>";
                }
                
            }//end of submit button.

            mysqli_close($conn); //close the database connection.

      ?>

        <form action="sign-up-res.php" method="POST">
          <h1>Sign Up Resident</h1>
          <br>
            <!--Room Information-->
            <div class="form-row"> 
            <!--Unit No-->
                <label for="validationDefault03">Room Information</label>
                <div class="col-md-12 mb-3">
                  <input name="roomNo" type="text" class="form-control" placeholder="Unit No" required>
                </div> 
            <!--Bed No-->
                <div class="col-md-12 mb-3">
                  <input name="bedNo" type="text" class="form-control" placeholder="Bed No" required>
                 </div> 
            <!--Status of the resident-->
                 <div class="col-md-12 mb-3">
                 <select name="stat" id="inputStat" class="form-control">
                        <option selected>Status</option>
                        <option>Active</option>
                        <option>Inactive</option>
                        <option>Pending</option>    
                    </select>
                 </div>
            <!--Move in date-->
                 <label for="validationDefault03">Move-in date</label>
                  <div class="col-md-12 mb-3">
                  <input name="moveInDate" type="date" class="form-control">
                  </div>
            <!--Move out date-->
            <label for="validationDefault03">Move-out date</label>
                  <div class="col-md-12 mb-3">
                  <input name="moveOutDate" type="date" class="form-control">
                  </div>      
            </div>

            <!--Resident Information-->
                <div class="form-row">
                <label for="validationDefault03">Resident Information</label>
            
            <!--First name-->
                  <div class="col-md-12 mb-3">
                    <input name="firstName" type="text" class="form-control" placeholder="First name" required>
                  </div>
            <!--Last name-->
                  <div class="col-md-12 mb-3">
                    <input name="lastName" type="text" class="form-control" placeholder="Last name" required>
                  </div>
             <!--Gender-->
             <div class="col-md-12 mb-3">    
                    <select name="gender" id="inputGender" class="form-control">
                        <option selected>Gender</option>
                        <option>Male</option>
                        <option>Female</option>    
                    </select>
            </div>
            <!--School-->
                <div class="col-md-12 mb-3">
                    <input name="school" type="text" class="form-control" placeholder="Name of the School" required>
                 </div>
            <!--Course-->
                <div class="col-md-12 mb-3">
                    <input name="course" type="text" class="form-control" placeholder="Degree currently taking up" required>
                </div>
            <!--Year level-->
                  <div class="col-md-12 mb-3">
                    <input name="yearLevel" type="number" min="1" class="form-control" placeholder="Year Level" required>
                 </div>
            <!--Date of Birth-->
                  <label for="validationDefault03">Date of Birth</label>
                  <div class="col-md-12 mb-3">
                  <input name="birthDate" type="date" class="form-control" id="exampleInputBDO1" placeholder="Date of Birth">
                  </div>    
            <!--Mobile No-->
                  <div class="col-md-12 mb-3">    
                        <input name="mobileNumber" type="text" minlength="11" maxlengtj="11" class="form-control" placeholder="Mobile number" aria-describedby="inputGroupPrepend2" required>
                  </div>
             <!--Email address-->
             <div class="col-md-12 mb-3">    
                        <input name="emailAddress" type="email" class="form-control" placeholder="Email address" aria-describedby="inputGroupPrepend2" required>
                  </div>
                </div>
            <!--Address-->
                <div class="form-row">
                    <label for="validationDefault03">Address</label>
            <!--City-->
                  <div class="col-md-12 mb-3">
                    <input name="city" type="text" class="form-control" placeholder="City" required>
                  </div>
            <!--Country-->
                  <div class="col-md-12 mb-3">
                    <input name="country" type="text" class="form-control" placeholder="Country" required>
                  </div>
            <!--Zip-->
                  <div class="col-md-12 mb-3">
                    <input name="zip" type="text" class="form-control" placeholder="Zip" required>
                  </div>
                </div>
                
             <!--Information of the Contact Person-->
                <div class="form-row">
                    <label for="validationDefault03">Contact Person</label>
            <!--Name of the contact person-->
                  <div class="col-md-12 mb-3">
                    <input name="contactPerson" type="text" class="form-control" placeholder="Name of the Contact Person" required>
                  </div>
            <!--Relationship with the resident-->
                  <div class="col-md-12 mb-3">
                    <input name="rel" type="text" class="form-control" placeholder="Relationship with the Resident" required>
                  </div>
            <!--Phone number of the contact person-->
                <div class="col-md-12 mb-3">
                    <input name="contactPersonMobileNumber" type="text" class="form-control" placeholder="Mobile number of the Contact Person" required>
                  </div>
            
            <!--Terms and conditions-->
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
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!--Custom CSS-->
    <link rel="stylesheet" href="custom-css/login.css">

    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    
    <!--Font awesome links-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    
    <title>{{config('app.name','Vester')}}</title>

  </head>
  <body>

    <div class="container">
    
   <!--Redirect the to the same php file.-->
   <div class="container-fluid" id="login-link">
      <a class="btn btn-primary" href="/" role="button">Login</a>
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
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    
  </body>
</html>   

<?php  
session_start();

include "includes/connection.php";
include "includes/functions.php";



// ----------------------Getting form data-----------------------------------


if ($_SERVER['REQUEST_METHOD'] == "POST"){


  $email = $_POST['email'];
  $meter = $_POST['meter'];
  $phoneNo = $_POST['phoneNo'];

  $password = $_POST['password'];




  
  //--------------------------------------Password hashing---------------------------//

  $hashPassword = password_hash($password , PASSWORD_DEFAULT);    
  
  
  
  if (!empty($email) &&  !empty($meter)  && !empty($phoneNo) && !empty($password)   ) {

  

    // --------------------------------Checking if the meter number already exist-------------------------------
    $queryMeter = "SELECT * FROM users WHERE meterNo = '$meter' ";

    $Metesult = mysqli_query($con ,$queryMeter);
    


   if ($Metesult && mysqli_num_rows($Metesult)>0) {

   

   
     echo '<script> alert("Meter number already has been singed up Contact us if you forgot the password") </script>';
   header("location: meterNoexist.php"); 
    
    
    
   }







  $user_id = random_num(20);
  $waterUsage = 438.5; 
  $electricityUsage = 46.75;
  
// -------------------------------------------Querying the form data------------------------------------------- 
  
  $query = "INSERT INTO users(user_id,email,phone ,meterNo, password , water , electricity) VALUES  ('$user_id','$email','$phoneNo', '$meter', '$hashPassword','$waterUsage','$electricityUsage')";
 
  

  mysqli_query($con ,$query);
  
  // ------------------------------------ Success message ----------------------------
  
  echo '<script> alert("The sing up process was successful ") </script>';
  
  
  
  
  } else {
  // ------------------------------- error message ----------------------------------------- 



    echo '<script> alert("Please enter valid information") </script>';
  }
  
  
  }
  
  
  
  
  ?>
  















<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sing up</title>
    
    

    <?php include "includes/fonts.php" ?>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
<?php  include "includes/navigation.php"  ?>

<section>

<div class="form-wrap">
  <h5>Sing up</h5>
<form method="POST"  action="singup.php" >


<!-- Email input -->
<div class="form-outline mb-4">
<label class="form-label" for="form1Example1">Email address</label>   
<input name="email" type="email" id="form1Example1" class="form-control" />
   
</div>




<!-- Phone Number input -->
<div class="form-outline mb-4">
    <label class="form-label" for="form1Example1">Phone Number</label>   
    <input name="phoneNo" type="number" id="form1Example1" class="form-control" />
   
  </div>


  






<!-- Meter number input -->
   <div class="form-outline mb-4">
    <label class="form-label" for="form1Example1">Meter Number</label>   
    <input name="meter" type="meter" id="form1Example1" class="form-control" />
   
  </div>




  <!-- Password input -->
  <div class="form-outline mb-4">
     <label class="form-label" for="form1Example2">Password</label> 
     <input name="password" type="password" id="form1Example2" class="form-control" />
  
  </div>

  <!-- 2 column grid layout for inline styling --> 
  <!-- <div class="row mb-4">
    <div class="col d-flex justify-content-center">
      Checkbox
      <div class="form-check">
        <input
          class="form-check-input"
          type="checkbox"
          value=""
          id="form1Example3"
          checked
        />
        <label class="form-check-label" for="form1Example3"> Remember me </label>
      </div>
    </div> -->

    <!-- <div class="col">
 
      <a href="#!">Forgot password?</a>
    </div>
  </div> -->

  <!-- Submit button -->
 <div class="btn-wrap">  <button name="submit" type="submit" class="btn btn-primary btn-block">Sign up</button></div>
</form>




</div>


</section>







<?php include "includes/footer.php"?> 


<?php  include "includes/Bscripts.php"  ?>
</body>
</html>
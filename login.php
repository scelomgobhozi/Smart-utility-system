



<?php  
session_start();



// ------------------------Including other php files------------------




include("includes/connection.php");
include("includes/functions.php");





// ----------------Once  submit button is pressed-------------------
if ($_SERVER['REQUEST_METHOD'] == "POST"){


$meter = $_POST['meter'];
$password = $_POST['password'];




// ---------------------------- Checking if everything is submitted as it is supposed to----------------
if (!empty($meter) && !empty($password)  ) {
 
$query = "SELECT * FROM users WHERE meterNo = '$meter' limit 1";

$result = mysqli_query($con ,$query);


if($result)
{

if($result && mysqli_num_rows($result)>0){


  $user_data = mysqli_fetch_assoc($result);
  
  // -------------------------------------Verfying password-----------------------

 $decryption = password_verify($password , $user_data['password']);
 
 
  if ($decryption){

  $_SESSION['user_id'] = $user_data['user_id'];

  header("location: dashboard.php"); 
 
  }   
  }


}

// ---------------------If there something wrong-------------

echo '<script>alert("Please enter valid login information")</script>';


} else {
  echo '<script>alert("Please enter valid login information")</script>';

}


}







?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    
    

    <?php include "includes/fonts.php" ?>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
<?php  include "includes/navigation.php"  ?>

<section>

<div class="form-wrap">
<h5>Login</h5>
<form  action="login.php" method="POST">




<!-- meter number input -->
   <div class="form-outline mb-4">
    <label class="form-label" for="form1Example1">Meter Number</label>   
    <input name="meter" type="number" id="form1Example1" class="form-control" />
   
  </div>




  <!-- Password input -->
  <div class="form-outline mb-4">
     <label class="form-label" for="form1Example2">Password</label> 
     <input name="password" type="password" id="form1Example2" class="form-control" />
  
  </div>

  

    <div class="col">
      <!-- Simple link -->
      <a href="singup.php">Singup</a>
    </div>
    <div class="btn-wrap">  <button name="submit" type="submit" class="btn btn-primary btn-block">Sign in</button></div>
  </div>


 
</form>




</div>


</section>









<?php include "includes/footer.php"?>


<?php  include "includes/Bscripts.php"  ?>
</body>
</html>
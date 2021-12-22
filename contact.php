<?php

include "includes/connection.php";
include "includes/functions.php";






if ($_SERVER['REQUEST_METHOD'] == "POST"){


$cellphoneNo = $_POST['phoneNo'];
$fullname = $_POST['nameSurname'];
$message = $_POST['message'];







//--------------------------------------Password hashing---------------------------//

  



if (!empty($cellphoneNo) &&  !empty($fullname)  && !empty($message)   ) {



 $query = "INSERT INTO quries (fullname,phone_number ,message) VALUES  ('$fullname','$cellphoneNo','$message')";



$results = mysqli_query($con ,$query);


if($results){
echo '<script> alert("Our team will be incontact with you very soon"); </script>';
}
// ------------------------------------ Success message ----------------------------


  
  



 








// -------------------------------------------Querying the form data------------------------------------------- 






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
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
   <?php include "includes/fonts.php" ?>
   <link rel="stylesheet" href="css/login.css">
</head>
<body>

<?php include "includes/navigation.php" ?>







<section>

<div class="form-wrap">
  <h5>Contact us</h5>
<form method="POST"  action="contact.php" >


<!-- Email input -->
<div class="form-outline mb-4">
<label class="form-label" for="form1Example1">Name and Surname</label>   
<input name="nameSurname" type="text" id="form1Example1" class="form-control" />
   
</div>




<!-- Phone Number input -->
<div class="form-outline mb-4">
    <label class="form-label" for="form1Example1">Phone Number</label>   
    <input name="phoneNo" type="number" id="form1Example1" class="form-control" />
   
  </div>


  






<!-- Meter number input -->
<div class="form-group">
    <label for="exampleFormControlTextarea1">Message</label>
    <textarea name="message" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
  </div>




  <!-- Password input -->
 

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
 <div class="btn-wrap"> 
      <button name="submit" type="submit" class="btn btn-primary btn-block">Submit</button>
    </div>
</form>




</div>

 
</section>


<?php include "includes/footer.php" ?>
<?php include "includes/Bscripts.php" ?>    

</body>
</html>
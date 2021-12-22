<?php  
session_start();




include("includes/connection.php");
include("includes/functions.php");




$ch = curl_init();

$url = "https://sheet.best/api/sheets/743840fc-1c6f-43e6-9f4b-30d153b0fddb";


curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER , true);

// echo CURLOPT_RETURNTRANSFER;
$resp = curl_exec($ch);

if ($e = curl_error($ch)){
   
}

else{
 $decoded = json_decode($resp,true);
 
 $avgusage = $decoded[8]['Water Usage in Liters'];  
 
}





?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Water</title>
    
    

    <?php include "includes/fonts.php" ?>
    <link rel="stylesheet" href="">
</head>
<body>
<?php  include "includes/Dnav.php"  ?>






<style>

.elect-summary-wrapper{
   width: 40%; 
   background-color: #E3EAE6;
   margin: auto;
   margin-top: 10rem;
   border-radius: 10px;
   height: 170px;
   margin-bottom: 11rem;
   padding-top: 2rem;
   padding: 2rem  2rem 6rem 2rem;
   font-family: 'Roboto';
}

li{
list-style: none;
padding-top: 1rem; 
font-weight: bold;   

}

ul{
margin-top: 2rem;    
margin: auto;
}

</style>

<section>




<div class="elect-summary-wrapper">

<div class="elect-summary">

<ul>

<li>Estimated Monthly Water cost: R <?php echo ($avgusage*30)*0.020 ?>  </li>


<li>Estimated Water monthly usage: <?php echo  $avgusage*30;?>Liters  </li>
 
<li> </li>







</ul>
  







</div>


</div>















</section>


<?php  include "includes/footer.php"  ?>
<?php  include "includes/Bscripts.php"  ?>
</body>
</html>
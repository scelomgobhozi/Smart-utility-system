<?php 
 session_start();
 include "includes/connection.php";
 include "includes/functions.php";
 
$user_data = check_login($con);

  
$waterUsed =  $user_data['water'] ;



$backC = "#0f037e";

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
 $usage =  'Electricity usage Kwh)';
 $avgusage = $decoded[8]['Water Usage in Liters'];  
 
}

 
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <?php include "includes/fonts.php" ?>
    <link rel="stylesheet" href="css/dashboard2.css">
</head>
<body>
<?php        include "includes/Dnav.php" ?>

<section>




<div class="intro">
<p>Smart Management system Dashboard</p>
<a href="dashsummary2.php"><p class="p-s">Water stats overview</p></a>
</div>



<div class="info-wrapper">

<div class="usage-info">

<div class="row">


<!-- --------------------For electricity usage------------------------ -->
<div class="col-lg-6 col-md-6  col-wrap">

<div class="electricity-usage">

<h5 class="card-title">Water usage status</h5>
<div  class="card-body electricity-status">

<p class="card-text  card-watt "> <?php  echo $wMeter($avgusage);  ?>  </p>

      
</div>
</div>
</div>


<div class="col-lg-6 col-md-6 col-wrap" >

<div class="electricity-usage">

<h5 class="card-title">Water usage  (per day)</h5>
<div class="card-body electricity-status">


<p class="card-text  card-watt">    <?php echo $avgusage ?> Liters  </p>
      
</div>
</div>
</div>








<div class="col-lg-6 col-md-6 col-wrap" >

<div class="electricity-usage usage-state2">

<!-- ------------------------Warning color codes---------------------- -->


<h5 class="card-title">Water usage status codes</h5>
<div class="card-body ">
<table>
<tr>
 <td>  <div class="color-low" ></div></td>
 <td>  <p>Low</p> </td>
</tr>


<tr>
<td> <div class="color-avg"></div> </td> 
 <td><p>Avarage</p></td>

</tr>
      
<tr>
<td>  <div class="color-H" ></div>  </td>


<td> <p>High</p> </td>
</tr>
</table>

</div>
</div>
</div>





<div class="col-lg-6 col-md-6 col-wrap" >

<div class="electricity-usage ">

<h5 class="card-title">Water saving tips</h5>
<div class="card-body tips status-tips">

<!-- --------------------------------water ssaving tips--------------------------- -->

<p class="card-text">  Reduce the amount of water you use when flushing the toilet. </p>


</div>
</div>
</div>








<!-- --------------------For electricity usage------------------------ -->

<!-- <div class="col-lg-6 col-md-6">

<div class="water-usage">

<div class="card-body water-status">
       
      
      </div> -->


<!-- <p>Electricity  usage</p>

<p>800 Watts</p>

<p>Status : Avarage </p> -->

    
</div>






</div>





</div>

</div>


<div class="logout-wrap">



</div>


</div>





</section>













    

<?php include "includes/footer.php"?>

</body>
</html>













<!-- -----------------------------------------------Stuff i need--------------------------------- -->



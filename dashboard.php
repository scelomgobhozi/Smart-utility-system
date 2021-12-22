<?php 
 session_start();
 include "includes/connection.php";
 include "includes/functions.php";
 
$user_data = check_login($con);

  


$electricityUsed = $user_data['electricity'];



$electC($electricityUsed);


$ch = curl_init();

$url = "https://sheet.best/api/sheets/a6c5896a-c080-4afe-9c6c-467192636a1b";


curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER , true);

// echo CURLOPT_RETURNTRANSFER;
$resp = curl_exec($ch);

if ($e = curl_error($ch)){
   
}

else{
 $decoded = json_decode($resp,true);
 $usage =  'Electricity usage Kwh)';
 $avgusage = $decoded[8]['Electricity usage Kwh)'];  
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
    <link rel="stylesheet" href="css/dashboard.css">
</head>
<body>
<?php        include "includes/Dnav.php" ?>

<section>

<div class="intro">
<p>Smart Management system Dashboard</p>

<a href="dashsummary.php" class="p-s" >Electricity stats overview</a>
</div>



<div class="info-wrapper">

<div class="usage-info">

<div class="row">


<!-- --------------------For electricity usage------------------------ -->
<div class="col-lg-6 col-md-6  col-wrap" >

<div class="electricity-usage">

<h5 class="card-title">Electricity usage status</h5>
<div class="card-body electricity-status">
  
<!-- ------------------------------------status Label--------------------------- -->
<p class="card-text  card-watt "> <?php  echo $electC($avgusage);  ?>  </p>

      
</div>





<!-- <p>Water usage</p>

<p>800 Liters</p>

<p>Status : high </p> -->

</div>



</div>


<div class="col-lg-6 col-md-6 col-wrap" >

<div class="electricity-usage">

<h5 class="card-title">Electricity usage (per day)</h5>
<div class="card-body electricity-status">

<!-- -----------------------------Electricity value in watts-------------------------- -->
<p class="card-text  card-watt">  <?php echo $avgusage ?> watts </p>
      
</div>
</div>
</div>








<div class="col-lg-6 col-md-6 col-wrap" >

<div class="electricity-usage usage-state2">

<h5 class="card-title">Electricity usage status codes</h5>
<div class="card-body ">
<table>
<tr>
 <td>  <div class="color-low" ></div></td>
 <td>  <p>Low</p> </td>
</tr>


<tr>
<td> <div class="color-avg"></div> </td> 
 <td><p>Medium</p></td>

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

<h5 class="card-title">Electricity saving tips</h5>
<div class="card-body tips status-tips">


<p class="card-text">   Install a timer on your geyser. </p>

<p class="card-text">   Save up to 16% on your bill by insulating your home properly.. </p>

<!-- <p class="card-text">  Don’t open the door unnecessarily and make sure the seal is intact. </p>
<p class="card-text"> Do not buy larger or more powerful appliances than are actually required.  </p>
<p class="card-text">   </p>
       -->
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




<div class="water-container">





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


<!-- For electricity -->

<!-- <div class="card-body">
        <h5 class="card-title">Electricity usage</h5>
        <p class="card-text"> usage : <?php //echo $electricityUsed ?> watts </p>
        <p class="card-text"> Status :<?php  //echo $electC($electricityUsed);  ?>  </p>

      
      </div> -->



<!-- For water usage -->


<!-- <div class="water-usage">


<div class="card-body">
<h5 class="card-title">Water usage</h5>
<p class="card-text"> usage : <?php //echo $waterUsed ?> Litres </p>
<p class="card-text"> Status : <?php  //echo $wMeter($waterUsed);  ?> </p>

      
</div> -->
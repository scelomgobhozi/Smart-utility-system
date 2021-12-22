<?php 


// ------------------------------------checks if user is logged in--------------------------

function check_login($con){
if(isset($_SESSION['user_id'])){


$id = $_SESSION['user_id'];
$query = "SELECT * FROM users WHERE user_id = '$id' limit 1";

$result = mysqli_query($con,$query);

if($result && mysqli_num_rows($result)>0){
 $user_data = mysqli_fetch_assoc($result);
 return $user_data;   
}



}



header("location: login.php");
die;

}



// --------------------------------------Generate random number for the user id column-------------

function random_num($length){

$text = "";

if ($length < 5){
  $length = 5;  

}

$len = rand(4,$length);

for ($i=0; $i < $len ; $i++) { 
    # code...
    $text .= rand(0,9);
}
return $text;

}



// -------------------------------------Functions that get the Electricity values and chenges colors--------


$electC = function ($Enumber){


if ($Enumber<30) {
 

  echo "<style>

  .electricity-status{
  background-color:#3fb37b;  
  height: 150px;  
  }
  
  
  </style>";

      
 return "low "; 
  }
   

if ($Enumber>29 && $Enumber<70) {
  

  echo "<style>

  .electricity-status{
  background-color:#fcff2e;  
  height: 150px;  
  }
  
  
  </style>";
  

  return "Medium ";
   } 
   else {
    
    echo "<style>

    .electricity-status{
    background-color:#e20000;  
    height: 150px;  
    }
    
    
    </style>";
    
    
 
    return "High";  
   }



 
};








// -------------------------------------Functions that get the Water values and chenges colors--------

$wMeter = function ($wpl){


  if ($wpl<351) {
  
    echo "<style>

    .electricity-status{
    background-color:#01a2cada ;  
    height: 150px;  
    }
    
    
    </style>";
    
  

 



   return "Low"; 
    }
     
  
  if ($wpl>350 && $wpl<501) {
    

    echo "<style>

    .electricity-status{
    background-color:#3235e6;  
    height: 150px;
    color: white;  
    }
    
    
    </style>";



   
    return "Medium";
     } 
     else {
     
     
     
    echo "<style>

    .electricity-status{
    background-color:#0f037e;  
    color: white;
    height: 150px;  
    }
    
    
    </style>";

    
      return "High";  
     }
  
  
  
   
  };




















?>





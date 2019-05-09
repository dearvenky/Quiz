


<?php
include('data.php'); 
    // receive all input values from the form
    session_start(); 
    $id=$_SESSION['student'];

    $sql="SELECT `qid`, `answer` FROM `questions` WHERE 1";
    $r = $db->query($sql);
    $n=$r->num_rows;
    $a=0;
   
    $score=0;
    $sql = "SELECT `a1`, `a2`, `a3`, `a4`, `a5`, `a6`, `a7`, `a8`, `a9`, `a10`, `a11`, `a12`, `a13`, `a14`, `a15`,`a16`, `a17`, `a18`, `a19`, `a20`, `a21`, `a22`, `a23`, `a24`, `a25`, `a26`, `a27`, `a28`, `a29`, `a30`,`a31`,`a32`,`a33`,`a34`,`a35`,`a36`,`a37`,`a38`,`a39`,`a40` `total` FROM `response` WHERE team='$id'";
    $result = $db->query($sql);
     if ($result->num_rows > 0) 
       {
         // output data of each row
        while($row = $result->fetch_assoc()) 
        {
  



         if ($n> 0) 
         {
          $i=1;
           // output data of each row
          while($a= $r->fetch_assoc()) 
          {
            if($row['a'.$i]==$a['answer'])
            {
              $score++;
            }
           $i++;

          }
         }




        }
       }
$query = "INSERT INTO response (team,total) VALUES($id,$score) ON DUPLICATE KEY UPDATE    
total=$score";
mysqli_query($db, $query);
$query = "INSERT INTO team (id,quiz) VALUES($id,$score) ON DUPLICATE KEY UPDATE    
quiz=$score";
mysqli_query($db, $query);

echo "Sucessfully saved to database";
session_destroy();
unset($_SESSION['student']);

?>



<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Results</title>
  
  
  
      <link rel="stylesheet" href="cssc/style.css">

  
</head>

<body>

  <div class="checkmark">
  <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
   viewBox="0 0 161.2 161.2" enable-background="new 0 0 161.2 161.2" xml:space="preserve">
<path class="path" fill="none" stroke="#7DB0D5" stroke-miterlimit="10" d="M425.9,52.1L425.9,52.1c-2.2-2.6-6-2.6-8.3-0.1l-42.7,46.2l-14.3-16.4
  c-2.3-2.7-6.2-2.7-8.6-0.1c-1.9,2.1-2,5.6-0.1,7.7l17.6,20.3c0.2,0.3,0.4,0.6,0.6,0.9c1.8,2,4.4,2.5,6.6,1.4c0.7-0.3,1.4-0.8,2-1.5
  c0.3-0.3,0.5-0.6,0.7-0.9l46.3-50.1C427.7,57.5,427.7,54.2,425.9,52.1z"/>
<circle class="path" fill="none" stroke="#7DB0D5" stroke-width="4" stroke-miterlimit="10" cx="80.6" cy="80.6" r="62.1"/>
<polyline class="path" fill="none" stroke="#7DB0D5" stroke-width="6" stroke-linecap="round" stroke-miterlimit="10" points="113,52.8 
  74.1,108.4 48.2,86.4 "/>

<circle class="spin" fill="none" stroke="#7DB0D5" stroke-width="4" stroke-miterlimit="10" stroke-dasharray="12.2175,12.2175" cx="80.6" cy="80.6" r="73.9"/>

</svg>
  
<p>Great Job!</p>


</div>
  
  

</body>

</html>






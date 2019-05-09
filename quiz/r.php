<!DOCTYPE html>
<html lang="en">
<head>
  <title>Results</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap.min.css">
  <script src="jquery.min.js"></script>
  <script src="bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Results Based on Quiz</h2>
         
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Team ID</th>
        <th>Name 1</th>
        <th>Name 2</th>
        <th>Quiz</th>
         <th>Quiz</th>
      </tr>
    </thead>
<tbody>


<?php

// Including database connections
include('data.php'); 
     
$query = "SELECT `id`, `student1`, `name1`, `student2`, `name2`, `quiz`, `program1`, `program2`, `total` FROM `team` ORDER BY `quiz` DESC";
$result = mysqli_query($db, $query);
$arr = array();
if(mysqli_num_rows($result) != 0) 
{
    while($row = mysqli_fetch_assoc($result)) 
    {
            


            $q=scorea($row["id"]);
           
          echo '<tr>
        <td>'.$row['id'].'</td>
        <td>'.$row['name1'].'</td>
        <td>'.$row['name2'].'</td>
         <td>'.$row['quiz'].'</td>
          <td>'.$q.'</td>
      </tr>';
    




  
            
    }
}





function scorea($id) 
{
    include('data.php'); 

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



return $score;



}










?>










    
    <tbody>
    
    </tbody>
  </table>
</div>

</body>
</html>

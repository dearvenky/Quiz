<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js" type="text/javascript"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>
  <title>Answers</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap.min.css">
  <script src="jquery.min.js"></script>
  <script src="bootstrap.min.js"></script>
</head>
<body>
 <link href='https://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>
  <div class="header">
    <CENTER><h1><strong>VASAVI COLLEGE OF ENGINEERING</strong></h1></CENTER> 
  </div>
  
  <form class="form-horizontal" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  
<div class="container-fluid">

<?php
      include('data.php'); 
        $sql = "SELECT `qid`, `question`, `option1`, `option2`, `option3`, `option4`, `answer` FROM `questions` WHERE 1";
        $result = $db->query($sql);
       $n=$result->num_rows;
       if ($result->num_rows > 0) 
       {
         // output data of each row
        while($row = $result->fetch_assoc()) 
        {
          echo "<div class='row'>
    <div class='col-sm-2' ></div>
    <div class='col-sm-8' style=background-color:lavenderblush;'>";
          echo $row["qid"].")".$row["question"]."<br>";

        echo '<div class="radio">
      <label> <input type="radio" name="'.$row["qid"].'" value="'.$row["option1"].'" >a)'.$row["option1"].'</label><br>
       <label> <input type="radio" name="'.$row["qid"].'" value="'.$row["option2"].'" >b)'.$row["option2"].'</label><br>
       <label> <input type="radio" name="'.$row["qid"].'" value="'.$row["option3"].'" >c)'.$row["option3"].'</label><br>
        <label> <input type="radio" name="'.$row["qid"].'" value="'.$row["option4"].'" >d)'.$row["option4"].'</label><br>
      Answer='.$row['answer'].'
      
    </div>';

          echo '</div><div class="col-sm-2"></div>
        </div>';
        }
       }
      
       else 
      {
        echo "0 results";
      }
    
?>


      
     
<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="login"></label>
  <div class="col-md-4">
    <button id="login" name="reg_member" class="btn btn-primary btn-block" >Save</button>
  </div>
</div>
  
</form>
 
    </p></body>

</body>
</html>


<?php
  include('data.php'); 
 
if (isset($_POST['reg_member'])) 
{
    // receive all input values from the form

    $sql = "SELECT `qid`, `question`, `option1`, `option2`, `option3`, `option4`, `answer` FROM `questions` WHERE 1";
    $result = $db->query($sql);
    $n=$result->num_rows;
    $i=1;
    for($i=1;$i<=$n;$i++)
    {
     
     if(isset($_POST[$i]))
     {
     if($answer=mysqli_real_escape_string($db, $_POST[$i]))
     {

      $sql = "UPDATE questions SET answer='$answer' WHERE qid='$i'";
      $result = $db->query($sql);
      
      }
    }
    }
    
    echo "suceessfully updated!!";
    header('location:answer.php');

  }


?>
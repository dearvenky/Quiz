
<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <script src="modernizr.min.js" type="text/javascript"></script>


    <link rel="stylesheet" href="normalize.min.css">

  

    <script src="prefixfree.min.js"></script>

</head>
<body>

  <link href='googlefont.css' rel='stylesheet' type='text/css'>


	<head>
    
	<title>Registrations</title>
</head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap.min.css">
  <script src="jquery.min.js"></script>
  <script src="bootstrap.min.js"></script>

<body>
	<div class="header">
		<CENTER><h1><strong>VASAVI COLLEGE OF ENGINEERING</strong></h1></CENTER>
    <CENTER><h2><strong>Dept of ECE</strong></h2></CENTER>
	</div>
	
	<form class="form-horizontal" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">	



<div class="form-group">
  <label class="col-md-4 control-label" for="Name">Name</label>  
  <div class="col-md-4">
  <input id="name" name="name1" type="text" placeholder="Enter Student 1 Name" maxlength="25"class="form-control input-md" required="">
    
  </div>
</div>








    <!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="Name">Roll No</label>  
  <div class="col-md-4">
  <input id="name" name="student1" type="text" placeholder="Enter Student 1 Hall Ticket No" maxlength="25"class="form-control input-md" required="">
    
  </div>
</div>






<div class="form-group">
  <label class="col-md-4 control-label" for="Name">Name</label>  
  <div class="col-md-4">
  <input id="name" name="name2" type="text" placeholder="Enter Student 2 Name" maxlength="25"class="form-control input-md" required="">
    
  </div>
</div>








    <!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="Name">Roll No</label>  
  <div class="col-md-4">
  <input id="name" name="student2" type="text" placeholder="Enter Student 2 Hall Ticket No" maxlength="25"class="form-control input-md" required="">
    
  </div>
</div>









     
<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="login"></label>
  <div class="col-md-4">
    <button id="login" name="reg_member" class="btn btn-primary btn-block" >Start</button>
  </div>
</div>
	
</form>
 
		</p></body>

</body>
</html>


<?php

  session_start(); 
  include('data.php'); 
  // variable declaration
  $username = "";
  $email    = "";
  $errors = array(); 
  $_SESSION['success'] = "";
 
if (isset($_POST['reg_member'])) 
{
    // receive all input values from the form
    $student1= mysqli_real_escape_string($db, $_POST['student1']);
    $student2= mysqli_real_escape_string($db, $_POST['student2']);
    $name1= mysqli_real_escape_string($db, $_POST['name1']);
    $name2= mysqli_real_escape_string($db, $_POST['name2']);
    $id=0;
    $query="INSERT INTO team(student1, student2,name1,name2) VALUES ('$student1','$student2','$name1','$name2')";
 
      if(mysqli_query($db, $query))
      {

        $sql = "SELECT `id` FROM `team` WHERE student1='$student1' AND student2='$student2'";
        $result = $db->query($sql);

       if ($result->num_rows > 0) 
       {
         // output data of each row
        while($row = $result->fetch_assoc()) 
        {
        $id=$row["id"];

        }

        $_SESSION['student'] = $id;
        $_SESSION['success'] = "You are now logged in";
        header('location:index.php');

       }
    

      }
       else 
      {
        echo "0 results";
      }
      

      

  }


?>
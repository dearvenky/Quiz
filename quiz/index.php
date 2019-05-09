<?php
include('data.php');

 session_start(); 

    if (!isset($_SESSION['student'])) 
    {
        $_SESSION['msg'] = "You must log in first";
        header('location: login.php');
    }

    if (isset($_GET['logout'])) 
    {
        session_destroy();
        unset($_SESSION['student']);
        header("location: login.php");
    }


?>
<html ng-app="crudApp">
<head>
<title>Quiz</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Include Bootstrap CSS -->
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<!-- Include main CSS -->
<link rel="stylesheet" type="text/css" href="css/style.css">
<!-- Include jQuery library -->
<script src="js/jQuery/jquery.min.js"></script>
<!-- Include AngularJS library -->
<script src="lib/angular/angular.min.js"></script>
<!-- Include Bootstrap Javascript -->
<script src="js/bootstrap.min.js"></script>
<script src="angular.min.js"></script>
<script src="angular-sanitize.js"></script>
  <link rel="stylesheet" href="bootstrap.min.css">
  <script src="jquery.min.js"></script>
  <script src="bootstrap.min.js"></script>
</head>
<body >
<div class="container wrapper" ng-controller="DbController">
<h1 class="text-center"> Quiz</h1>
<button type="button" class="btn btn-success btn-lg" ng-click="show=true"  onclick="openFullscreen();"  ng-hide="show">Start Quiz </button><br>
<div class="well" ng-show="show" ng-hide="!show">



<strong><h3>Team No={{team.id}}</h3>
<p class="text-right" >Time left M= <span id='timerm_div'></span></p></strong>
<strong><p class="text-right" >Time left S= <span id='timer_div'></span></p></strong>

<button class="btn btn-danger" onclick="closeFullscreen();">Close Fullscreen</button>
</div>
</nav>

<div class="well" ng-show="show" ng-hide="!show">
<button  class="btn btn-primary" ng-click="myFuncp()" ng-model="myValue" >Prev</button>
<button  class="btn btn-primary" class="text-right" ng-click="myFunc()" ng-model="myValue" >Next</button>
 
<!-- Table to show employee detalis -->


<table class="table table-hover">


<tr ng-repeat="detail in details| filter:{r:search_query}| limitTo : 1">

<td>
<span>


<form  id="editForm" ng-submit="UpdateInfo(detail)" >
{{detail.r}}){{detail.question}}</label><br>
    <label for="Gender">Options:</label><br>
 
      a) <input type="radio" name="answer" ng-model="detail.answer" value="{{detail.option1}}">{{detail.option1}}<br>
 

      b) <input type="radio" ng-model="detail.answer" value="{{detail.option2}}" >{{detail.option2}}<br>
    
      c) <input type="radio" name="gender" ng-model="detail.answer" value="{{detail.option3}}">{{detail.option3}}<br>
      d)<input type="radio" name="gender" ng-model="detail.answer" value="{{detail.option4}}">{{detail.option4}}<br>
   
   
  </div>
  
  <div class="form-group">
    <button class="btn btn-warning" >Save</button>
    <p ng-bind-html="myText">{{detail.answer}}</p>
  </div>
</form>
</span>
</td>
</tr>

</div>
</div>
</div>
<!-- Include controller -->
<script src="js/angular-script.js"></script>
</body>

<script>


$(document).ready(function(){
  $("#fullscreen").click(function(){
    $(this).hide();
    
  });
});


$( document ).ready(function() 
{
    console.log( "ready!" );
    $("question").hide();
});






document.getElementById('timer_div').innerHTML = 30;
function startTimerv(seconds_left) 
{
   
  var interval = setInterval(function() {
   --seconds_left;

    if (seconds_left <= 0) 
    {
      closeFullscreen();
      alert('timer completed');
      document.getElementById('timer_div').innerHTML = "Timeout!";
      clearInterval(interval);
      window.location = "result.php";

    }
    display(seconds_left);
  }, 1000);

}


function display(totalSeconds)
{
  hours = Math.floor(totalSeconds / 3600);
totalSeconds %= 3600;
minutes = Math.floor(totalSeconds / 60);
seconds = totalSeconds % 60;
 document.getElementById('timerm_div').innerHTML = minutes;
  document.getElementById('timer_div').innerHTML = seconds;
}



var elem = document.documentElement;
function openFullscreen() 
{

  var seconds_left = 30;

//register click event


 startTimerv(seconds_left);
  if (elem.requestFullscreen) {
    elem.requestFullscreen();
  } else if (elem.mozRequestFullScreen) { /* Firefox */
    elem.mozRequestFullScreen();
  } else if (elem.webkitRequestFullscreen) { /* Chrome, Safari & Opera */
    elem.webkitRequestFullscreen();
  } else if (elem.msRequestFullscreen) { /* IE/Edge */
    elem.msRequestFullscreen();
  }
}

function closeFullscreen() {
  if (document.exitFullscreen) {
    document.exitFullscreen();
  } else if (document.mozCancelFullScreen) {
    document.mozCancelFullScreen();
  } else if (document.webkitExitFullscreen) {
    document.webkitExitFullscreen();
  } else if (document.msExitFullscreen) {
    document.msExitFullscreen();
  }
}



</script>

</html>
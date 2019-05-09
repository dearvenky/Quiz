<?php

// Including database connections
require_once 'database_connections.php'; 
 /*session_start(); 

    if (!isset($_SESSION['admin'])) 
    {
        $_SESSION['msg'] = "You must log in first";
        header('location: login.php');

    }

    if (isset($_GET['logout'])) 
    {
        session_destroy();
        unset($_SESSION['member']);
        header("location: login.php");
    }*/
// mysqli query to fetch all data from database
     session_start(); 
    $id=$_SESSION['student'];
    $n=0;
$query = "SELECT $id as 'id',`qid`, `question`, `option1`, `option2`, `option3`, `option4` FROM `questions`  ORDER BY qid ASC";
$result = mysqli_query($con, $query);
$arr = array();
if(mysqli_num_rows($result) != 0) 
{
    while($row = mysqli_fetch_assoc($result)) 
    {
            
           // $row+= array("r"=> "hi");
            //$arr[] = $row;
            $n++;
            //echo $row["r"];
            
    }
}

$v = $arr;
$i=$n;
$n=range(1,$n);
shuffle($n);

$query = "SELECT $id as 'id',`qid`, `question`, `option1`, `option2`, `option3`, `option4` FROM `questions`  ORDER BY qid ASC";
$result = mysqli_query($con, $query);


$b = array();

for ($x=0; $x<$i; $x++)
{
$a=$n[$x];

$b[]=$a;

}

$x=0;
if(mysqli_num_rows($result) != 0) 
{
    while($row = mysqli_fetch_assoc($result)) 
    {

            $b[$x]=(int)$b[$x];
            $row+= array("r"=> $b[$x]);
            $arr[] = $row;
           // echo $row["r"];
            $x++;
            
    }
}


 function array_sort_by_column(&$arr, $col, $dir = SORT_ASC) {
    $sort_col = array();
    foreach ($arr as $key=> $row) {
        $sort_col[$key] = $row[$col];
    }
    array_multisort($sort_col, $dir, $arr);
  }


 array_sort_by_column($arr, 'r');


// Return json array containing data from the database
echo $json_info = json_encode($arr);

?>
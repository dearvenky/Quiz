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
$sql="SELECT `qid`, `answer` FROM `questions` WHERE 1";
$r = $con->query($sql);
$n=$r->num_rows;
 $myObj=new \stdClass();
 $myObj->id = $id;
 $myObj->n = $n;




$myJSON = json_encode($myObj);

echo $myJSON;
?>
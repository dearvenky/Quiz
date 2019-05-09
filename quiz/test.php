<?php
include('data.php'); 

$query = "SELECT `n`, `data`, `answer` FROM `testcases` WHERE 1";
$result = mysqli_query($db, $query);
$arr = array();
if(mysqli_num_rows($result) != 0) {
    while($row = mysqli_fetch_assoc($result)) 
    {
            echo $row["n"].",".$row["data"].",".$row["answer"]."<br>";

            
    }
} 



?>
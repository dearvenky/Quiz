<?php
include('data.php'); 

$query = "SELECT  `str`, `answer` FROM `testcases2` WHERE 1";
$result = mysqli_query($db, $query);
$arr = array();
if(mysqli_num_rows($result) != 0) {
    while($row = mysqli_fetch_assoc($result)) 
    {
            echo $row["str"].",".$row["answer"]."<br>";

            
    }
} 



?>
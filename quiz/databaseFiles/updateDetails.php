<?php 
// Including database connections
require_once 'database_connections.php';
// Fetching the updated data & storin in new variables
$data = json_decode(file_get_contents("php://input")); 
// Escaping special characters from updated data

$qid = mysqli_real_escape_string($con, $data->qid);
$answer = mysqli_real_escape_string($con, $data->answer);
$team = mysqli_real_escape_string($con, $data->team);
$aid='a'.$qid;

// mysqli query to insert the updated data
$query = "INSERT INTO response (team,$aid) VALUES('$team','$answer') ON DUPLICATE KEY UPDATE    
$aid='$answer'";
if(mysqli_query($con, $query))
{
echo true;
}
?>
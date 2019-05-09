<?php

if(isset($_GET["team"]) && isset($_GET["score"]) && isset($_GET["program"]))
{
include('data.php'); 
 $score=$_GET["score"];
 $team=$_GET["team"];
$program=$_GET["program"];
$program="program".$program;
$query = "INSERT INTO team (id,$program) VALUES($team,$score) ON DUPLICATE KEY UPDATE    
$program=$score";
//echo $query;
 $r = $db->query($query);



 if($r)
 {
  echo "\n Sucessfully Updated  ";
$name1=0;
$name2=0;
$query = "SELECT `student1`, `name1`, `student2`, `name2` FROM `team` WHERE id=$team";
$result = mysqli_query($db, $query);
$arr = array();
if(mysqli_num_rows($result) != 0) {
    while($row = mysqli_fetch_assoc($result)) 
    {
            $name1=$row["name1"];
            $name2=$row["name2"];

            
    }
} 
echo "Team = ".$name1." ".$name2;


}
}
?>
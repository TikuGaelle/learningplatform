<?php
include("db.php");

$sql =  "SELECT *   FROM    lesson_uploads";
$res  =    mysqli_query($con,  $sql);

while($row  =   mysqli_fetch_assoc($res)){


    $ID =   $row['LessonID'];
    $name   =   $row['LessonName'];
    
}


if(isset($_GET["LessonID"])){
$ID =   $_GET['LessonID'];


$sql    =   "SELECT LessonName  FROM    lesson_uploads  where   LessonID =  '$ID'";
$res    =   mysqli_query($con,  $sql);

$row    =   mysqli_fetch_assoc($res);
$row    =   $row['LessonName'];

}


?>
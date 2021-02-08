<?php 
include"../db.php";
$emp=$_GET['empid'];
$rat=$_GET['rate'];
$r=mysqli_fetch_array($result=mysqli_query($mysqli,"select rateing from employee where Emp_id='$emp'"));
if($r['rateing']==0)
{
    mysqli_query($mysqli,"update employee set rateing='$rat' where Emp_id='$emp'");
}
else
{
    $current=($r['rateing']+$rat)/2;
    mysqli_query($mysqli,"update employee set rateing='$current' where Emp_id='$emp'");
    
}
header("location:home.php");
?>
<?php
include "../db.php";
$c_id=$_GET['client_id'];
$pnum=$_GET['pno'];
$sql=mysqli_query($mysqli,"update project_state set p_status=8 where client_id=$c_id and pno=$pnum;");
header("location:viewnewproject.php");
?>
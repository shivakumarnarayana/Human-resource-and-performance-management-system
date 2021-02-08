<?php 
include"../db.php";
$pnum=$_GET['pno'];
$result=mysqli_query($mysqli,"select w.Empid from works_on w,project_state p where w.pno=p.pno and p.pno='$pnum'");
 while ($row=mysqli_fetch_assoc($result))
 {
     $r1=$row['Empid'];
mysqli_query($mysqli,"update emp_state set state=0 where emp_id='$r1'");  
 }
mysqli_query($mysqli,"delete from works_on where pno='$pnum'");
mysqli_query($mysqli,"update project_state set p_status=7 where pno='$pnum'");

header("location:ghome.php");
?>
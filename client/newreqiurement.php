<?php
include"../db.php";
session_start();
if (isset($_SESSION['cid'])) {
$client=$_GET['client'];
if(isset($_POST['submit']))
{
$newrequire=$_POST['requirement'];
$r1=mysqli_fetch_array($result=mysqli_query($mysqli,"select requirement,pno,p_status from client,project_state where client.client_id=project_state.client_id and pno=(select max(pno) from project_state where client_id=$client)"));
    $pno=$r1['pno'];
    $prerequire=$r1['requirement'];
    $pstate=$r1['p_status'];
    mysqli_query($mysqli,"insert into pre_project values('$client','$pno','$prerequire','$pstate')");
    mysqli_query($mysqli,"update client set requirement='$newrequire' where client_id=$client;");
    mysqli_query($mysqli,"insert into project_state (client_id,p_status) values('$client','0');");
    header("location:home.php");
}
}
else{
header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/login.php");
exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>New requirement</title>
     <link rel="stylesheet" href="../css/style.css">
     <script src="../js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <style>
    .bg-cus
        {
            background-color:#008aad;
        }
        .bg-cus a
        {
            text-align: center;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-dark bg-cus">
  <center><a class="navbar-brand" href="#">
    <img src="../images/hiring-1-300x300.png" width="40" height="40" class="d-inline-block align-top" alt="">
     <b style="padding: 10px;">HUMAN RESOURCE AND PERFORMANCE MANAGEMENT SYSTEM</b>
  </a></center>
</nav>
<center>
    <form action="" method="post">
       <div style="margin:150px;">
        <div class="form-group row">
    <label class="col-sm-2 col-form-label">Requirement</label>
    <div class="col-sm-10">
      <textarea class="form-control" value="" name="requirement" style="height:80px;"></textarea>
    </div>
    </div>
    <input type="submit" class="btn btn-success" name="submit" value="Submit">
        </div>
    </form>
    
</center>
</body>
</html>
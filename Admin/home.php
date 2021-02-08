<?php 
include "../db.php";
session_start();
if (isset($_SESSION['Aid'])) {
$r1=mysqli_fetch_array($result=mysqli_query($mysqli,"select count(Emp_id) from Employee"));
$r2=mysqli_fetch_array($result=mysqli_query($mysqli,"SELECT COUNT(Emp_id) from employee WHERE role='Employee'"));
$r3=mysqli_fetch_array($result=mysqli_query($mysqli,"SELECT COUNT(Emp_id) from employee WHERE role='manager'"));
$r4=mysqli_fetch_array($result=mysqli_query($mysqli,"select count(client_id) from client"));
$pp1=mysqli_fetch_array($result=mysqli_query($mysqli,"select COUNT(pno) from project_state where p_status BETWEEN 1 and 7;"));
$pp2=mysqli_fetch_array($result=mysqli_query($mysqli,"select count(pno) from project_state where p_status between 1 and 5"));
$pp3=mysqli_fetch_array($result=mysqli_query($mysqli,"select count(pno) from project_state where p_status=7"));
$pp4=mysqli_fetch_array($result=mysqli_query($mysqli,"select count(pno) from project_state where p_status=0"));
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
    <title>Admin Dashboard</title>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/font-awesome-4.7.0/css/font-awesome.css">
    <style>
      /*BODY
        {
            background-image: url(images/pm-herographic.png);
            background-repeat: no-repeat;
            background-size: cover;
        }*/
    .my-ul li
        {
            padding: 10px;
        }
        .my-ul li a
        {
            width: 150px;
            font-size: 18px;
        }
    .bg-cus
        {
            background-color:#008aad;
        }
        .info-box
        {
            display: block; 
            min-height: 90px;
            background: rgb(0,0,0,0.64);
            width: 100%;
            box-shadow: 0 1px 1px rgba(0,0,0,0.1);
            border-radius: 2px;
            margin-bottom: 15px;
        }
        .info-box-icon
        {
            border-top-left-radius: 2px;
            border-top-right-radius: 0;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 2px;
            display: block;
            float: left;
            height: 90px;
            width: 90px;
            text-align: center;
            font-size: 45px;
            line-height: 90px;
            background: rgba(0,0,0,0.2);
        }
        .info-box-content 
        {
            color: white;
            padding: 5px 10px;
            margin-left: 90px;
        }
        .info-box-text {
    text-transform: uppercase;
}
        .info-box-number {
    display: block;
    font-weight: bold;
    font-size: 18px;
}


    </style>
</head>
<body>
<nav class="navbar navbar-dark bg-cus">
  <a class="navbar-brand" href="#">
    <img src="../images/hiring-1-300x300.png" width="40" height="40" class="d-inline-block align-top" alt="">
     <b style="padding: 10px;">HUMAN RESOURCE AND PERFORMANCE MANAGEMENT SYSTEM</b>
      <ul class="nav nav-pills my-ul">
         <!--<li class="nav-item">
            <a class="btn btn-secondary" href="#" role="button">Feedback</a>
         </li>-->
         <li class="nav-item">
          <a class="btn btn-danger" href="logout.php" role="button">Log out</a>
          </li>
      </ul>
  </a>
</nav>
<div class="container">
    <h1>Employee</h1>
    <hr>
  <a class="btn btn-dark btn-lg col-md-12" href="insert.php" role="button" style="margin-bottom:10px;color:white;">+ Add Employee</a>
<div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <a href="viewallemployee.php"><span class="info-box-icon bg-primary">
                            <i class="fa"><img src="../images/totalEmp.png"></i>
                            </span></a>
                        <div class="info-box-content">
                            <span class="info-box-text">Total Employee</span>
                            <span class="info-box-number"><?php echo $r1[0];?><small></small></span>
                        </div><!-- /.info-box-content -->
                    </div><!-- /.info-box -->
                </div><!-- /.col -->
             <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="info-box">
                          <a href="viewmanager.php"><span class="info-box-icon bg-success">
                            <i class="fa"><img src="../images/employees.png"></i>
                              </span></a>
                        <div class="info-box-content">
                            <span class="info-box-text">regional managers</span>
                            <span class="info-box-number"><?php echo $r3[0];?></span>
                        </div><!-- /.info-box-content -->
                        </div><!-- /.info-box -->
                </div><!-- /.col -->
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <a href="viewemployee.php"><span class="info-box-icon bg-warning">
                             <i class="fa fa-user" aria-hidden="true" style="color: white"></i>
                            </span></a>
                        <div class="info-box-content">
                            <span class="info-box-text">employees</span>
                            <span class="info-box-number"><?php echo $r2[0];?></span>
                        </div><!-- /.info-box-content -->
                    </div><!-- /.info-box -->
                    </div><!-- /.col -->
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <a href="viewclient.php"><span class="info-box-icon bg-danger">
                            <i class="fa"><img src="../images/admin.png"></i>
                            </span></a>
                        <div class="info-box-content">
                            <span class="info-box-text">Client</span>
                            <span class="info-box-number"><?php echo $r4[0]; ?></span>
                        </div><!-- /.info-box-content -->
                    </div><!-- /.info-box -->
                </div><!-- /.col -->
            </div>          
    <h1>Project</h1>   
    <hr>        
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <a href="viewallproject.php"><span class="info-box-icon bg-primary">
                            <i class="fa fa-briefcase" aria-hidden="true" style="color: white"></i>
                            </span></a>
                        <div class="info-box-content">
                            <span class="info-box-text">Total projects</span>
                            <span class="info-box-number"><?php echo $pp1[0];?><small></small></span>
                        </div><!-- /.info-box-content -->
                    </div><!-- /.info-box -->
                </div><!-- /.col -->
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <a href="viewworkproject.php"><span class="info-box-icon bg-danger">
                            <i class="fa"><img 
                            src="../images/working.png"></i>
                            </span></a>
                        <div class="info-box-content">
                            <span class="info-box-text">WORKING projects</span>
                            <span class="info-box-number"><?php echo $pp2[0];?></span>
                        </div><!-- /.info-box-content -->
                    </div><!-- /.info-box -->
                </div><!-- /.col -->

                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <a href="viewcompletedproject.php"><span class="info-box-icon bg-success">
                            <i class="fa"><img src="../images/completed.png"></i>
                            </span></a>
                        <div class="info-box-content">
                            <span class="info-box-text">COMPLETED projects</span>
                            <span class="info-box-number"><?php echo $pp3[0];?></span>
                        </div><!-- /.info-box-content -->
                    </div><!-- /.info-box -->
                </div><!-- /.col -->
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <a href="viewnewproject.php"><span class="info-box-icon bg-warning">
                             <i class="fa"><img src="../images/working.png"></i>
                            </span></a>
                        <div class="info-box-content">
                            <span class="info-box-text">New projects</span>
                            <span class="info-box-number"><?php echo $pp4[0];?></span>
                        </div><!-- /.info-box-content -->
                    </div><!-- /.info-box -->
                </div><!-- /.col -->
            </div>
    </div>
</body>
</html>
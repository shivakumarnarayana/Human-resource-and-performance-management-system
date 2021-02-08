<?php
include "../db.php";
session_start();
if (isset($_SESSION['Aid'])) {
if(isset($_POST['insert']))
{
    $id=$_POST['Emp_id'];
    $name=$_POST['Name'];
    $email=$_POST['Email'];
    $password=$_POST['Password'];
    $address=$_POST['Address'];
    $phone=$_POST['Phone'];
    $Gender=$_POST['gender'];
    $Role=$_POST['role'];
    $skill=$_POST['Skill'];
    $salary=$_POST['Salary'];
    
    
    mysqli_query($mysqli,"insert into employee values('$id','$name','$address','$phone','$Gender','$Role','$skill','$salary','$email','$password','0');");
    mysqli_query($mysqli,"insert into emp_state values('$id','0');");
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
    <title>Details</title>
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
    <div class="container" style="padding-top:50px;width:800px;">
<form action="" method="POST" class="text-center">
    <div class="form-group row">
    <label class="col-sm-2 col-form-label">Employee ID</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" value="" name="Emp_id">
    </div>
    </div>
      <div class="form-group row">
    <label class="col-sm-2 col-form-label">Name</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" value="" name="Name">
    </div>
    </div>
      <div class="form-group row">
    <label class="col-sm-2 col-form-label">Email</label>
    <div class="col-sm-10">
      <input type="Email" class="form-control" value="" name="Email">
    </div>
    </div>
         <div class="form-group row">
    <label class="col-sm-2 col-form-label">Password</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" value="" name="Password">
    </div>
    </div>
      <div class="form-group row">
    <label class="col-sm-2 col-form-label">Address</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" value="" name="Address">
    </div>
    </div>
      <div class="form-group row">
    <label class="col-sm-2 col-form-label">Phone</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" value="" name="Phone">
    </div>
    </div>
    <div class="form-group row">
    <label class="col-sm-2 col-form-label">Gender</label>
    <div class="col-sm-5">
      <input type="radio" class="form-control" value="male" name="gender">Male
        </div>
        <div class="col-sm-5">
       <input type="radio" class="form-control" value="female" name="gender">Female
    </div>
    </div>
      <div class="form-group row">
    <label class="col-sm-2 col-form-label">Role</label>
    <div class="col-sm-10">
      <select name="role" style="width:100%;">
          <option value="Employee">Employee</option>
          <option value="Manager">Manager</option>
      </select>
    </div>
    </div>
      <div class="form-group row">
    <label class="col-sm-2 col-form-label">Skill</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" value="" name="Skill">
    </div>
    </div>
     <div class="form-group row">
    <label class="col-sm-2 col-form-label">Salary</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" value="" name="Salary">
    </div>
    </div>
    <input type="submit" name="insert" value="ADD" class="btn btn-success" style="width:100px;margin-bottom:50px;">
   </form>
    </div>
</body>
</html>
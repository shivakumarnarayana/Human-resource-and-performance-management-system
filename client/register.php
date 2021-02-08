<?php
include "../db.php";
if(isset($_POST['insert']))
{
    $id=$_POST['client_id'];
    $name=$_POST['Name'];
    $email=$_POST['Email'];
    $password=$_POST['Password'];
    $address=$_POST['Address'];
    $phone=$_POST['Phone'];
    $Requirement=$_POST['requirement'];
    
   
    $result=mysqli_query($mysqli,"insert into client values('$name','$email','$password','$phone','$address','$Requirement','$id');");
    header("Location:login.php");
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
    <img src="images/hiring-1-300x300.png" width="40" height="40" class="d-inline-block align-top" alt="">
     <b style="padding: 10px;">HUMAN RESOURCE AND PERFORMANCE MANAGEMENT SYSTEM</b>     
  </a>
</nav>
<div class="container" style="padding-top:50px;width:800px;">
<form action="" method="POST" class="text-center">
    <!--<div class="form-group row">
    <label class="col-sm-2 col-form-label">client ID</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" value="" name="client_id">
    </div>
    </div>-->
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
    <label class="col-sm-2 col-form-label">Requirement</label>
    <div class="col-sm-10">
      <textarea class="form-control" value="" name="requirement" style="height:80px;"></textarea>
    </div>
    </div>
    <input type="submit" name="insert" value="Register" class="btn btn-success" style="width:100px;margin-bottom:50px;">
   </form>
    </div>
</body>
</html>
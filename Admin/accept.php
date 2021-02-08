<?php
include "../db.php";
session_start();
if (isset($_SESSION['Aid'])) {
$client=$_GET['client_id'];
$projectno=$_GET['pno'];

if(isset($_POST['submit'])){
    $pname=$_POST['p_title'];
$sdate=$_POST['s_date'];
$fdate=$_POST['f_date'];
if(isset($_POST['manage']))
{
$manage=$_POST['manage'];
mysqli_query($mysqli,"insert into works_on values('$manage','$projectno');");
mysqli_query($mysqli,"update emp_state set state=1 where emp_id='$manage';"); 
}
if(!empty($_POST['emp'])) {
// Counting number of checked checkboxes.
//$checked_count = count($_POST['emp']);
//echo "You have selected following ".$checked_count." option(s): <br/>";
// Loop to store and display values of individual checked checkbox.
foreach($_POST['emp'] as $selected) {
mysqli_query($mysqli,"insert into works_on values('$selected','$projectno');");
mysqli_query($mysqli,"update emp_state set state=1 where emp_id='$selected';");   
}
mysqli_query($mysqli,"insert into project values('$projectno','$pname','$manage','$sdate','$fdate','$client');");
mysqli_query($mysqli,"update project_state set p_status=1 where client_id=$client and pno=$projectno;");   
header("location:viewnewproject.php");    
}
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
    <title>client dashboard</title>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
  
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
    th
        {
            background-color:#008aad;
            color: white;
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
<center>
   <div class="container" style="padding-top:50px;width:900px;">
    <form action="" method="post">
     <br>
      <div class="form-group row">
    <label class="col-sm-2 col-form-label">PROJECT TITLE</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" value="" name="p_title">
    </div>
    </div>
        <div class="form-group row">
    <label class="col-sm-2 col-form-label">Start Date</label>
    <div class="col-sm-10">
      <input type="date" class="form-control" value="" name="s_date">
    </div>
    </div>
             <div class="form-group row">
    <label class="col-sm-2 col-form-label">Final Date</label>
    <div class="col-sm-10">
      <input type="date" class="form-control" value="" name="f_date">
    </div>
    </div>
     <div class="form-group row">
    <label class="col-sm-2 col-form-label">Select Manager</label>
    <div class="col-sm-10">
     <table class="table table-bordered text-center">
       <thead>
           <tr>
               <th scope="col"></th>
               <th scope="col">ID</th>
               <th scope="col">Manager Name</th>
               <th scope="col">Skill</th>
               <th scope="col">Rating</th>
           </tr>
       </thead>
       <tbody>
     <?php
        $query="select e.Emp_id,e.name,e.skill,e.rateing from employee e,emp_state es where e.Emp_id=es.Emp_id and e.role='manager' and es.state=0 GROUP by emp_id";
    $result=mysqli_query($mysqli,$query);
          while ($row=mysqli_fetch_assoc($result)){
           echo "<tr>";
               ?>
               <td><input type="radio" name="manage" value="<?php echo $row['Emp_id']?>"></td>
               <?php
               echo "<td>".$row['Emp_id']."</td>";
               echo "<td>".$row['name']."</td>";
               echo "<td>".$row['skill']."</td>";
               echo "<td>".$row['rateing']."</td>";
           echo "</tr>";
          }
        ?>
         </tbody>
   </table>
    </div>
    </div>
     <div class="form-group row">
    <label class="col-sm-2 col-form-label">Select Employees</label>
    <div class="col-sm-10">
     <table class="table table-bordered text-center">
       <thead>
           <tr>
               <th scope="col"></th>
               <th scope="col">ID</th>
               <th scope="col">Employee Name</th>
               <th scope="col">Skill</th>
               <th scope="col">Rating</th>
           </tr>
       </thead>
       <tbody>
     <?php
        $query="select e.Emp_id,e.name,e.skill,e.rateing from employee e,emp_state es where e.Emp_id=es.Emp_id and e.role='Employee' and es.state=0 GROUP by emp_id";
    $result=mysqli_query($mysqli,$query);
          while ($row=mysqli_fetch_assoc($result)){
           echo "<tr>";
               ?>
               <td><input type="checkbox" name="emp[]" value="<?php echo $row['Emp_id']?>"></td>
               <?php
               echo "<td>".$row['Emp_id']."</td>";
               echo "<td>".$row['name']."</td>";
               echo "<td>".$row['skill']."</td>";
               echo "<td>".$row['rateing']."</td>";
           echo "</tr>";
          }
        ?>
         </tbody>
   </table>
    </div>
    </div>
      <input type="submit" name="submit" value="ADD" class="btn btn-success" style="width:100px;margin-bottom:50px;">
    </form>
    </div>
    </center>
</body>
</html>

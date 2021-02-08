<?php
include "../db.php";
session_start();
if(isset($_SESSION['mid']))
{
$nid=$_SESSION['mid'];
$temp=mysqli_fetch_array($result2=mysqli_query($mysqli,"select max(p_no) as p_no from project where mgr_id='$nid'"));
        $pnumber=$temp['p_no'];
    if(isset($_POST['pstate']))
    {
        $state=$_POST['pstate'];
        
        mysqli_query($mysqli,"update project_state set p_status='$state' where pno='$pnumber'");
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
    <title>G-manager Dashboard</title>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/fontawesome-free-5.5.0-web/css/all.css">
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
         .state
        {
            width: 450px;
            height: 450px;
            border-radius: 50%;
            position: relative;
            image-resolution: from-image;
        }
         th
        {
            background-color:#008aad;
            color: white;
        }
        .star
        {
            color: grey;
        }
        .star:hover
        {
            color:darkorange;
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
    <center><h1>welcome
      <?php 
       $r1=mysqli_fetch_array($result=mysqli_query($mysqli,"select name from employee where Emp_id='$nid'"));
       echo $r1[0]; ?></h1></center>
       <hr>
<div class="container">
   <div class="row"> <div class="pstate col-md-6 text-center">
        <h4>Project status</h4>
    
    <?php
    $r2=mysqli_fetch_array($result1=mysqli_query($mysqli,"SELECT ps.p_status from project_state ps,employee e,project p WHERE e.Emp_id=p.mgr_id and p.p_no=ps.pno and p.mgr_id='$nid' and p.p_no='$pnumber'"));
        switch($r2["p_status"])
    {

       case 1:
            echo '<img src="../images/intial.jpg" class="state">';
           echo '<h2>Project is in intial stage</h2>';
    
            break;
        case 2:
             echo '<img src="../images/meeting.png" class="state">';
           echo '<h2>Project is Planning</h2>';
            break;
        case 3:
             echo '<img src="../images/shutterstock_111044267.jpg" class="state">';
           echo '<h2>Project is Designing</h2>';
            break;
        case 4:
           echo '<img src="../images/IMG_04012018_1709071_0.png" class="state">';
           echo '<h2>Project is Developing</h2>';
            break;
        case 5:
            echo '<img src="../images/manual-testing-vs-automated-testing.jpg" class="state">';
           echo '<h2>Project is Testing</h2>';
            break;
        case 6:
               
           echo '<img src="../images/completed.jpg" class="state">';
           echo '<h2>Project is Completed</h2>';?>
           <a class='btn btn-danger' href="deallocate.php?pno=<?php echo $pnumber;?>">Deliver and Deallocate Team</a>
           <?php 
            
                break;   
            case 7: 
                echo '<img src="../images/waiting-for.png" class="state">';
           echo '<h2>Wait for next project</h2>';
                break;
                case 8: 
                echo '<img src="../images/waiting-for.png" class="state">';
           echo '<h2>Wait for next project</h2>';
                break;

        }
    ?>
   </div>
       <div class="home col-md-6">
           <h5>Co-workers</h5>
           <hr>
           <?php
           $co=mysqli_query($mysqli,"select e.Emp_id,e.name,e.phone,e.rateing from employee e,project p,works_on w WHERE e.Emp_id=w.Empid and p.p_no=w.pno and p.mgr_id='$nid' and e.Emp_id not IN('$nid')");
           ?>
           <table class="table table-bordered text-center" style="margin:10px;">
       <thead>
           <tr>
               <th scope="col">ID</th>
               <th scope="col">Name</th>
               <th scope="col">Phone</th>
               <th scope="col">Rating</th>
               <th scope="col">Action</th>
           </tr>
       </thead>
       <tbody>
           
             <?php

     while ($row=mysqli_fetch_assoc($co)){
           echo "<tr>";
               echo "<td>".$row['Emp_id']."</td>";
               echo "<td>".$row['name']."</td>";
               echo "<td>".$row['phone']."</td>";
               echo "<td>".$row['rateing']."</td>";
         ?>
               <td><a href="rate.php?empid=<?php echo $row['Emp_id'];?>&rate=1" class="star"><i class="fas fa-star"></i></a>
             <a href="rate.php?empid=<?php echo $row['Emp_id'];?>&rate=2" class="star"><i class="fas fa-star"></i></a>
             <a href="rate.php?empid=<?php echo $row['Emp_id'];?>&rate=3" class="star"><i class="fas fa-star"></i></a>
             <a href="rate.php?empid=<?php echo $row['Emp_id'];?>&rate=4" class="star"><i class="fas fa-star"></i></a>
             <a href="rate.php?empid=<?php echo $row['Emp_id'];?>&rate=5" class="star"><i class="fas fa-star"></i></a></td>
           <?php echo "</tr>";

     }
           ?>
            </tbody>
   </table>
           <h5>Update Project Status</h5>
           <hr>
           <form action="" method="post">
               <input type="radio" name="pstate" value="1"><label for="pstate">Intial</label><br>
               <input type="radio" name="pstate" value="2"><label for="pstate">Planning</label><br>
               <input type="radio" name="pstate" value="3"><label for="pstate">Designing</label><br>
               <input type="radio" name="pstate" value="4"><label for="pstate">Developing</label><br>
               <input type="radio" name="pstate" value="5"><label for="pstate">Testing</label><br>
               <input type="radio" name="pstate" value="6"><label for="pstate">Completed</label><br>
               <input type="submit" class="btn btn-success" name="update" value="UPDATE">  
           </form>
       </div>
       </div>
</div>
</body>
</html>
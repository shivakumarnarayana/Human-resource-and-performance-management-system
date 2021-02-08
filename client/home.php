<?php
include "../db.php";
session_start();
if (isset($_SESSION['cid'])) {
  
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
    </style>
</head>
<body>
    <nav class="navbar navbar-dark bg-cus">
  <a class="navbar-brand" href="#">
    <img src="../images/hiring-1-300x300.png" width="40" height="40" class="d-inline-block align-top" alt="">
     <b style="padding: 10px;">HUMAN RESOURCE AND PERFORMANCE MANAGEMENT SYSTEM</b>
      <ul class="nav nav-pills my-ul">
        <!-- <li class="nav-item">
            <a class="btn btn-secondary" href="#" role="button">Feedback</a>
         </li>-->
         <li class="nav-item">
          <a class="btn btn-danger" href="logout.php" role="button">Log out</a>
          </li>
      </ul>      
  </a>
</nav>
<center>
   <h1 style="margin:30px;">WELCOME <?php 
       $nid=$_SESSION['cid'];
       $r1=mysqli_fetch_array($result=mysqli_query($mysqli,"select c_name from client where client_id='$nid'"));
       echo $r1[0]; ?></h1>
       
    <h4>Project status</h4>
    
    <?php
    $r2=mysqli_fetch_array($result1=mysqli_query($mysqli,"SELECT p_status from project_state,client WHERE client.client_id=project_state.client_id and pno=(select max(pno) from project_state where client_id=$nid)"));
        switch($r2["p_status"])
    {
        case 0:
          
           echo '<img src="../images/waiting-for-Gods-timing.jpg" class="state">';
           echo '<h2>Project is in waiting</h2>';
    
    
            break;
                
        case 1:
            echo '<img src="../images/acknowledged-clipart-stamp-green.jpg" class="state">';
           echo '<h2>Project is Accepted</h2>';
    
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
           echo '<h2>Project is Completed</h2>';
           break;
        case 8:   
            echo '<img src="../images/reject.png" class="state">';
           echo '<h2>Project is Rejected</h2>';?>
           <a class='btn btn-success' href="newreqiurement.php?client=<?php echo $nid;?>">+ADD NEW</a>
           <?php 
            break; 
        case 7:
                echo '<img src="../images/shutterstock165672191-crop-600x338.jpg" class="state">';
           echo '<h2>Project is Delivered</h2>';?>
           <a class='btn btn-success' href="newreqiurement.php?client=<?php echo $nid;?>">+ADD NEW</a>
           <?php 
            break;   
    }
    ?>
    </center>
</body>
</html>
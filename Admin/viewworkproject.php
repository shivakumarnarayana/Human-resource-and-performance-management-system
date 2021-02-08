<?php
    include "../db.php";
    session_start();
if (isset($_SESSION['Aid'])) {
    $query="SELECT p.p_no,p.p_name,e.name,p.start_date,p.fianl_date,c.c_name,ps.p_status from employee e,project p,client c,project_state ps where c.client_id=p.client_id and e.emp_id=p.mgr_id and p.p_no=ps.pno and ps.p_status between 1 and 5;";
    $result=mysqli_query($mysqli,$query);
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
        <!-- <li class="nav-item">
            <a class="btn btn-secondary" href="#" role="button">Feedback</a>
         </li>-->
         <li class="nav-item">
          <a class="btn btn-danger" href="logout.php" role="button">Log out</a>
          </li>
      </ul>      
  </a>
</nav>
        <table class="table table-bordered text-center container" style="margin:100px;">
       <thead>
           <tr>
               <th scope="col">ID</th>
               <th scope="col">Project Name</th>
               <th scope="col">Manager Name</th>
               <th scope="col">Start date</th>
               <th scope="col">Final date</th>
               <th scope="col">Client Name</th>
               <th scope="col">Project Status</th>
           </tr>
       </thead>
       <tbody>
           
             <?php

     while ($row=mysqli_fetch_assoc($result)){
           echo "<tr>";
               echo "<td>".$row['p_no']."</td>";
               echo "<td>".$row['p_name']."</td>";
               echo "<td>".$row['name']."</td>";
               echo "<td>".$row['start_date']."</td>";
               echo "<td>".$row['fianl_date']."</td>";
               echo "<td>".$row['c_name']."</td>";?>
                    <td><?php switch($row['p_status'])
               {
                   case 1:echo"Intial";
                       break;
                   case 2:echo"Planing";
                       break;
                   case 3:echo"Designing";
                       break;
                   case 4:echo"Developing";
                       break;
                   case 5:echo"Testing";
                       break;
               }
                        ?></td>    
               <?php
           echo "</tr>";

     }
?>            
       </tbody>
   </table>
    </body>
</html>
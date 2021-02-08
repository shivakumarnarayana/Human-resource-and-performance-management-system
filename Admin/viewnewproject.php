<?php
    include "../db.php";
    session_start();
if (isset($_SESSION['Aid'])) {
    $query="SELECT c.client_id,c_name,requirement,pno from project_state p,client c where c.client_id=p.client_id and p_status=0;";
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
       <!--  <li class="nav-item">
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
               <th scope="col">Client_ID</th>
               <th scope="col">Client Name</th>
               <th scope="col">Requirement</th>
               <th scope="col">Action</th>
           </tr>
       </thead>
       <tbody>
           
             <?php

     while ($row=mysqli_fetch_assoc($result)){
           echo "<tr>";
               echo "<td>".$row['client_id']."</td>";
               echo "<td>".$row['c_name']."</td>";
               echo "<td>".$row['requirement']."</td>";?>
               <td><span><a class="btn btn-success" href="accept.php?client_id=<?php echo $row['client_id'];?>&pno=<?php echo $row['pno'];?>" role="button">Accept</a></span>
               <span><a class="btn btn-danger" href="reject.php?client_id=<?php echo $row['client_id'];?>&pno=<?php echo $row['pno'];?>" role="button">Reject</a></span></td>

                      <?php echo "</tr>";

     }
?>            
       </tbody>
   </table>
    </body>
</html>
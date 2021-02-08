<?php
		include "../db.php";
		session_start();
        
		if(isset($_POST['login-btn']))
{		
		$Aun =$_POST['Ausername'];
		$Apw =$_POST['Apassword'];

					$result =mysqli_query($mysqli,"select * from employee where username='$Aun' and password='$Apw'and role='manager'");
                    $row=mysqli_fetch_array($result);
					if($row>0)
					{
                        $_SESSION['mid']=$row['Emp_id'];
						header("Location:ghome.php");
						
					}
					else
					{
						$err = "Your Login Name or Password is invalid";
					}
}
				?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/style.css">
     <script src="../js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <title>login</title>
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
<body class="login">
  <nav class="navbar navbar-dark bg-cus">
  <center><a class="navbar-brand" href="#">
    <img src="../images/hiring-1-300x300.png" width="40" height="40" class="d-inline-block align-top" alt="">
     <b style="padding: 10px;">HUMAN RESOURCE AND PERFORMANCE MANAGEMENT SYSTEM</b>
  </a></center>
</nav>
   <div class="logdiv" style="width:400px;">
       <img src="../images/download.jpg" class="avatar">
       <h1>General Manager</h1>
        <form action="" method="post">
            <p>Username</p>
            <input type="text" name="Ausername">
            <p>Password</p>
            <input type="password" name="Apassword">
           <p style="color:red;"><?php echo @$err; ?></p>
            <input type="submit" name="login-btn" value="Login">
        </form>
    </div>
</body>
</html>
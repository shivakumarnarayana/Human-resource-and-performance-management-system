<?php
$mysqli =mysqli_connect("localhost","root","","hrm");
		if (mysqli_connect_errno()) 
		{
			printf("Connect failed: %s\n", mysqli_connect_error());
			exit();
		}
?>
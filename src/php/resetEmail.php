<?php 
session_start();
	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);
	
	if (isset($_POST['re_email']))
	{
 		$id = $_SESSION['user_id'];
 		$pass=$_POST['password'];
 		$re_email = $_POST['re_email'];
 		$pa = mysqli_query($con,"select * from users where user_id='$id'");
		$password_row = mysqli_fetch_array($pa);
		$db_password = $password_row['user_password'];
		if ($db_password == $pass && !empty($re_email))
		{
			$sql_email= "update users set user_email='$re_email' where user_id='$id'";
			$update_email = mysqli_query($con,$sql_email);
			echo "<script>alert('Email has been successfully changed'); window.location='index.php'</script>";
		}		
		
	  	else
		{
			echo "<script>alert('Your password is wrong'); window.location='resetEmail.php'</script>";
		}
	}	
?>

<!DOCTYPE html>
<html>
<head>
	<title>Reset Email</title>
</head>
<body>

	<style type="text/css">
	#text{
		height: 25px;
		border-radius: 5px;
		padding: 4px;
		border: solid thin #aaa;
		width: 100%;
	}

	#button{
		padding: 15px;
		width: 70px;
		color: black;
		background-color: white;
		border: ;
	}

	#box{
		background-color: lightgrey;
		margin: auto;
		width: 300px;
		padding: 20px;
	}
	</style>

	<div id="box">		
		<form method="post">
			<div style="font-size: 40px;margin: 5px;color: black;">Reset Email</div>
			<label>Password</label>
			<input id="text" type="password" name="password"><br><br>
			<label>New Email Address</label>
			<input id="text" type="email" name="re_email"><br><br>
			<input id="button" type="submit" value="Apply"><br><br>
			<a href="index.php">Back to main page</a><br><br>
		</form>
	</div>
</body>
</html>
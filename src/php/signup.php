<?php 
session_start();
	include("connection.php");
	include("functions.php");

	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		$account = $_POST['user_account'];
		$name = $_POST['user_name'];
		$password = $_POST['user_password'];
		$email = $_POST['user_email'];


		if(!empty($account) && !empty($name) && !empty($password) && !empty($email))
		{
			$user_id = random_num(5);
			$query = "insert into users (user_id,user_account,user_name,user_password,user_email) values ('$user_id','$account','$name','$password','$email')";
			$sql = "select * from users where user_account = '$account'";
			$rs = mysqli_query($con,$sql);
			if(mysqli_num_rows($rs) >0)
			{
				echo"<script> alert('Account already used!') </script>";
			}
			else
			{
				mysqli_query($con,$query);
				header("Location: login.php");
				die;
			}
		}
		else
		{
			echo"<script> alert('Please enter information') </script>";
		}
	}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Signup</title>
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
		padding: 10px;
		width: 100px;
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
			<div style="font-size: 40px;margin: 5px;color: black;">Signup</div>
			<label>Account</label>
			<input id="text" type="text" name="user_account"><br><br>
			<label>Username(You can change it later)</label>
			<input id="text" type="text" name="user_name"><br><br>
			<label>Password</label>
			<input id="text" type="password" name="user_password"><br><br>
			<label>Email</label>
			<input id="text" type="email" name="user_email"><br><br>
			<input id="button" type="submit" value="Signup"><br><br>
			<a href="login.php">Click to Login</a><br><br>
		</form>
	</div>
</body>
</html>
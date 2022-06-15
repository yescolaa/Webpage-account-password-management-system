<?php 
session_start();
	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);
	
	if (isset($_POST['re_password']))
	{
 		$old_pass=$_POST['old_password'];
 		$id = $_SESSION['user_id'];
 		$new_pass=$_POST['new_password'];
 		$re_pass = $_POST['re_password'];
 		$pa = mysqli_query($con,"select * from users where user_id='$id'");
		$password_row = mysqli_fetch_array($pa);
		$db_password = $password_row['user_password'];
		if ($db_password == $old_pass)
		{
			if(preg_match('/\s/',$new_pass) )
			{
				echo"<script> alert('Can not use space in password') </script>";
			}
			elseif (preg_match("/^[\x{4e00}-\x{9fa5}]+$/u",$new_pass))
			{
				echo"<script> alert('Can not use Chinese in password') </script>";
			}
			elseif(preg_match("/[\'.,:;*?~`!@#$%^&+=)(<>{}]|\]|\[|\/|\\\|\"|\|/",$new_pass))
			{
				echo"<script> alert('Can not use symbols in password') </script>";
			}
			elseif($old_pass == $new_pass)
			{
				echo"<script> alert('Can not use the same password') </script>";
			}
			elseif ($new_pass == $re_pass)
			{
				$sql= "update users set user_password='$new_pass' where user_id='$id'";
				$update_pwd = mysqli_query($con,$sql);
				echo "<script>alert('Password has been successfully changed'); window.location='index.php'</script>";
			}
			else
			{
				echo "<script>alert('Your new and Retype Password does not match'); window.location='resetPassword.php'</script>";
			}
		}
	  	else
		{
			echo "<script>alert('Old Password incorrect!'); window.location='resetPassword.php'</script>";
		}
	}
	
?>

<!DOCTYPE html>
<html>
<head>
	<title>Reset Password</title>
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
			<div style="font-size: 40px;margin: 5px;color: black;">Reset Password</div>
			<label>Old Password*</label>
			<input id="text" type="password" name="old_password"><br><br>
			<label>New Password</label>
			<input id="text" type="password" name="new_password"><br><br>
			<label>Re Password</label>
			<input id="text" type="password" name="re_password"><br><br>
			<input id="button" type="submit" value="Apply"><br><br>
			<a href="index.php">Back to main page</a><br><br>
		</form>
	</div>
</body>
</html>
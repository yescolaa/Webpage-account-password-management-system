<?php 
session_start();
	include("connection.php");
	include("functions.php");

	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		$account = $_POST['user_account'];
		$password = $_POST['user_password'];

		if(!empty($account) && !empty($password))
		{
			$query = "select * from users where user_account = '$account' limit 1";
			$result = mysqli_query($con, $query);

			if($result && mysqli_num_rows($result) > 0)
			{
				$user_data = mysqli_fetch_assoc($result);
				if($user_data['user_password'] === $password)
				{
					$_SESSION['user_id'] = $user_data['user_id'];
					header("Location: index.php");
					die;
				}
			}
			echo"<script> alert('Wrong account or password!') </script>";
		}
		else
		{
			echo"<script> alert('Wrong account or password!') </script>";
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
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
			<div style="font-size: 40px;margin: 5px;color: black;">Login</div>
			<label>Account</label>
			<input id="text" type="text" name="user_account"><br><br>
			<label>Password</label>
			<input id="text" type="password" name="user_password"><br><br>
			<input id="button" type="submit" value="Login"><br><br>
			<a href="signup.php">No Account? Sign up</a><br><br>
		</form>
	</div>
</body>
</html>
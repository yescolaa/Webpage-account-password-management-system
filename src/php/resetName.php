<?php 
session_start();
	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);
	
	if (isset($_POST['re_name']))
	{
 		$id = $_SESSION['user_id'];
 		$re_name = $_POST['re_name'];
 		$pa = mysqli_query($con,"select * from users where user_id='$id'");
		$password_row = mysqli_fetch_array($pa);
		$db_name = $password_row['user_name'];
		if ($db_name == $re_name && !empty($re_name))
		{
			echo "<script>alert('You're already using this name'); window.location='resetName.php'</script>";
		}		
		
	  	else
		{
			$sql_name= "update users set user_name='$re_name' where user_id='$id'";
			$update_name = mysqli_query($con,$sql_name);
			echo "<script>alert('Name has been successfully changed'); window.location='index.php'</script>";
		}
	}	
?>

<!DOCTYPE html>
<html>
<head>
	<title>Change Name</title>
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
			<div style="font-size: 40px;margin: 5px;color: black;">Reset Name</div>
			<label>Change UserName</label>
			<input id="text" type="text" name="re_name"><br><br>
			<input id="button" type="submit" value="Apply"><br><br>
			<a href="index.php">Back to main page</a><br><br>
		</form>
	</div>
</body>
</html>